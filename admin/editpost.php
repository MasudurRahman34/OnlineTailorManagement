<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


        <?php 
            if (!isset($_GET['editpostid']) || $_GET['editpostid'] == NULL)  {
                header("Location:postlist.php");
                //javascript echo "<script>Window.Location='catlist.php';</script>";
            }else{
                $editpostid= $_GET['editpostid'];
            }
         ?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                    

                    $product_id= mysqli_real_escape_string($db->link,$_POST['product_id']);
                    $product_typeid= mysqli_real_escape_string($db->link,$_POST['product_typeid']); //catagory id
                    $title= mysqli_real_escape_string($db->link,$_POST['title']);
                    $price= mysqli_real_escape_string($db->link,$_POST['price']);
                    $body= mysqli_real_escape_string($db->link,$_POST['body']);

                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;

                    //body, image
                    $author= mysqli_real_escape_string($db->link,$_POST['author']);
                    $tags= mysqli_real_escape_string($db->link,$_POST['tags']);
                    //date
                    
                    $Season= mysqli_real_escape_string($db->link,$_POST['Season']);
                    $weight= mysqli_real_escape_string($db->link,$_POST['weight']);
                        
                    if ($product_id=="" || $product_typeid=="" || $title=="" || $price=="" || $body=="" || $file_name=="" || $author=="" || $tags=="" || $Season=="" || $weight =="")
                         {
                        echo "<span class='error'>Field Must Not Be Empty !!</span>";

                    

                    if (!empty($file_name)) {
                        
                    
                        if ($file_size >1048567) {
                                    echo "<span class='error'>Image Size should be less then 1MB!</span>";

                                } elseif (in_array($file_ext, $permited) === false) {
                                        echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";

                                } else{
                                        move_uploaded_file($file_temp, $uploaded_image);   
                                        $query= "UPDATE product
                                                    SET 
                                                    product_id='$product_id',
                                                    product_typeid='$product_typeid',
                                                    title='$title',
                                                    price='$price',
                                                    body='$body',
                                                    image='$uploaded_image'
                                                    author='$author',
                                                    tags='$tags',
                                                    Season='$Season',
                                                    weight='$weight'
                                                    WHERE product_id='editpostid'";

                                        $updated_rows = $db->update($query);

                                            if ($updated_rows) {
                                                echo "<span class='success'> Updated Data Inserted Successfully.</span>";
                                            }else {
                                            echo "<span class='error'> Product Data Not Inserted !</span>";
                                    }
                                // catid, title, price, body, image, author, tags, date, product_id, product_type, Season, weight
                                 }
                } }else {
                    $query= "UPDATE product
                            SET 
                            product_id='$product_id',
                            product_typeid='$product_typeid',
                            title='$title',
                            price='$price',
                            body='$body',
                            image='$uploaded_image'
                            author='$author',
                            tags='$tags',
                            Season='$Season',
                            weight='$weight'
                            WHERE product_id='editpostid'";

                    $updated_rows = $db->update($query);

                    if ($updated_rows) {
                        echo "<span class='success'> Updated Data Inserted Successfully.</span>";
                    }else {
                    echo "<span class='error'> Product Data Not Inserted !</span>";
                     }
                    
                }
             }

                 ?>

                <div class="block">

                <!--edit post query-->
            <?php 
                    echo $editpostid;

                        $editquery="SELECT product.*, product_type.product_typeid from product, product_type WHERE Product.product_typeid=product_type.product_typeid and product_id= '$editpostid'";
                        $editquery= $db->select($editquery);
                          $editquery;

                if ($editquery) {     
                        
                        while ($editresult = $editquery->fetch_assoc()) {
                       
                     ?>


                         <form action="" method="post" enctype="multipart/form-data">
                            <table class="form">
                                <tr>
                                    <td>
                                        <label>Product_id</label>
                                    </td>
                                    <td>
                                        <input type="text" name="product_id" value="<?php echo $editresult['product_id'] ?>"" class="medium" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Product Type</label>
                                    </td>
                                    <td>
                                        <select id="select" name="product_typeid">
                                            <option>Select Product Type</option>
                                            <?php 
                                                $query= "SELECT * FROM product_type";
                                                $product_type= $db->select($query);
                                                while ($result= $product_type->fetch_assoc()) {   
                                                
                                             ?>
                                            <option 

                                                <?php
                                                    if ($editresult['product_typeid'] == $result['product_typeid']) { ?>
                                                                 selected= "selected"                                     
                                                    <?php } ?>
                                            value="<?php echo $result['product_typeid'] ?>"><?php echo $result['product_type']; ?></option>
                                           <?php } ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Title</label>
                                    </td>
                                    <td>
                                        <input type="text" name="title" value="<?php echo $editresult['title'] ?>" class="medium" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Price</label>
                                    </td>
                                    <td>
                                        <input type="text" name="price" value="<?php echo $editresult['price'] ;?>"  class="medium" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Color And Tags</label>
                                    </td>
                                    <td>
                                        <input type="text" name="tags" value="<?php echo $editresult['tags'] ;?>"  class="medium" />
                                    </td>
                                </tr>
           
                             <tr>
                                  <tr>
                                    <td>
                                        <label>Season</label>
                                    </td>
                                    <td>
                                        <input type="text" name="Season" value="<?php echo $editresult['Season'] ;?>"  class="medium" />
                                    </td>
                                </tr>
                                    
                                <tr>
                                    <td>
                                        <label>Weight</label>
                                    </td>
                                    <td>
                                        <input type="text" name="weight" value="<?php echo $editresult['weight'] ;?>" />
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <label>author</label>
                                    </td>
                                    <td>
                                        <input type="text" name="author" value="<?php echo $editresult['author'] ;?>"  class="medium" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Upload Image</label>
                                    </td>
                                    <td>
                                        <img src="<?php echo $editresult['image'] ;?>" height="80px" width="150px">
                                        <input type="file" name="image" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding-top: 9px;">
                                        <label>Product Details</label>
                                    </td>
                                    <td>
                                         <textarea class="tinymce" name='body'> <?php echo $editresult['body'] ;?></textarea>
                                    </td>
                                </tr>
        						<tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" Value="Save" />
                                    </td>
                                </tr>
                            </table>
                        </form>
        <?php  } } ?> <!--end edit post while loop-->
                </div>
            </div>
        </div>

 <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

<?php include 'inc/footer.php';?>