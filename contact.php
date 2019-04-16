<?php include 'lib/session.php';
Session::init();
?>

<?php include "inc/header.php";?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Order Process</h2>
			<form action="" method="post">
				<marquee><h4 style="color: green; background: white;">Withing 2 working days product will be reached your Doorway</h4></marquee>

<?php 
	if (!isset($_GET['product_id']) || $_GET['product_id'] == NULL)  {
		header("Location:404.php");
		
	}else{
		$product_id= $_GET['product_id'];
		session::set("product_id", $product_id);
		
		
	}
 ?>

				<table>
					<?php 
						
						$query= "SELECT *
									FROM product
									WHERE product_id= '$product_id'";
						$post= $db->select($query); 
						if ($post) {
							while ($result= $post->fetch_assoc()) {
					
					?>

				<tr>

					 <img src="admin/<?php echo $result['image']?>" height="40px" width="60px"; />
					<tr><td>Product_id : <?php echo $result['product_id']; ?> </td>
					
				</tr>
				<tr>
					<td>price : <?php  echo $price=$result['price'] ?></td>
				</tr>



				</tr>
				




			</table>




			<br><br><br><br><br><br><br>

			<table>
				
				<?php 

					if ($_SERVER['REQUEST_METHOD']=='POST') {
                    
                    $customer_name= mysqli_real_escape_string($db->link,$_POST['customer_name']);
                    
                    $phone= mysqli_real_escape_string($db->link,$_POST['phone']);
                    $customer_email= mysqli_real_escape_string($db->link,$_POST['customer_email']);
                    $city= mysqli_real_escape_string($db->link,$_POST['city']);
                    $postal_code= mysqli_real_escape_string($db->link,$_POST['postal_code']);
                    $address= mysqli_real_escape_string($db->link,$_POST['address']);
                    $cash= mysqli_real_escape_string($db->link,$_POST['cash']);
                    $size= mysqli_real_escape_string($db->link,$_POST['size']);
                    

					

					$product_id= $result['product_id'];
					$price ; //from database

                    if (is_numeric($customer_name) || is_numeric($city) || is_numeric($customer_email) || is_numeric($address) ) {
                    	echo "<span style='color:red; font-size:25px'> customer_name, city, email, Address can not be numeric</span>";
                    	
                    }elseif (ctype_alpha($phone) || ctype_alpha($postal_code) ) //|| empty($phone) || empty($customer_email) || empty($city) || empty($postal_code) || empty($address)  || empty($cash)) {

                    	{echo "<span style='color:red; font-size:25px'>phone number, Postal code must be alphanumeric</span>";
                    	
                    }elseif (empty($customer_name) || empty($phone) || empty($customer_email) || empty($city) || empty($postal_code) || empty($address)  || empty($cash)) {
                    	echo "<span style='color:red; font-size:25px'>Fields Must Not Be Empty</span>";
                    	
                    }else {
                    	
                    		session::set("customer_name", $customer_name);
                    		session::set("phone", $phone);
                    		session::set("customer_name", $customer_name);
                    		session::set("customer_email", $customer_email);
                    		session::set("city", $city);
                    		session::set("postal_code", $postal_code);
                    		session::set("address", $address);
                    		session::set("cash", $cash);
                    		session::set("size", $size);
                    		echo "<script>alert('You have additional pay 500 tk For hiring tailor');</script>";
                    	
							  header("Location:order.php");
												

                    }

                }
             

				 ?>
				 <tr><td><h3>select your size</h3></td>
				 	<td><input type="checkbox" name="size" value="Standard" checked="checked">Standard
					<input type="checkbox" name="size" value="Smakk">Small
					<input type="checkbox" name="size" value="Large">Large</td>
				</tr>
					<tr><td></td></tr>

				<tr>
					<hr>
					

					<td>Your Full Name:</td>
					<td>
					<input type="text" name="customer_name" placeholder="Enter Full name"/>
					</td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td>
					<input type="text" name="phone" placeholder="Phone number"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="customer_email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>City</td>
					<td>
					<input type="text" name="city" placeholder="city"/>
					</td>
				</tr>
				<tr>
					<td>postal code</td>
					<td>
					<input type="text" name="postal_code" placeholder="postal code"/>
					</td>
				</tr>
				<tr>
					<td>Your Address:</td>
					<td>
					<textarea name="address"></textarea>
					</td>
				</tr>
				
					<tr><td><input type="radio" name="cash" value="Cash On Delivary" checked="checked">Cash On Devilary</td></tr>
					
				<tr> <td><input type="submit" name="submit" value="Next>>"/></td>
				
			</tr>
			
				
			</tr>
		</table>
		

		

		
<?php } } ?>

	<form>				
 </div>

</div>
<?php include "inc/sidebar.php";?>

<?php include "inc/footer.php";?>