<?php
include "inc/header.php";
if(!isset($_GET['productId']) or $_GET['productId'] == NULL){
    echo "<script>window.location = '404.php'</script>";
}else{
    $productId  = $_GET['productId'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	$quantity = $_POST['quantity'];
	$addCart  = $ct->AddCart($quantity,$productId);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
	$cmprId = $_POST['id'];
	$insert = $pd->insertCompareProd($cmprId,$cmrId);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wish'])){
	$cmrId = Session::get('id');
	$wlist = $pd->SaveWishList($productId,$cmrId);
}
?>
<style>
	.btn{
		float: left;
		margin-right: 25px;
	}
</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<?php
				$getProd = $pd->GetSinglePd($productId);
				if($getProd){
					while($result = $getProd->fetch_assoc()){
						
			?>
				<div class="grid images_3_of_2">
					<img src="admin/<?php echo $result['image'];?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName'];?>"</h2>
					<p><?php echo $fm->textShorten($result['body'],50);?></p>
					<div class="price">
						<p>Price: <span><?php echo $result['price'];?></span></p>
						<p>Category: <span><?php echo $result['catName'];?></span></p>
						<p>Brand:<span><?php echo $result['brandName'];?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1" />
							<input type="submit" class="buysubmit" name="submit" value="Buy Now" />
						</form>
					</div>

					<?php
						if(isset($addCart)){
							echo $addCart;
						}
					?>
					<?php 
						if(isset($insert)){
							echo $insert;
						}
					?>
					<?php 
						if(isset($wlist)){
							echo $wlist;
						}
					?>
					<?php
					$login = Session::get('login');
					if($login == true){
					?>
					<div class="add-cart">
					<div class="btn">
						<form action="" method="post">
							<input type='hidden' value="<?php echo $result['productId'];?>" class="buysubmit" name="id">
							<input type="submit" class="buysubmit" name="compare" value="Add to Compare">
						</form>	
						</div>
						<div class="btn">					
						<form action="" method="post">
							<input type="submit" class="buysubmit" name="wish" value="Save to List">
						</form>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="product-desc">
					<h2>Product Details</h2>
					<p><?php echo $result['body'];?>
					<p>
				</div>
				<?php } } ?>

			</div>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php 
					$getCat = $cat->catagoryList();
					if($getCat){
						foreach($getCat as $data){
							
				?>
					<li><a href="productbycat.php?id=<?php echo $data['catId'];?>"><?php echo $data['catName'];?></a></li>
					<?php } }?>

				</ul>

			</div>
		</div>
	</div>
	<?php include "inc/footer.php"?>
