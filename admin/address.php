<?php 
include '../classes/Customer.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$cat = new Customer();
if(!isset($_GET['cmrId']) or $_GET['cmrId'] == NULL){
    echo "<script>window.location = 'inbox.php'</script>";
}else{
    $cId  = $_GET['cmrId'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "<script>window.location = 'inbox.php'</script>";
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Customer Detail</h2>
		<div class="block copyblock">
			<?php
                $getCustomer = $cat->GetCustomerInfo($cId);
                if($getCustomer){
                    while ($result = $getCustomer->fetch_assoc()) {
                    
                ?>
			<form action="" method="post">
				<table class="form">
					<tr>
						<td>Name</td>
						<td>
							<input type="text" readonly="readonly" value="<?php echo $result['name'];?>" class="medium" />
						</td>
					</tr>
					<tr>
						<td>Address</td>
						<td><input type="text" readonly="readonly" value="<?php echo $result['address'];?>" class="medium" /></td>
					</tr>
					<tr>
						<td>City</td>
						<td><input type="text" readonly="readonly" value="<?php echo $result['city'];?>" class="medium" /></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><input type="text" readonly="readonly" value="<?php echo $result['phone'];?>" class="medium" /></td>
					</tr>
					<tr>
						<td>Zip Code</td>
						<td><input type="text" readonly="readonly" value="<?php echo $result['zip'];?>" class="medium" /></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" readonly="readonly" value="<?php echo $result['email'];?>" class="medium" /></td>
					</tr>

					<?php } } ?>
					<tr>
						<td>
							<input type="submit" name="submit" Value="Ok" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<?php include 'inc/footer.php';?>
