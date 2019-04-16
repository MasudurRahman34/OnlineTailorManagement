<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>sale list</h2>
`
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Product Price</th>
							<th>Number Of Sold Time</th>
							<th>Amount</th>
							<!--<th>Action</th>-->
						</tr>
					</thead>
					<tbody>


						<?php 
						$firstday_previousmonth=date('Y-m-d', strtotime("first day of previous month"));
						
						$lasday_previousmonth=date('Y-m-d', strtotime("last day of previous month"));
						

						//$query="SELECT title AS 'product Name', customer_name, order_date, price FROM fabric_order, customer, product WHERE fabric_order.customer_email=customer.customer_email and product.product_id=fabric_order.product_id and status=1 AND order_date BETWEEN like '$firstday_previousmonth%' AND LIKE '$lasday_previousmonth%'  order by foid desc";*/


						$cur_date=date('Y-m-d');
						echo "<span style='color:green; font-size:15px'>Todays date </span>".$cur_date."<br>";
						
						  $query="SELECT shirt_design.product_id, title as Product_Name, price,count(shirt_design.product_id) as 'Number Of Sold Time', count(shirt_design.product_id)*price As Sold_Amount from
									shirt_design, product
									where shirt_design.product_id=product.product_id and status=1 group by product_id"; 
						$quantity=$db->select($query);


						//$total=$result['dtotal']+$result['karim'];

						//echo "<span style='color:green; font-size:15px'>Todays design Sale Total </span>".$total."<br>";
						
						if ($quantity) {

							$i=0;
							while ($result = $quantity->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['product_id']; ?></td>
							<td><?php echo $result['Product_Name']; ?></td>
							<td><?php echo $result['price']; ?></td>
							<td><?php echo $result['Number Of Sold Time']; ?></td>
							<td><?php echo $result['Sold_Amount']; ?></td>

							<!--<td>
								<script>
									var data = '<?php echo $result['price']; ?> ';
									var data2 = '<?php echo $result['customer_name']; ?> ';
									var data3 = '<?php echo $result['product Name']; ?>';
								</script>
								<a onclick="PrintElem(data, data2 , data3)" >Print
								</a>

							</td>-->
						</tr>

						<?php } } ?>
					
					</tbody>
				</table>


				
               </div>
              </div>
          </div>