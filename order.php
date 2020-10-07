<?php include "inc/header.php"?>
<?php
	$login  = Session::get('login');
	if($login == false){
		echo "<script>window.location = 'login.php'</script>";
	}

?>
<?php 
	$login  = Session::get('login');
	if($login == false){
		echo "<script>window.location = 'login.php'</script>";
	}
	if(isset($_GET['cmrId'])){
	$cmrId = $_GET['cmrId'];
	$price = $_GET['price'];
	$date  = $_GET['date'];
	$confirm = $ct->ConfirmOrder($cmrId,$price,$date);
	if(isset($_GET['delproId'])){
	$cmrId = $_GET['delproId'];
	$price = $_GET['price'];
	$date  = $_GET['date'];
	$delPro = $ct->delProductShifted($cmrId,$price,$date);
}
}
?>
<style>
</style>
<div class="main">
	<div class="content">
		<div class="section-group">
			<div class="order">
				<h2>Order Detail</h2>
				<?php 
				if(isset($confirm)){
					echo $confirm;
				}
				?>
				<table class="tblone">
					<tr>
						<th>No</th>
						<th>Product Name</th>
						<th>Image</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<?php
						$id = Session::get('id');
						$getOrderprod = $ct->GetOrderprod($id);
						if($getOrderprod){
							$total = 0;   
							$i = 0;
							foreach($getOrderprod as $value){
							$i++;		
							?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $value['productName'];?></td>
						<td><img src="admin/<?php echo $value['image'];?>" alt="" /></td>
						<td>
							<?php echo $value['quantity'];?>
						</td>
						<td>
							<?php
								$total = $value['price'];
								echo $total;
							?>
						</td>
						<td>
						<?php echo $fm->formatDate($value['date']);?>
						</td>
						<td>
							<?php 
								if($value['status']==0){
									echo "Panding";
								}else{
									echo "Placed";
								}
							?>
						</td>
						<td>
							<?php 
								if($value['status']==1){
							?>
							<a onclick="return confirm('Are you sure to confirm')"; href="?cmrId=<?php echo $value['cmrId'];?>&price=<?php echo $value['price'];?>&date=<?php echo $value['date'];?>">Confirm</a>
							<?php }elseif($value['status']==2){?>
							<a onclick="return confirm('Are you sure to delete!')" ; href="?delproId=<?php echo $value['cmrId'];?>&price=<?php echo $value['price'];?>&value=<?php echo $data['date'];?>">Delete</a>
									
								<?php }else {
									echo "N/A";
								}
							?>
						</td>
					</tr>
					<?php } } ?>
				</table>
			</div>
		</div>

		<div class="clear"></div>
	</div>
</div>
<?php include "inc/footer.php"?>
