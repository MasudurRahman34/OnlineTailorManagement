<?php include 'lib/session.php';

Session::init();
?>

<?php 

include "inc/header.php";?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Buy Product</h2>
			<form action="" method="post">
				<marquee><h4 style="color: green; background: white;">Withing 2 working days product will be reached your Doorway</h4></marquee>

<?php 

//echo "<script>alert('You have additional pay 500 tk For hiring tailor');</script>";
	$product_id=session::get("product_id");
	echo $product_id;
	$customer_name=session::get("customer_name");
    $phone= session::get("phone");
    $customer_email=session::get("customer_email");
    $city= session::get("city");
    $postal_code= session::get("postal_code");
    $address= session::get("address");
    $cash= session::get("cash");
    $size= session::get("size");
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
					<td>price : <?php  echo $price=$result['price'] ?></td></tr>
					/* <tr><td>Hairing tailor cost= 500 TK</td></tr>
					<tr><td>Total Cost= <?php $total=$price+500; echo $total; ?> </td></tr> */
				
				</tr>
				
			</table>

			<br><br><br><br><br><br><br>

			<table>
				<?php 
				 

					if ($_SERVER['REQUEST_METHOD']=='POST') {
					$foid='foid'.substr(strtoupper(md5(rand())),10,10);
                    $cur_date=date('Y-m-d');
                    $customer_name=session::get("customer_name");
                    $phone= session::get("phone");
                    $customer_email=session::get("customer_email");
                    $city= session::get("city");
                    $postal_code= session::get("postal_code");
                    $address= session::get("address");
                    $cash= session::get("cash");
                    $size= session::get("cash");
					$price ; //from database

					if (is_numeric($customer_name) || is_numeric($city) || is_numeric($customer_email) || is_numeric($address) ) {
                    	echo "<span style='color:red; font-size:25px'> customer_name, city, email, Address can not be numeric</span>";
                    	
                    }elseif (ctype_alpha($phone) || ctype_alpha($postal_code) ) //|| empty($phone) || empty($customer_email) || empty($city) || empty($postal_code) || empty($address)  || empty($cash)) {

                    	{echo "<span style='color:red; font-size:25px'>phone number, Postal code must not be alphanumeric</span>";
                    	
                    }elseif (empty($customer_name) || empty($phone) || empty($customer_email) || empty($city) || empty($postal_code) || empty($address)  || empty($cash)) {
                    	echo "<span style='color:red; font-size:25px'>Fields Must Not Be Empty </span> <a href='contact.php?product_id=$product_id'>Go back for check</a>";
                    	
                    }else {

                	$query="INSERT INTO fabric_order(foid, product_id, customer_email, size, total_price, order_date,hire_status, cash )
                			VALUES ('$foid', '$product_id', '$customer_email', '$size', '$price', '$cur_date', 'no', '$cash')";

                	$query2="INSERT INTO customer(customer_email, phone, customer_name, city, postal_code, address)
                			VALUES('$customer_email', '$phone', '$customer_name', '$city', '$postal_code', '$address')";
                	$insertedquery= $db->insert($query);
                	$insertedquery2=$db->insert($query2);

                    	if ($insertedquery) {
                    		echo "<span style='color:green; font-size:25px'>Your Order is proceed, we are in your door withing 5 working days</span>";
                    		}else {
                    			echo 'failed fabric_order';
                    		}
                    	if ($insertedquery2) {
                    		echo '';
                    		
                    	}else{
                    		echo 'failed customer';
                    	}
                    
                    }
                }
              }

				 ?>
					<tr><td></td></tr>

				<tr>
					<hr>
					

	
					<td>Your Full Name:  </td>
					<td>
						<input type="text" name="customer_name" placeholder="Phone number" value="<?php echo $customer_name;?>" readonly>
					</td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td>
					<input type="text" name="phone" placeholder="Phone number" value="<?php echo $phone;?>" readonly>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="customer_email" placeholder="Enter Email Address" value="<?php echo $customer_email;?>" readonly>
					</td>
				</tr>
				<tr>
					<td>City</td>
					<td>
					<input type="text" name="city" placeholder="city" value="<?php echo $city;?>" readonly/>
					</td>
				</tr>
				<tr>
					<td>postal code</td>
					<td>
					<input type="text" name="postal_code" placeholder="postal code" value="<?php echo $postal_code;?>"readonly>
					</td>
				</tr>
				<tr>
					<td>Your Address:</td>
					<td>
					<textarea name="address"><?php echo $address;?>"</textarea>
					</td>
				</tr>
				
					<tr><td><input type="radio" name="cash" value="Cash On Delivary" checked="checked">Cash On Devilary</td></tr>
					<tr><td>.</td></tr>
					
				<tr> <td><input type="submit" name="submit" value="Order proceed"/></td>
				
			</tr>

		</table>
	
<?php } ?>


	<form>				
 </div>

</div>
<?php include "inc/sidebar.php";?>

<?php include "inc/footer.php";?>