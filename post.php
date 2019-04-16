<?php include "inc/header.php";?>

<?php 
	if (!isset($_GET['product_id']) || $_GET['product_id'] == NULL)  {
		header("Location:404.php");
		
	}else{
		$product_id= $_GET['product_id'];
	}
 ?>


	<div class="contentsection contemplete clear">

		<div class="maincontent clear">

			<div class="about">
						

				<?php 
						
						$query= "SELECT product.*, product_type.product_type, name
									FROM product, product_type, catagory 
									WHERE product.product_typeid=product_type.product_typeid
									and product_type.cid=catagory.catid 
									and product_id= '$product_id'";
						$post= $db->select($query); 
						if ($post) {
							while ($result= $post->fetch_assoc()) {
					
					?>


				<h2><a href="post.php?product_id=<?php echo $result['product_id']; ?>"><?php echo $result['title']; ?></a></h2>
				<h4><?php echo $result['ddate']; ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				<img src="admin/<?php echo $result['image']; ?>" alt="post image"/>
				 <table class="table-bordered">
					<tr>
						<td> <?php echo "pruduct_id  : ".$result['product_id'] ?></td></tr>
						<tr><td> <?php echo "product_type : ".$result['product_type'] ?></td></tr>
						<tr><td> <?php echo "Price : ".$result['price'].'TK Only' ?></td></tr>
						<tr><td> <?php echo "season : ".$result['Season'] ?></td></tr>
						<tr><td> <?php echo "weght : ".$result['weight']."g" ?></td></tr>
						

					
				</table> 
				
				<?php echo $result['body'] ?> <br> <br> <br>
				<div class="readmore clear">
					<a href="contact.php?product_id=<?php echo $result['product_id']; ?>">BUY PRODUCT</a>
				</div> <br> <br> <br>

				
				<?php  
				$product_typeid= $result['product_typeid'];
			
				?>
				<?php } ?>
				
				<div class="relatedpost clear">
					<h2>Related Fabrics</h2>

					<?php  
						
						$queryrelated= "select * from product where product_typeid = '$product_typeid' order by product_id desc";
						$relatedpost= $db->select($queryrelated); 
						if ($relatedpost) {
							while ($rresult= $relatedpost->fetch_assoc()) {
					?>
					<a href="post.php?product_id=<?php echo $rresult['product_id']; ?>"><img src="admin/<?php echo $rresult['image']; ?>" alt="post image"/></a>
					
					<?php } }  else {
						echo 'No Related Post Available';
					}
						
					?>
				</div>

				<?php }  else { header("Location:404.php");  } ?>



	</div>



		</div>
	

<?php include "inc/sidebar.php";?>

	</div>
		

<?php include "inc/footer.php";?>