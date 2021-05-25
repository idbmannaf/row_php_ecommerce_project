<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'  ?>
<?php
$cat= new Category();
$conn = new Database();
if (isset($_GET['did'])) {
	$sql = "DELETE FROM `category` WHERE catId='".$_GET['did']."'";
	$result = $conn->delete($sql);
	if ($result) {
		$msg= "<span style='color:red; font-size:16px'>Category Deleted</span>";
	}else{
		$msg = "category Not Deleted";
	}
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
				<p><?php echo $msg ??''; ?></p>
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
					$catRes= $cat->allCatList();
				
					if ($catRes) {
						$sl=0;
					while($row= $catRes->fetch_assoc()){
						$sl++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $sl;?></td>
							<td><?php echo $row['catName'] ?></td>
							<td><a href="catedit.php?catid=<?php echo $row['catId'] ?>">Edit</a> || <a onclick=" return confirm('Are you Sure To Delete')" href="?did=<?php echo $row['catId'] ?>">Delete</a></td>
						</tr>
						
					</tbody>
					<?php  }} else{
						 $msg= "Category Not Found";
					 }?>
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

