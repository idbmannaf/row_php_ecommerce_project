<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'  ?>
<?php
$brand= new Brand();
$conn = new Database();
if (isset($_GET['did'])) {
	$sql = "DELETE FROM `brand` WHERE brandId='".$_GET['did']."'";
	$result = $conn->delete($sql);
	if ($result) {
		$msg= "<span style='color:red; font-size:16px'>Brand Deleted</span>";
	}else{
		$msg = "Brand Not Deleted";
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
					$brandRes= $brand->allBrandList();
				
					if ($brandRes) {
						$sl=0;
					while($row= $brandRes->fetch_assoc()){
						$sl++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $sl;?></td>
							<td><?php echo $row['brandName'] ?></td>
							<td><a href="brandedit.php?brandId=<?php echo $row['brandId'] ?>">Edit</a> || <a onclick=" return confirm('Are you Sure To Delete')" href="?did=<?php echo $row['brandId'] ?>">Delete</a></td>
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

