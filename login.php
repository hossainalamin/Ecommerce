<?php include "inc/header.php"?>
<?php
	$login  = Session::get('login');
	if($login == true){
		echo "<script>window.location = 'order.php'</script>";
	}
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
		$userLogin = $cmr->UserLogin($_POST);
	}
?>
<div class="main">
	<div class="content">
		<div class="login_panel">
			<?php 
			if(isset($userLogin)){
				echo $userLogin;
			}
		?>
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<form action="" method="post">
				<input name="email" type="text" placeholder="Email">
				<input name="password" type="password" placeholder="Password">
				<div class="buttons">
					<div><button class="grey" name="login">Sign In</button></div>
				</div>
			</form>

		</div>
		<?php
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])){
			$addCustomer = $cmr->AddCustomer($_POST);
		}
		?>
		<div class="register_account">
			<?php 
			if(isset($addCustomer)){
				echo $addCustomer;
			}
		?>
			<h3>Register New Account</h3>
			<form action="" method="post">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Name">
								</div>

								<div>
									<input type="text" name="city" placeholder="City">

								</div>

								<div>
									<input type="text" name="zip" placeholder="Zip_code">

								</div>
								<div>
									<input type="text" name="email" placeholder="Email">

								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Address">

								</div>
								<div>
									<input type="text" name="country" placeholder="Country">
								</div>

								<div>
									<input type="text" name="phone" placeholder="Phone">
								</div>

								<div>
									<input type="text" name="password" placeholder="Password">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><button class="grey" name="register">Create Account</button></div>
				</div>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include "inc/footer.php"?>
