<?php include "inc/header.php"?>
<?php
	$login  = Session::get('login');
	if($login == false){
		echo "<script>window.location = 'login.php'</script>";
	}
if(isset($_GET['orderId']) && ($_GET['orderId']=='order')){
	$id = Session::get('id');
	$orderProduct = $cmr->OrderProduct($id);
	$delData = $ct->DelCartData();
	header("location:success.php");

}

?>
<style>
	.divission {
		width: 50%;
		float: left;
	}

	.tblone {
		width: 500px;
		text-align: justify;
	}

	.ordernow {}

	.ordernow a {
		width: 200px;
		margin: 0 auto;
		background: red;
		padding: 2px;
		color: white;
		border: 2px solid #ddd;
		text-align: center;
		display: block;
		font-size: 30px;
		border-radius: 4px;
	}

</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="divission">
				<table class="tblone">
					<tr>
						<th>No</th>
						<th>Product</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
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
						<td><?php echo $value['price'];?></td>
						<td><?php echo $value['quantity'];?></td>
						<td>
						<?php 
							$total = $value['price'] * $value['quantity'];
							echo $total;
							$sum  = $sum + $total;
							$Gsum = $sum +$sum*.10;
						?>
						</td>
					</tr>

					<?php } } ?>
				</table>
				<table style="margin-right:30px;float:right;text-align:center; border:1px solid #000; padding:5px;" width="40%">
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
			</div>
			<div class="divission">
				<?php 
			$id = Session::get('id');
			$getInfo = $cmr->GetCustomerInfo($id);
			if($getInfo){
				foreach($getInfo as $data){
		?>
				<table class="tblone">
					<tr>
						<td colspan="3">
							<h2>User Profile</h2>
						</td>

					</tr>
					<tr>
						<td width="20%">Name</td>
						<td width="5%">:</td>
						<td><?php echo $data['name'];?></td>
					</tr>
					<tr>
						<td>Address</td>
						<td>:</td>
						<td><?php echo $data['address'];?></td>
					</tr>
					<tr>
						<td>City</td>
						<td>:</td>
						<td><?php echo $data['city'];?></td>
					</tr>
					<tr>
						<td>Country</td>
						<td>:</td>
						<td><?php echo $data['country'];?></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>:</td>
						<td><?php echo $data['phone'];?></td>
					</tr>
					<tr>
						<td>Zip_code</td>
						<td>:</td>
						<td><?php echo $data['zip'];?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $data['email'];?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><a href="editprofile.php">Update Profile</a></td>
					</tr>
				</table>
				<?php } } ?>
			</div>
		</div>
		<div class="ordernow"><a href="?orderId=order">Order</a></div>
	</div>
</div>

<div class="clear"></div>
<?php include "inc/footer.php"?>
