	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
					$getIpone = $pd->GetIpone();
					if($getIpone){
						foreach($getIpone as $data){
							
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="detail.php?productId=<?php echo $data['productId'];?>"><img src="admin/<?php echo $data['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						<h2>Ipone</h2>
						<p><?php echo $data['productName'];?></p>
						<div class="button"><span><a href="detail.php?productId=<?php echo $data['productId'];?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php } } ?>
				<?php 
					$getDell = $pd->GetDell();
					if($getDell){
						foreach($getDell as $data){
							
				?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="detail.php?productId=<?php echo $data['productId'];?>"><img src="admin/<?php echo $data['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						<h2>Dell</h2>
						<p><?php echo $data['productName'];?></p>
						<div class="button"><span><a href="detail.php?productId=<?php echo $data['productId'];?>">Add to cart</a></span></div>
					</div>
				</div>
			</div>
			<?php } }?>
			<div class="section group">
				<?php 
					$getXiaomi = $pd->GetXiaomi();
					if($getXiaomi){
						foreach($getXiaomi as $data){
							
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="detail.php?productId=<?php echo $data['productId'];?>"><img src="admin/<?php echo $data['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						<h2>Xiaomi</h2>
						<p><?php echo $data['productName'];?></p>
						<div class="button"><span><a href="detail.php?productId=<?php echo $data['productId'];?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php } } ?>
				<?php 
					$getCanon = $pd->GetCanon();
					if($getCanon){
						foreach($getCanon as $data){
							
				?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="detail.php?productId=<?php echo $data['productId'];?>"><img src="admin/<?php echo $data['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						<h2>Canon</h2>
						<p><?php echo $data['productName'];?></p>
						<div class="button"><span><a href="detail.php?productId=<?php echo $data['productId'];?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php } }?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_bottom_right_images">
			<!-- FlexSlider -->

			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt="" /></li>
						<li><img src="images/2.jpg" alt="" /></li>
						<li><img src="images/3.jpg" alt="" /></li>
						<li><img src="images/4.jpg" alt="" /></li>
					</ul>
				</div>
			</section>
			<!-- FlexSlider -->
		</div>
		<div class="clear"></div>
	</div>
