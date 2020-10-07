<?php include "inc/header.php"?>
<?php
	$login  = Session::get('login');
	if($login == false){
		echo "<script>window.location = 'login.php'</script>";
	}

?>
<style>
	.payment {
		width: 550px;
		min-height: 300px;
		text-align: center;
		margin: 0 auto;
		border: 1px solid #ddd;
	}

	.payment h2 {
		border-bottom: 1px solid #ddd;
		margin-bottom: 40px;
		padding-bottom: 10px;
	}

	.payment a {
		background: red;
		color: white;
		padding: 5px 30px;
		border-radius: 5px;
		font-size: 30px;
		box-shadow: 2px 2px gray;

	}
	.back a{
		width: 250px;
		margin: 0 auto;
		padding: 5px;
		text-align: center;
		display: block;
		border: 1px solid #000;
		background: black;
		color: white;
		border-radius: 2px;
		font-size:25px;
	}

</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="payment">
				<h2>Please choose you payment option</h2>
				<a href="ofline.php">Ofline Payment</a>
				<a href="online.php">Online Payment</a>
			</div>
			<div class="back">
				<a href="cart.php">Back</a>
			</div>
		</div>
	</div>
</div>

<div class="clear"></div>
<?php include "inc/footer.php"?>
