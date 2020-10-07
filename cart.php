<?php
include "inc/header.php";
if(isset($_GET['cartId'])){
    $cartId  = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['cartId']);
	$delPro  = $ct->DelProductByCart($cartId); 
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$quantity    = $_POST['quantity'];
	$cartId      = $_POST['cartId'];
	$upQuantity  = $ct->UpQuantity($quantity,$cartId);
	if($quantity <= 0){
		$ct->DelProductByCart($cartId);
	}
}
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
}
?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Cart</h2>

				<?php 
				if(isset($upQuantity)){
					echo $upQuantity;
				}
				if(isset($delPro)){
					echo $delPro;
				}
				?>
				<table class="tblone">
					<tr>
						<th width="5%">SL</th>
						<th width="15%">Product Name</th>
						<th width="15%">Image</th>
						<th width="10%">Price</th>
						<th width="15%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<?php
								$getCprod = $ct->GetCprod();
								if($getCprod){
									$i   = 0;
									$sum = 0;  
									$qty = 0;  
									foreach($getCprod as $value){
										$i++;
									
							?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $value['productName'];?></td>
						<td><img src="admin/<?php echo $value['image'];?>" alt="" /></td>
						<td><?php echo $value['price'];?></td>
						<td>
							<form action="" method="post">
								<input type="hidden" name="cartId" value="<?php echo $value['cartId'];?>" />
								<input type="number" name="quantity" value="<?php echo $value['quantity'];?>" />
								<input type="submit" name="submit" value="Update" />
							</form>
						</td>
						<td>
							<?php
								$total = $value['price']*$value['quantity'];
								echo $total;
								$sum  = $sum + $total;
								$Gsum = $sum +$sum*.10;
								$qty  = $qty+$value['quantity'];
								Session::set("sum", $sum);
								Session::set("qty", $qty);
							?>
						</td>
						<td><a onclick="return confirm('Are you sure to delete!')" ; href="?cartId=<?php echo $value['cartId'];?>">X</a></td>
					</tr>

					<?php } } ?>
				</table>
				<?php 
				$checkCart = $ct->CheckCart();
				if($checkCart){
				?>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Sub Total : </th>
						<td><?php echo $sum;?></td>
					</tr>
					<tr>
						<th>VAT : </th>
						<td>10%</td>
					</tr>
					<tr>
						<th>Grand Total</th>
						<td><?php echo $Gsum;?> </td>
					</tr>
				</table>
				<?php } else { 
					header("location: index.php");
					//echo "you cart is empty.Please purchase any product!";
				}?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="payment.php"> <img src="images/check.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include "inc/footer.php"?>
