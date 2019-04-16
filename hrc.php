<?php include "inc/header.php";?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Hire us</h2>
			<form action="" method="post">

			<?php 

				//echo "<script>alert('You have additional pay 500 tk For hiring tailor');</script>";
					if ($_SERVER['REQUEST_METHOD']=='POST') {
					$hid='hid'.substr(strtoupper(md5(rand())),6,6);
					$fullname= mysqli_real_escape_string($db->link,$_POST['fullname']);
					$emailname= mysqli_real_escape_string($db->link,$_POST['emailname']);
					$phone= mysqli_real_escape_string($db->link,$_POST['phone']);
					$fabric= mysqli_real_escape_string($db->link,$_POST['fabric']);
					$available= mysqli_real_escape_string($db->link,$_POST['ddate'])." ".mysqli_real_escape_string($db->link,$_POST['ttime']);
					$address= mysqli_real_escape_string($db->link,$_POST['address']);

					if ( $fullname=="" || $emailname=="" || $phone=="" || $fabric=="" || $available=="" || $address=="") {
						 echo "<span class='error'>Field Must Not Be Empty !!</span>";
					}elseif (ctype_alpha($phone)) 

                        {echo "<span style='color:red; font-size:25px'>phone number must not be alphanumeric</span>";
                    }else{
                    	$query="INSERT INTO hire_info(hid, fullname, email, phone, fabric, available, address) VALUES('$hid', '$fullname', '$emailname', '$phone', '$fabric', '$available', '$address')";
                    	$hire=$db->insert($query);
                    	if ($hire) {
                    		print_r($hire);
                    	}
                    }
				}
			?>

				<table>
				<tr>
					<td>Your Full Name:</td>
					<td>
					<input type="text" name="fullname" placeholder="Enter first name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="emailname" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Contact Number:</td>
					<td>
					<input type="text" name="phone" placeholder="Phone number">
					</td>
				</tr>
				<tr>
					<td>Do You Have Fabric:</td>
					<td>
					<input type="radio" name="fabric" value="Yes"/>Yes
					<input type="radio" name="fabric" value="No" />No
					</td>
				</tr><br>
				<tr>
					<td>Your Available Date:</td>
					<td>
					<input type="date" name="ddate"/>
					<input type="time" name="ttime" />
					</td><br>
				</tr>
				<tr>
					<td>Your Address:</td>
					<td>
					<textarea name="address" ></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
<?php include "inc/sidebar.php";?>

<?php include "inc/footer.php";?>