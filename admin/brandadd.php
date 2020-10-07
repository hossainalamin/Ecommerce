<?php 
include '../classes/Brand.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$cat = new Brand();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $brandName  = $_POST['brandName'];
    $addBrand   = $cat->AddBrand($brandName); 
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
                <div class="block copyblock"> 
                <?php
                if(isset($addBrand)){
                    echo $addBrand;
                }
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" class="medium" />
                            </td>
                        </tr>
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