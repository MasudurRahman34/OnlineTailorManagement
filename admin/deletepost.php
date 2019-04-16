<?php
 include '../lib/session.php';    
    session::checkSession();
 ?>
<?php include '../config/config.php';?>

<?php include '../lib/Database.php';?>
<?php include '../helpers/format.php';?>
<?php 
$db= new Database();
?>

<?php 
    if (!isset($_GET['delpost']) || $_GET['delpost'] == NULL)  {
        header("Location:404.php");
        //javascript echo "<script>Window.Location='catlist.php';</script>";
    }else{
        $delpostid= $_GET['delpost'];
    
        $query="SELECT * FROM product where product_id ='$delpostid'";
         $get= $db->select($query);
         print_r($get);

         if ($get) {
         	while ($result=$get->fetch_assoc()) {
         		$getimage= $result['image'];
         		unlink($getimage);
         	    
         	}
         	
         }

         $delquery="delete from product where product_id='$delpostid'";
         $delproduct= $db->delete($delquery);
         if ($delproduct) {
         	echo "<script>alert('Data deleted successfully.');</script>";
         	echo "<script>window.location= 'postlist.php';</script>";
         	//header('location:postlist.php');
         	
         }else {
         	echo "<script>alert('Data Not deleted successfully.');</script>";
         }
    

}



 ?>