<?php 
include '../classes/Catagory.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$cat = new Catagory();
$catList = $cat->catagoryList();
if(isset($_GET['catId'])){
    $catId  = $_GET['catId'];
    $delCat = $cat->delCatById($catId);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                 <?php
                if(isset($delCat)){
                    echo $delCat;
                }
                ?>
                <div class="block">   
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if($catList){
							$count = 0;
							if($catList){
								foreach ($catList as $catName) {
								$count++;			
						?>
						<tr class="odd gradeX">
							<td><?php echo $count;?></td>
							<td><?php echo $catName['catName'];?></td>
							<td><a href="catedit.php?catId=<?php echo $catName['catId'];?>">Edit</a> || <a onclick="return confirm('Are You sure to delete?')" href="?catId=<?php echo $catName['catId'];?>">Delete</a></td>
						</tr>
					<?php } } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

