<?php 
include '../classes/Catagory.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$cat = new Catagory();
if(!isset($_GET['catId']) or $_GET['catId'] == NULL){
    echo "<script>window.location = 'catlist.php'</script>";
}else{
    $catId  = $_GET['catId'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catName'];
    $upCat = $cat->UpCat($catName,$catId);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
                <div class="block copyblock"> 
                <?php
                if(isset($upCat)){
                    echo $upCat;
                }
                $getCat = $cat->getCatById($catId);
                if($getCat){
                    while ($result = $getCat->fetch_assoc()) {
                    
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value ="<?php echo $result['catName'];?>"class="medium" />
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