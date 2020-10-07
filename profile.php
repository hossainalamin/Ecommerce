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

</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<?php 
			$id = Session::get('id');
			$getInfo = $cmr->GetCustomerInfo($id);
			if($getInfo){
				foreach($getInfo as $data){
		?>
			<table class="tblone">
				<tr>
					<td colspan="3"><h2>User Profile</h2></td>

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
			<?php } }?>
		</div>
	</div>
</div>

<div class="clear"></div>
<?php include "inc/footer.php"?>
