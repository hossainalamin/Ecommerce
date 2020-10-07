<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/Catagory.php';
include '../classes/Brand.php';
include '../classes/Product.php';
$prod = new Product();
if(!isset($_GET['id']) or $_GET['id'] == NULL){
    echo "<script>window.location = 'productlist.php'</script>";
}else{
    $productId  = $_GET['id'];
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $UpProduct   = $prod->UpProduct($_POST,$_FILES, $productId); 
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Update Product</h2>
		<?php
		if(isset($UpProduct)){
			echo $UpProduct;
		}
		$getPro = $prod->GetProById($productId);
		if($getPro){
			while($result = $getPro->fetch_assoc()){
		?>
		<div class="block">
			<form action="" method="post" enctype="multipart/form-data">
				<table class="form">
					<tr>
						<td>
							<label>Name</label>
						</td>
						<td>
							<input type="text" name="productName" value="<?php echo $result['productName'];?>" class="medium"/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Category</label>
						</td>
						<td>
							<select id="select" name="catId">
							<option>Select Catagory</option>
							<?php
							$cat     = new Catagory();
							$catName = $cat->catagoryList();
							if($catName){
								while($value = $catName->fetch_assoc()){
							
							?>
								<option
								<?php
									if($result['catId'] == $value['catId'])
										echo "selected";
								?>
								value="<?php echo $value['catId'];?>"><?php echo $value['catName'];?></option>
								<?php } } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Brand</label>
						</td>
						<td>
							<select id="select" name="brandId">
								<option>Select Brand</option>
							<?php
							$brand     = new Brand();
							$brandName = $brand->BrandList();
							if($brandName){
								while($value = $brandName->fetch_assoc()){
							
							?>
								<option
								<?php
									if($result['brandId'] == $value['brandId'])
										echo "selected";
								?>
								value="<?php echo $value['brandId'];?>"><?php echo $value['brandName'];?></option>
								<?php } }?>
							</select>
						</td>
					</tr>

					<tr>
						<td style="vertical-align: top; padding-top: 9px;">
							<label>Description</label>
						</td>
						<td>
							<textarea class="tinymce" name="body">
								<?php echo $result['body'];?>
							</textarea>
						</td>
					</tr>
					<tr>
						<td>
							<label>Price</label>
						</td>
						<td>
							<input type="text" name="price" value="<?php echo $result['price']?>" class="medium" />
						</td>
					</tr>

					<tr>
						<td>
							<label>Upload Image</label>
						</td>
						<td>
							<input type="file" name="image"/>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<img src="<?php echo $result['image'];?>" alt="" height="150px" width="260px">
						</td>
					</tr>
					<tr>
						<td>
							<label>Product Type</label>
						</td>
						<td>
							<select id="select" name="type">
								<option>
								Select type	
								</option>
								<?php 
								if($result['type'] == 0){
								?>
								<option value="0" selected>Featured</option>
								<option value="1">Non-Featured</option>
								<?php } else { ?>
								<option value="0">Featured</option>
								<option selected value="1">Non-Featured</option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="submit" Value="Update" />
						</td>
					</tr>
				</table>
			</form>
			<?php } } ?>
		</div>
	</div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		setupTinyMCE();
		setDatePicker('date-picker');
		$('input[type="checkbox"]').fancybutton();
		$('input[type="radio"]').fancybutton();
	});

</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>
