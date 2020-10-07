<?php include "inc/header.php"?>
<?php
	$login  = Session::get('login');
	if($login == false){
		echo "<script>window.location = 'login.php'</script>";
	}

?>
<style>
	.tblone {
		width: 550px;
		margin: 0 auto;
		border: 2px solid #ddd;
	}

	.tblone tr td {
		text-align: justify;
	}

	.tblone input[type="text"] {
		width: 500px;
		padding: 5px;
		font-size: 15px;
	}

</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<?php 
				$userId = Session::get('id'); 
				if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])){
				$profileEdit = $cmr->UserProfileEdit($_POST,$userId);
				}
				$id = Session::get('id');
				$getInfo = $cmr->GetCustomerInfo($id);
				if($getInfo){
					foreach($getInfo as $data){
			?>
			<form action="" method="post">
				<table class="tblone">
					<tr>
						<?php
						if(isset($profileEdit)){
							echo "<td colspan='2'>".$profileEdit."</td>";
						}
					?>
					</tr>
					<tr>
						<td colspan="3">
							<h2>User Profile</h2>
						</td>
					</tr>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" value="<?php echo $data['name'];?>"></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><input type="text" name="address" value="<?php echo $data['address'];?>"></td>
					</tr>
					<tr>
						<td>City</td>
						<td><input type="text" name="city" value="<?php echo $data['city'];?>"></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><input type="text" name="country" value="<?php echo $data['country'];?>"></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><input type="text" name="phone" value="<?php echo $data['phone'];?>"></td>
					</tr>
					<tr>
						<td>Zip_code</td>
						<td><input type="text" name="zip" value="<?php echo $data['zip'];?>"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" value="<?php echo $data['email'];?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Save" name="edit"></td>
					</tr>
				</table>
			</form>
			<?php } }?>

		</div>

	</div>
</div>

<div class="clear"></div>
<?php include "inc/footer.php"?>
