<!DOCTYPE html>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

    <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 
					if (isset($_GET['confirmid'])) {
						$confirmid= $_GET['confirmid'];
						

					$query= "UPDATE hire_info SET cornfirm = 1  WHERE hid= '$confirmid'";
                    $updatedrow= $db->update($query);
                    if ($updatedrow) {
                         echo "<span class='success'> Confirm Successfuly !!</span>";

                        
                    }else {
                        echo "<span class='error'> Something wrong !!</span>";
                    }
				}

			?>
    
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">hire_id</th>
							<th width="15%">Name</th>
							<th width="15%">Email</th>
							<th width="10%">Phone</th>
							<th width="5%">Fabric</th>
							<th width="10%">Available Time</th>
							<th width="20%">Adresss</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
						
						$cur_date=date('Y/m/d');
						echo $cur_date;
						$query="SELECT * from hire_info where cornfirm=0 order by hid desc";
						$hire_info=$db->select($query);

						if ($hire_info) {

							$i=0;
							while ($result = $hire_info->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td width="10%"><?php echo $result['hid']; ?></td>
							<td width="15%"><?php echo $result['fullname']; ?></td>
							<td width="15%"><?php echo $result['email']; ?></td>
							<td width="10%"><?php echo $result['phone']; ?></td>
							<td width="5%"><?php echo $result['fabric']; ?></td>
							<td width="10%"><?php echo $result['available']; ?></td>
							<td width="20%"><?php echo $result['address']; ?></td>
							<td width="15%">
								<script>
									var data = '<?php echo $result['hid']; ?>';
									var fullname = '<?php echo $result['fullname']; ?> ';
									var email = '<?php echo $result['email']; ?>';
									var phone = '<?php echo $result['phone']; ?>';
									var fabric = '<?php echo $result['fabric']; ?>';
									var available = '<?php echo $result['available']; ?>';
									var address = '<?php echo $result['address']; ?>';
								</script>
								<a onclick="PrintElem(data, fullname , email, phone, fabric, available, address)" >invoice
								</a> || 
								<a href="?confirmid=<?php echo $result['hid'] ?>" onclick="return confirm('Are You Sure To Confirm ?');">Confirm</a>
							</td>
						</tr>
						<?php } }  ?>
					</tbody>
				</table>
               </div>
            </div>

         <div class="box round first grid">
                <h2>Confirmation Box</h2>
                <div class="block">        
                   <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">hire_id</th>
							<th width="15%">Name</th>
							<th width="15%">Email</th>
							<th width="10%">Phone</th>
							<th width="5%">Fabric</th>
							<th width="10%">Available time</th>
							<th width="20%">Adresss</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						
						$cur_date=date('Y/m/d');
						echo $cur_date;
						$query="SELECT * from hire_info where cornfirm=1 order by hid desc";
						$hire_info=$db->select($query);

						if ($hire_info) {

							$i=0;
							while ($result = $hire_info->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td width="10%"><?php echo $result['hid']; ?></td>
							<td width="15%"><?php echo $result['fullname']; ?></td>
							<td width="15%"><?php echo $result['email']; ?></td>
							<td width="10%"><?php echo $result['phone']; ?></td>
							<td width="5%"><?php echo $result['fabric']; ?></td>
							<td width="10%"><?php echo $result['available']; ?></td>
							<td width="20%"><?php echo $result['address']; ?></td>
							<td width="15%">
								<script>
									var data = '<?php echo $result['hid']; ?>';
									var fullname = '<?php echo $result['fullname']; ?> ';
									var email = '<?php echo $result['email']; ?>';
									var phone = '<?php echo $result['phone']; ?>';
									var fabric = '<?php echo $result['fabric']; ?>';
									var available = '<?php echo $result['available']; ?>';
									var address = '<?php echo $result['address']; ?>';
								</script>
								<a onclick="PrintElem(data, fullname , email, phone, fabric, available, address)" >invoice
								</a> || 
								<a href="?delid=<?php echo $result['hid'] ?>" onclick="return confirm('Are You Sure To delete?');">Delete</a>
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

    	  function PrintElem(DataArray, fullname, email, phone, fabric, available, address) {
		//        alert(DataArray);
		        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
		        mywindow.document.write('<html><head><title>' + document.title + '</title>');
		        mywindow.document.write('</head><body >');
		        mywindow.document.write('<h3>' + document.title + '</h3>');
		        mywindow.document.write('<h4>Hire ID: '+ DataArray +' </h4>');
		        mywindow.document.write('<h4>Customer Name: '+ fullname +' </h4>');
		        mywindow.document.write('<h4>Email :' + email +' </h4>');
		        mywindow.document.write('<h4>phone :' + phone +' </h4>');
		        mywindow.document.write('<h4>Fabric :' + fabric +'  </h4>');
		        mywindow.document.write('<h4> Available Time :' + available +'  </h4>');
		        mywindow.document.write('<h4>Address :' + address +'  </h4>');
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