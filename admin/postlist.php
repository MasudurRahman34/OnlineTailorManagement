<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Fabric List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="2%">No.</th>
							<th width="11%">Post Title</th>
							<th width="8%">Product Id</th>
							<th width="9%">product Type</th>
							<th width="8%">Price</th>
							<th width="8%">Season</th>
							<th width="8%">Weight</th>
							<th width="10%">Description</th>
							<th width="5%">Tags</th>
							<th width="12%">Image</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$query= "SELECT product.*, product_type.product_type, name
							FROM product, product_type, catagory 
							WHERE product.product_typeid=product_type.product_typeid
							and product_type.cid=catagory.catid order by product_id desc";
							$query=$db->select($query);
							if ($query) {
								$i=0;
								while ($result=$query->fetch_assoc()) {
								    $i++;
								
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td> <a href="editpost.php?editpostid= <?php echo $result['product_id'];?>"><?php echo $result['title']; ?></a></td>
							<td><?php echo $result['product_id']; ?></td>
							<td> <?php echo $result['product_type']; ?></td>
							
							<td> <?php  echo $result['price']; ?></td>
							<td> <?php  echo $result['Season']; ?></td>
							<td><?php  echo $result['weight']; ?></td>
							<td><?php echo $fm->textShorten($result['body'], 20 ); ?></td>
							<td><?php echo $result['tags']; ?></td>
							<td> <img src="<?php echo $result['image']?>" height="40px" width="60px"; /> </td>
							<td><a href="editpost.php?editpostid=<?php echo $result['product_id']; ?>">Edit</a> || <a onclick="return confirm('Are You Sure ?');" href="deletepost.php?delpost=<?php echo $result['product_id']; ?>">Delete</a></td>
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
	   
</body>
</php>
