<?php 
include '../classes/Brand.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$brand = new Brand();
if(!isset($_GET['brandId']) or $_GET['brandId'] == NULL){
    echo "<script>window.location = 'brandlist.php'</script>";
}else{
    $brandId  = $_GET['brandId'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $brandName = $_POST['brandName'];
    $upBrand = $brand->UpBrand($brandName,$brandId);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
                <div class="block copyblock"> 
                <?php
                if(isset($upBrand)){
                    echo $upBrand;
                }
                $getBrand = $brand->GetBrandById($brandId);
                if($getBrand){
                    while ($result = $getBrand->fetch_assoc()) {
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value ="<?php echo $result['brandName'];?>"class="medium"/>
                            </td>
                        </tr>
                    <?php } } ?>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>