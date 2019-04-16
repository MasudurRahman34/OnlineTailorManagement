<!DOCTYPE html>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

    <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 
					if (isset($_GET['paidid'])) {
						$paidid= $_GET['paidid'];
						

					$query= "UPDATE shirt_design SET status = 1  WHERE design_id= '$paidid'";
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
							<th width="8%">design_id.</th>
							<th width="10%">product_Id</th>
							<th width="10%">mesurment_id</th>
							<th width="10%">price</th>
							<th width="12%">Customer Email</th>
							<th width="10%">phone</th>
							<th width="15%">Address</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query="SELECT shirt_design.*, shirt_measurment.*, price, phone, address FROM shirt_design, shirt_measurment, product, customer WHERE shirt_design.customer_email=shirt_measurment.customer_email and shirt_measurment.customer_email=customer.customer_email and shirt_design.product_id=product.product_id and status=0 order by design_id desc";
						$design_order=$db->select($query);

						if ($design_order) {

							$i=0;
							while ($result = $design_order->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							
							<td width="8%"><?php echo $result['design_id']; ?></td>
							<td width="10%"><?php echo $result['product_id']; ?></td>
							<td width="10%"><?php echo $result['measurment_id']; ?></td>
							<td width="10%"><?php echo $result['price'] ?></td>
							<td width="12%"><?php echo $result['customer_email']; ?></td>
							<td width="10%"><?php echo $result['phone']; ?></td>
							<td width="15%"><?php echo $result['address']; ?></td>
							<td width="15%">
								<script>
									var did = '<?php echo $result['design_id']; ?>';
									var product_id = '<?php echo $result['product_id']; ?>';
									var measurment_id = '<?php echo $result['measurment_id']; ?>';

									var pocket = '<?php echo $result['pocket']; ?>';
									var dsleeve = '<?php echo $result['dsleeve']; ?>';
									var front = '<?php echo $result['front']; ?>';
									var back_pleats = '<?php echo $result['back_pleats']; ?>';
									var cuffs = '<?php echo $result['cuffs']; ?>';
									var collar = '<?php echo $result['collar']; ?>';
									var other = '<?php echo $result['other']; ?>';
									var neck = '<?php echo $result['neck']; ?>';
									var chest = '<?php echo $result['chest']; ?>';
									var waist = '<?php echo $result['waist']; ?>';
									var hip = '<?php echo $result['hip']; ?>';
									var length = '<?php echo $result['length']; ?>';
									var sleeve = '<?php echo $result['sleeve']; ?>';
									var price = '<?php echo $result['price']; ?>';
								</script>
								<a onclick="PrintElem(did, product_id, measurment_id, pocket, dsleeve, front, back_pleats, cuffs, other, neck, chest, waist, hip, length, sleeve, price)" >invoice
								</a> || 
								<a href="?paidid=<?php echo $result['design_id'] ?>" onclick="return confirm('Are You Sure To Pay?');">Deliver</a> 
								
							</td>
						</tr>
						<?php } }  ?>
					</tbody>
				</table>
               </div>
            </div>

         <div class="box round first grid">
                <h2>Deliver Product</h2>
                <div class="block">        
                   <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="8%">design_id.</th>
							<th width="10%">product_Id</th>
							<th width="10%">price</th>
							<th width="10%">mesurment_id</th>
							<th width="12%">Customer Email</th>
							<th width="10%">phone</th>
							<th width="15%">Address</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query="SELECT shirt_design.*, shirt_measurment.*, price, phone, address FROM shirt_design, shirt_measurment, product, customer WHERE shirt_design.customer_email=shirt_measurment.customer_email and shirt_measurment.customer_email=customer.customer_email and shirt_design.product_id=product.product_id and status=1 order by design_id desc";
						$design_order=$db->select($query);

						if ($design_order) {

							$i=0;
							while ($result = $design_order->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td width="8%"><?php echo $result['design_id']; ?></td>
							<td width="10%"><?php echo $result['product_id']; ?></td>
							<td width="10%"><?php echo $result['measurment_id']; ?></td>
							<td width="10%"><?php echo $result['price'] ?></td>
							<td width="12%"><?php echo $result['customer_email']; ?></td>
							<td width="10%"><?php echo $result['phone']; ?></td>
							<td width="15%"><?php echo $result['address']; ?></td>
							<td width="15%">
								<a href="invoice.php?invoice=<?php echo $result['design_id'] ?>">Invoice</a> || 
								<a href="?delid=<?php echo $result['design_id'] ?>" onclick="return confirm('Are You Sure Delete Data ?');">Delete</a>
					

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

    	  function PrintElem(did, product_id, measurment_id, pocket, dsleeve, front, back_pleats, cuffs, other, neck, chest, waist, hip, length, sleeve, price) {
		//        alert(DataArray);
		        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
		        mywindow.document.write('<html><head><title>' + document.title + '</title>');
		        mywindow.document.write('</head><body >');
		        mywindow.document.write('<h3>' + document.title + '</h3>');
		        mywindow.document.write('<h4>Design_ID: '+ did +' </h4>');
		        mywindow.document.write('<h4>product_id: '+ product_id +' </h4>');
		        mywindow.document.write('<h4>measurment_id: '+ measurment_id +' </h4>');
		        mywindow.document.write('<h4>pocket: '+ pocket +' </h4>');
		        mywindow.document.write('<h4>dsleeve: '+ dsleeve +' </h4>');
		        mywindow.document.write('<h4>front: '+ front +' </h4>');
		        mywindow.document.write('<h4>back_pleats: '+ back_pleats +' </h4>');
		        mywindow.document.write('<h4>cuffs: '+ cuffs +' </h4>');
		        mywindow.document.write('<h4>other: '+ other +' </h4>');
		        mywindow.document.write('<h4>Neck: '+ neck +' </h4>');
		        mywindow.document.write('<h4>Chest: '+ chest +' </h4>');
		        mywindow.document.write('<h4>waist: '+ waist +' </h4>');
		        mywindow.document.write('<h4>Hip: '+ hip +' </h4>');
		        mywindow.document.write('<h4>length: '+ length +' </h4>');
		        mywindow.document.write('<h4>Sleeve: '+ sleeve +' </h4>');
		        mywindow.document.write('<h4>Price: '+ price +' </h4>');
		        console.log(did['items']);

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