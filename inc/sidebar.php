		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
				<ul>
							
				<?php 
					
					$query= "select * from catagory";
					$post= $db->select($query); 
					if ($post) {
						while ($result= $post->fetch_assoc()) {
						
						?>						
						<li><a href="posts.php?catid=<?php echo $result['catid'] ;?>"><?php echo $result['name']; ?></a></li>
						
						<?php } } ?>

					</ul>
			</div>
			
			<div class="samesidebar clear">
				<marquee><h2>Latest Product</h2></marquee>
					<?php 
						$query= "select * from product limit 3";
						$post= $db->select($query); 
						if ($post) {
							while ($result= $post->fetch_assoc()) {
					
							 ?>
					<div class="popular clear">
						<h3><a href="post.php?product_id=<?php echo $result['product_id'] ?>"><?php echo $result['title'];?></a></h3>
						<a href="post.php?product_id=<?php echo $result['product_id'] ?>"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
						<p><?php echo $fm->textShorten($result['body'],120); ?></p>	
					</div>

					<?php } } else { header("Location:404.php");  } ?>
			</div>
			
		</div>