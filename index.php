<?php
	include "inc/header.php";
	include "inc/slider.php";
?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Feature Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
				$getFpd = $pd->GetFpd();
				if($getFpd){
					while($value = $getFpd->fetch_assoc()){
						
		    ?>
			<div class="grid_1_of_4 images_1_of_4">
				<a href="detail.php?productId=<?php echo $value['productId'];?>"><img src="admin/<?php echo $value['image'];?>" height="100px" width="60px" alt="" /></a>
				<h2><?php echo $value['productName'];?></h2>
				<p><?php echo $fm->textShorten($value['body'],50);?></p>
				<p><span class="price"><?php echo $value['price'];?></span></p>
				<div class="button"><span><a href="detail.php?productId=<?php echo $value['productId'];?>" class="details">Details</a></span></div>
			</div>
			<?php } }?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>New Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
				$getNpd = $pd->GetNpd();
				if($getNpd){
					while($value = $getNpd->fetch_assoc()){
						
		    	?>
			<div class="grid_1_of_4 images_1_of_4">
				<a href="detail.php?productId=<?php echo $value['productId'];?>"><img src="admin/<?php echo $value['image'];?>" alt="" /></a>
				<h2><?php echo $value['productName'];?></h2>
				<p><span class="price"><?php echo $value['price'];?></span></p>
				<div class="button"><span><a href="detail.php?productId=<?php echo $value['productId'];?>" class="details">Details</a></span></div>
			</div>
			<?php } }?>
		</div>
	</div>
</div>
<?php include "inc/footer.php"?>
