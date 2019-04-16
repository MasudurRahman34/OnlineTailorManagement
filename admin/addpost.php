<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Fabric</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $cur_date=date('Y-m-d');
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
                $product_id='pro'.substr(strtoupper(md5(rand())),6,6);
                    if ( $product_typeid=="" || $title=="" || $price=="" || $body=="" || $file_name=="" || $author=="" || $tags=="" || $Season=="" || $weight =="")
                         {
                        echo "<span class='error'>Field Must Not Be Empty !!</span>";
                    }elseif (ctype_alpha($price) || ctype_alpha($weight) ) 

                        {echo "<span style='color:red; font-size:25px'>price, weight must not be alphanumeric</span>";
                    }elseif ($file_size >1048567) {
                        echo "<span class='error'>Image Size should be less then 1MB!</span>";
                    } elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                    } else{
                        move_uploaded_file($file_temp, $uploaded_image);

                        $query = "INSERT INTO PRODUCT ( product_id, product_typeid, title, price, body, image, author, tags, ddate, Season, weight)
                                    Values ('$product_id', '$product_typeid', '$title', '$price', '$body', '$uploaded_image', '$author', '$tags','$cur_date','$Season', '$weight')";
                        $inserted_rows = $db->insert($query);
                            if ($inserted_rows) {
                                echo "<span class='success'> Product Data Inserted Successfully.</span>";
                            }else {
                            echo "<span class='error'> Product Data Not Inserted !</span>";
                    }

                    // product_id, title, price, body, image, author, tags, date, product_id, product_type, Season, weight

                 }
             }

                 ?>

                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">

    

                         <tr>
                            <td>
                                <label>Product_type</label>
                            </td>
                            <td>
                                <select id="select" name="product_typeid">
                                    <option>Select Product Type</option>
                                    <?php 
                                        $query= "SELECT * FROM product_type";
                                        $product_type= $db->select($query);
                                        while ($result= $product_type->fetch_assoc()) {   
                                        
                                     ?>
                                    <option value="<?php echo $result['product_typeid'] ?>"><?php echo $result['product_type']; ?></option>
                                   <?php } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Title And Product Name" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Price</label>
                            </td>
                            <td>
                                <input type="text" name="price" placeholder="Enter Price Of The Product" class="medium" />
                            </td>
                        </tr>

                        
                         <tr>
                            <td>
                                <label>Color And Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" placeholder="Enter Tags and Color." class="medium" />
                            </td>
                        </tr>

                     
                          <tr>
                            <td>
                                <label>Season</label>
                            </td>
                            <td>
                                <input type="text" name="Season" placeholder="Enter Suitable Seasons" class="medium" />
                            </td>
                        </tr>
                            
                        <tr>
                            <td>
                                <label>Weight</label>
                            </td>
                            <td>
                                <input type="text" name="weight" placeholder="Enter weight" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>author</label>
                            </td>
                            <td>
                                <input type="text" name="author" placeholder="Enter author Name" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Product Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name='body'></textarea>
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