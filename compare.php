<?php
include "inc/header.php";
$login  = Session::get('login');
if($login == false){
	echo "<script>window.location = 'login.php'</script>";
}
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
}
?>
<style>
	table.tblone img {
    height: 100px;
    width: 110px;
}
</style>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Compare</h2>

				<?php 
				if(isset($delPro)){
					echo $delPro;
				}
				?>
				<table class="tblone">
					<tr>
						<th>SL</th>
						<th>Product Name</th>
						<th>Image</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
					<?php
						$id = Session::get('id');
						$getComprod = $ct->GetComprod($id);
						if($getComprod){
						 	$i   = 0;
							foreach($getComprod as $value){
								$i++;
									
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $value['productName'];?></td>
						<td><img src="admin/<?php echo $value['image'];?>" alt="" /></td>
						<td><?php echo $value['price'];?></td>
						<td><a href="detail.php?productId=<?php echo $value['productId'];?>">View</a></td>
					</tr>
					<?php } } ?>
				</table>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include "inc/footer.php"?>
