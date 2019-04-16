<?php include "inc/header.php";?>


<?php 
	if (!isset($_GET['search']) || $_GET['search'] == NULL)  {
		header("Location:404.php");
		
	}else{
		$search= $_GET['search'];
		

	}
 ?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear"> 

		
		<?php 

			echo '<h4>'.'Related Product According To '.$search.'</h4>';
			$query= "SELECT product.*, product_type.product_type FROM product, product_type
					WHERE product.product_typeid=product_type.product_typeid
					AND title LIKE '%$search%' OR product_type LIKE '%$search%' OR tags LIKE '%$search%' ";
			$post= $db->select($query); 
			if ($post) {
				while ($result= $post->fetch_assoc()) {
				
				?>

			<div class="samepost clear">

				<h2><a href="post.php?product_id=<?php echo $result['product_id']; ?>"><?php echo $result['title']; ?></a></h2>
				<h4><?php echo $result['ddate']; ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>

				 <table class="table-bordered ">
					<tr>
						<td> <?php echo "pruduct_id  : ".$result['product_id'] ?></td></tr>
						<tr><td> <?php echo "product_type : ".$result['product_type'] ?></td></tr>
						<tr><td> <?php echo "season : ".$result['Season'] ?></td></tr>
						<tr><td> <?php echo "weght : ".$result['weight']."g" ?></td></tr>
						

					
				</table>
				
					<?php echo $fm->textShorten($result['body']); ?>
				


				<div class="readmore clear">
					<a href="post.php?product_id=<?php echo $result['product_id']; ?>">View Product</a>
				</div>
			</div>

			<?php } ?><!-- end while loop-->

			<?php } else{
					echo 'Data Not Found';;
			} ?>

		</div>
		<?php include "inc/sidebar.php";?>
	</div>



<?php include "inc/footer.php";?>