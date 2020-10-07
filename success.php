<?php include "inc/header.php"?>
<?php
	$login  = Session::get('login');
	if($login == false){
		echo "<script>window.location = 'login.php'</script>";
	}

?>
<style>
	.psuccess {
		width: 550px;
		min-height: 300px;
		text-align: center;
		margin: 0 auto;
		border: 1px solid #ddd;
	}

	.psuccess h2 {
		border-bottom: 1px solid #ddd;
		margin-bottom: 40px;
		padding-bottom: 10px;
	}

</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="psuccess">
				<h2>Payment</h2>
				<?php 
				$id = Session::get('id');
				$amount = $cmr->PayableAmount($id);
				if($amount){
				    $sum = 0;
					foreach($amount as $data){
					$sum = $sum+$data['price'];
					
					}
				}
				?>
				<p style="line-hieght:25px; color:red;">Total Payabel Amount(Including Vat) :<?php 
					$vat = $sum * .10;
					$total = $sum+$vat;
					echo $total;
				?>
				</p>
				<br>
				<p style="line-hieght:25px; text-align:justify; padding:5px;">Payment successful.Thank you for purchase.We will contant you as soon as possible for deleivery details.Here is your is your product detail... <a href="order.php">Visit here</a></p>
			</div>
			<div class="back">
				<a href="cart.php">Back</a>
			</div>
		</div>
	</div>
</div>

<div class="clear"></div>
<?php include "inc/footer.php"?>
