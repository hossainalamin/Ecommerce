<?php
include '../classes/Cart.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$ct       = new Cart();
$fm       = new Formate();
if(isset($_GET['shiftId'])){
	$cmrId = $_GET['shiftId'];
	$price = $_GET['price'];
	$date  = $_GET['date'];
	$getResult = $ct->getResult($cmrId,$price,$date);
}
if(isset($_GET['delproId'])){
	$cmrId = $_GET['delproId'];
	$price = $_GET['price'];
	$date  = $_GET['date'];
	$delPro = $ct->delProductShifted($cmrId,$price,$date);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Inbox</h2>
		<?php 
		if(isset($getResult)){
			echo $getResult;
		}
		?>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>ID</th>
						<th>Date & Time</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Customer Id</th>
						<th>Price</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$getOrder = $ct->GetOrder();
						if($getOrder){
							$i = 0;
							foreach($getOrder as $data){
							$i++;
								
					?>
					<tr class="odd gradeX">
						<td><?php echo $data['productId'];?></td>
						<td><?php echo $fm->formatDate($data['date']);?></td>
						<td><?php echo $data['productName'];?></td>
						<td><?php echo $data['quantity'];?></td>
						<td><?php echo $data['cmrId'];?></td>
						<td><?php echo $data['price'];?></td>
						<td><a href="address.php?cmrId=<?php echo $data['cmrId'];?>">View Detail</a></td>
						<?php 
							if($data['status'] == 0){
							?>
						<td><a href="?shiftId=<?php echo $data['cmrId'];?>&price=<?php echo $data['price'];?>&date=<?php echo $data['date'];?>">Pending</a>
							<?php } elseif($data['status'] == 1) { ?>
						<td><a >Shifted</a>
						<?php } else { ?>
						<td><a onclick="return confirm('Are you sure to delete!')" ; href="?delproId=<?php echo $data['cmrId'];?>&price=<?php echo $data['price'];?>&date=<?php echo $data['date'];?>">Delete</a>
					</tr>
					<?php  } } }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});

</script>
<?php include 'inc/footer.php';?>
