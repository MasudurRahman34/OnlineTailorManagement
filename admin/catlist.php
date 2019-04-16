<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

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



                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


						<?php 

						$query="SELECT * FROM catagory ORDER BY catid DESC";
						$catagory=$db->select($query);

						if ($catagory) {

							$i=0;
							while ($result = $catagory->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $result['catid'];?>">Edit
								</a> 
								|| <a onclick="return confirm('Are You Sure ?');" href="?delcat=<?php echo $result['catid']; ?>">Delete
								</a>
							</td>
						</tr>
						<?php } } ?>
					
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

        
        <?php include 'inc/footer.php';?>