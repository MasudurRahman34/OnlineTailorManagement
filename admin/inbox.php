<!DOCTYPE html>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

    <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 
					if (isset($_GET['paidid'])) {
						$paidid= $_GET['paidid'];
						

					$query= "UPDATE fabric_order SET status = 1  WHERE foid= '$paidid'";
                    $updatedrow= $db->update($query);
                    if ($updatedrow) {
                         echo "<span class='success'> Order Paid Successfuly !!</span>";

                        
                    }else {
                        echo "<span class='error'> Something wrong !!</span>";
                    }
				}

			?>
    
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="8%">Oder_id.</th>
							<th width="10%">product_Id</th>
							<th width="10%">price</th>
							<th width="5%">Hire</th>
							<th width="10%">Customer_name</th>
							<th width="12%">Customer Email</th>
							<th width="8%">phone</th>
							<th width="12%">Address</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
						
						$cur_date=date('Y/m/d');
						echo $cur_date;
						$query="SELECT fabric_order.* , customer_name, address, phone FROM fabric_order, customer
								WHERE fabric_order.customer_email=customer.customer_email
								and status=0 order by foid desc";
						$fabric_order=$db->select($query);

						if ($fabric_order) {

							$i=0;
							while ($result = $fabric_order->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td width="8%"><?php echo $result['foid']; ?></td>
							<td width="10%"><?php echo $result['product_id']; ?></td>
							<td width="10%"><?php echo $result['total_price']; ?></td>
							<td width="5%"><?php echo $result['hire_status']; ?></td>
							<td width="10%"><?php echo $result['customer_name']; ?></td>
							<td width="12%"><?php echo $result['customer_email']; ?></td>
							<th width="8%"><?php echo $result['phone']; ?></th>
							<td width="12%"><?php echo $result['address']; ?></td>
							<td width="15%">
								<script>
									var foid = '<?php echo $result['foid']; ?>';
									var product_id = '<?php echo $result['product_id']; ?>';
									var nname = '<?php echo $result['customer_name']; ?>';
									var price = '<?php echo $result['total_price']; ?>';
									var email= '<?php echo $result['customer_email']; ?>';
									var phone= '<?php echo $result['phone']; ?>';
									var address= '<?php echo $result['address']; ?>';
									var hire_status= '<?php echo $result['hire_status']; ?>';
								</script>
								<a onclick="PrintElem(foid, product_id,  price, nname, email, phone, address, hire_status)" >invoice
								</a> || 
								<a href="?paidid=<?php echo $result['foid'] ?>" onclick="return confirm('Are You Sure To Pay?');">Pay Order</a>
							</td>
						</tr>
						<?php } }  ?>
					</tbody>
				</table>
               </div>
            </div>

         <div class="box round first grid">
                <h2>Paid Box</h2>
                <div class="block">        
                   <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="8%">Oder_id.</th>
							<th width="10%">product_Id</th>
							<th width="10%">price</th>
							<th width="10%">Customer_name</th>
							<th width="12%">Customer Email</th>
							<th width="10%">phone</th>
							<th width="15%">Address</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query="SELECT fabric_order.* , customer_name, address, phone FROM fabric_order, customer
								WHERE fabric_order.customer_email=customer.customer_email
								and status=1 order by order_date desc";
						$fabric_order=$db->select($query);

						if ($fabric_order) {

							$i=0;
							while ($result = $fabric_order->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td width="8%"><?php echo $result['foid']; ?></td>
							<td width="10%"><?php echo $result['product_id']; ?></td>
							<td width="10%"><?php echo $result['total_price']; ?></td>
							<td width="10%"><?php echo $result['customer_name']; ?></td>
							<td width="12%"><?php echo $result['customer_email']; ?></td>
							<th width="10%"><?php echo $result['phone']; ?></th>
							<td width="15%"><?php echo $result['address']; ?></td>
							<td width="15%">
								<a href="invoice.php?invoice=<?php echo $result['foid'] ?>">Invoice</a> || 
								<a href="?delid=<?php echo $result['foid'] ?>" onclick="return confirm('Are You Sure Delete Data ?');">Delete</a>
					

							</td>
						</tr>
						<?php } }  ?>
					</tbody>
				</table>
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

    	  function PrintElem(foid, product_id, price, name, email, phone, address, hire_status) {
		//        alert(DataArray);
		        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
		        mywindow.document.write('<html><head><title>' + document.title + '</title>');
		        mywindow.document.write('</head><body >');
		        mywindow.document.write('<h3>' + document.title + '</h3>');
		        mywindow.document.write('<h4>Order_Id : '+ foid +' </h4>');
		        mywindow.document.write('<h4>Product_Id :'+ product_id +' </h4>');
		        mywindow.document.write('<h4>Price '+ price +' </h4>');
		        mywindow.document.write('<h4>Customer_Name: '+ name +' </h4>');
		        mywindow.document.write('<h4>Email: '+ email +' </h4>');
		        mywindow.document.write('<h4>Phone: '+ phone +' </h4>');
		        mywindow.document.write('<h4>Address: '+ address +' </h4>');
		        mywindow.document.write('<h4> Hire_Status: ' +  hire_status +'</h4>');
		        console.log(foid['items']);

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