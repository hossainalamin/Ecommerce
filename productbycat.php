<?php include "inc/header.php"?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Latest from Catagory</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
	    if(!isset($_GET['id']) or $_GET['id'] == NULL){
            echo "<script>window.location = '404.php'</script>";
        }else{
            $id  = $_GET['id'];
        }
		$getProd = $pd->GetProdByCat($id);
		if($getProd){
			foreach($getProd as $value){
				
		?>
			<div class="grid_1_of_4 images_1_of_4">
				<a href="detail.php?productId=<?php echo $value['productId'];?>"><img src="admin/<?php echo $value['image'];?>" height="100px" width="60px" alt="" /></a>
				<h2><?php echo $value['productName'];?></h2>
				<p><?php echo $fm->textShorten($value['body'],50);?></p>
				<p><span class="price"><?php echo $value['price'];?></span></p>
				<div class="button"><span><a href="detail.php?productId=<?php echo $value['productId'];?>" class="details">Details</a></span></div>
			</div>
			<?php } } else{ echo "<script>window.location = '404.php'</script>";}
			?>
		</div>



	</div>
</div>
<?php include "inc/footer.php"?>
