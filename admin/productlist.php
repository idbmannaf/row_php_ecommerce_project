<?php
// include "../lib/session.php";
include '../classes/product.php';
// include "../database.php";

?>
<?php
$format= new Format();
$prod = new Product();
$conn= new Database();
//delete Product
if (isset($_GET['deletepd'])) {
	$deleteId= $_GET['deletepd'];
	$productDeleted= $prod->deleteProduct($deleteId);
	if ($productDeleted) {
		$msg = "<span class='error'>Product Deleted Succssfully</span>";
	}
	else{
			$msg = "Product Not Deleted";
		}

}

?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
<?php echo $msg??'' ?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Prduct Name</th>
					<th>Brand</th>
					<th>Category</th>
					<th>price</th>
					<th>Description</th>
					<th>Image</th>
					<th>type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$pd= $prod->productList();
			if ($pd) {
				$sl=0;
				while ($row= $pd->fetch_assoc()) {
				$sl++;
			
			?>
			<tr>
					<td><?php echo $sl;?></td>
					<td><?php echo $row['productName'];?></td>
					<td><?php echo $row['brandName']?></td>
					<td><?php echo $row['catName']?></td>
					<td>$<?php echo $row['price']?></td>
					
					<td><?php echo strip_tags($format->textShorten($row['details'],30))?></td>
					<td><img src="uploads/<?php echo $row['image']?>" width="60px" height="40px" alt=""></td>
					<td>
					<?php 
					if ($row['type'] == 0) {
						echo "Featured";
					}else{
						echo "Genaral";
					}
					?>
					</td>
					<td><a href="productedit.php?pid=<?php echo $row['productId']?>">Edit</a> || <a onclick=" return confirm('Are you Sure for Delete This Product')"  href="?deletepd=<?php echo $row['productId']?>">Delete</a></td>

					</tr>
					<?php 	}
			}?>
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
