<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php 
    if (!isset($_GET['catid']) || $_GET['catid'] == NULL)  {
        header("Location:404.php");
        //javascript echo "<script>Window.Location='catlist.php';</script>";
    }else{
        $catid= $_GET['catid'];
        echo $catid;
    }
 ?>

>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>UPDATE Category</h2>
               <div class="block copyblock"> 
         <?php 
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $name=$_POST['name'];

                $name= mysqli_real_escape_string($db->link,$name);
                
                
                
                if (empty($name)) {

                    echo "<span class='error'>Field Must Not Be Empty !!</span>";
                    
                }else{
                    $query= "UPDATE catagory SET name = '$name' WHERE catid= '$catid'";
                    $updatedrow= $db->update($query);
                    if ($updatedrow) {
                         echo "<span class='success'> catagory Updated Successfuly !!</span>";

                        
                    }else {
                        echo "<span class='error'> Not Updated !!</span>";
                    }
                }
            }

             ?>


            <?php 
                $query="SELECT * FROM CATAGORY WHERE catid = $catid";
                $catagory= $db->select($query);
                
                while ($result=$catagory->fetch_assoc()) {

                    
                

             ?>



                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value= <?php echo $result['name']; ?> class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php }  ?>
                </div>
            </div>
        </div>
    
    <?php include 'inc/footer.php';?>