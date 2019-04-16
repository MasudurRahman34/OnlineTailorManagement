<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>sale list</h2>

			<?php

				if (isset($_GET['delcat']))  {
       				 $delcatid= $_GET['delcat'];
       				 $delquery= "delete from catagory where catid='$delcatid'";
       				 $delquery= $db->delete($delquery);
       				 	if ($delquery) {
                         echo "<span class='success'> CATAGORY DELETED SUCCESSFULLY !!</span>";
                        
                    }else {
                        echo "<span class='error'> NOR DELETED !!</span>";
                    }
    				}
			  ?>
`
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Product Name</th>
							<th>Customer Name</th>
							<th>Order date</th>
							<th>Total Price</th>
							<!--<th>Action</th>-->
						</tr>
					</thead>
					<tbody>


						<?php 
						$firstday_previousmonth=date('Y-m-d', strtotime("first day of previous month"));
						echo "first day of previous month = ".$firstday_previousmonth."<br>"; 
						
						$lasday_previousmonth=date('Y-m-d', strtotime("last day of previous month"));
						echo "last day of previous month = ".$lasday_previousmonth."<br>";

						

						$cur_date=date('Y-m-d');
						echo "<span style='color:green; font-size:15px'>Todays date </span>".$cur_date."<br>";

						$query="SELECT title AS 'product Name', customer_name, order_date, price FROM fabric_order, customer, product WHERE fabric_order.customer_email=customer.customer_email and product.product_id=fabric_order.product_id and status=1 AND order_date BETWEEN '$firstday_previousmonth' AND '$lasday_previousmonth'  order by foid desc";

						
						 /* $query="SELECT title AS 'product Name', customer_name, order_date, price FROM fabric_order, customer, product WHERE fabric_order.customer_email=customer.customer_email and product.product_id=fabric_order.product_id and status=1  AND order_date='$cur_date' order by foid desc";*/
						$catagory=$db->select($query);
						$sum= "SELECT sum(total_price) AS karim FROM `fabric_order` where order_date ='$cur_date' and status=1";
						$sum=$db->select($sum);
						$result = mysqli_fetch_array($sum);
						
					
						echo "<span style='color:green; font-size:15px'>Todays fabric sale = </span>".$result['karim']."<br>";
						$sum= "SELECT sum(price) AS dtotal FROM shirt_design, product WHERE shirt_design.product_id=product.product_id and status and shirt_design.ddate='$cur_date' and status=1";
						$sum=$db->select($sum);
						$result = mysqli_fetch_array($sum);

					
						echo "<span style='color:green; font-size:15px'>Todays design Sale = </span>".$result['dtotal']."<br>";
						//$total=$result['dtotal']+$result['karim'];

						//echo "<span style='color:green; font-size:15px'>Todays design Sale Total </span>".$total."<br>";
						
						if ($catagory) {

							$i=0;
							while ($result = $catagory->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['product Name']; ?></td>
							<td><?php echo $result['customer_name']; ?></td>
							<td><?php echo $result['order_date']; ?></td>
							<td><?php echo $result['price']; ?></td>

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

                 <div class="box round first grid">
                <h2>design paid Box</h2>
                <div class="block">        
                   <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="8%">Design_id.</th>
							<th width="10%">product_Id</th>
							<th width="10%">price</th>
							<th width="10%">Customer_name</th>
							<th width="12%">Customer Email</th>
							<th width="10%">phone</th>
							<th width="15%">Address</th>
							<!--<th width="15%">Action</th>-->
						</tr>
					</thead>
					<tbody>
						<?php 
						$query="SELECT shirt_design.*, shirt_measurment.*, price, phone, address, customer_name FROM shirt_design, shirt_measurment, product, customer WHERE shirt_design.customer_email=shirt_measurment.customer_email and shirt_measurment.customer_email=customer.customer_email and shirt_design.product_id=product.product_id and status=1  and shirt_design.ddate='$cur_date' order by design_id desc";
						$design_order=$db->select($query);
						$count=mysqli_num_rows($design_order);
						if ($count<1) {
							# code...
							echo "no purchase today";
						}elseif ($design_order) {
							$i=0;
							while ($result = $design_order->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							
							<td width="8%"><?php echo $result['design_id']; ?></td>
							<td width="10%"><?php echo $result['product_id']; ?></td>
							<td width="10%"><?php echo $result['price'] ?></td>
							<td width="12%"><?php echo $result['customer_name']; ?></td>
							<td width="12%"><?php echo $result['customer_email']; ?></td>
							<td width="10%"><?php  echo $result['phone'];?></td>
							<td width="15%"><?php  echo $result['address'];?></td>
							<!--<td width="15%">
								<script>
									var data = '<?php echo $result['product_id']; ?>';
									var data1 = '<?php echo $result['customer_name']; ?> ';

									var data3 = '<?php echo $result['price']; ?>';
								</script>
								<a onclick="PrintElem(data, data1 , data3)" >invoice
								</a>
								
								
							</td>-->
						</tr>
						<?php } }  ?>
					</tbody>
				</table>
               </div>
            </div>

            </div>
        </div>


	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <script type="text/javascript">

    	  function PrintElem(DataArray, data2, data3) {
		//        alert(DataArray);
		        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
		        mywindow.document.write('<html><head><title>' + document.title + '</title>');
		        mywindow.document.write('</head><body >');
		        mywindow.document.write('<h3>' + document.title + '</h3>');
		        mywindow.document.write('<h4 style='color:red;'>product Name '+ data3 +' </h4>');
		        mywindow.document.write('<h4>price: '+ DataArray +' </h4>');
		        mywindow.document.write('<h4>customer_name: '+ data2 +' </h4>');
		        mywindow.document.write('<h4>Bill:  </h4>');
		        mywindow.document.write('<h4>Items: ' + +'</h4>');
		        console.log(DataArray['items']);

		//        mywindow.document.write(document.getElementById(elem).innerHTML);
		        mywindow.document.write('</body></html>');
		        mywindow.document.close(); // necessary for IE >= 10
		        mywindow.focus(); // necessary for IE >= 10*/
		        mywindow.print();
		        mywindow.close();
		        return true;
		    }
</script>
 

        
        <?php include 'inc/footer.php';?>