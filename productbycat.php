<?php
include "inc/header.php";
?>
<?php
if (!isset($_GET['catid']) && $_GET['catid']==NULL) {
		echo "<script>window.location='cart.php';</script>";
}else{
	$catId= $_GET['catid'];
}
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from <?php 
			$pByCat= $cat->productByCat($catId);
			if ($pByCat) {
				$catName=$pByCat->fetch_assoc();
				echo $catName['catName'];
			}
			?></h3>

    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php 
		 	$pByCat= $cat->productByCat($catId);
			 if ($pByCat) {
				 while ($pByCatRow= $pByCat->fetch_assoc()) {
				
			 
		  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pid=<?php echo $pByCatRow['productId'];?>"><img src="admin/uploads/<?php echo $pByCatRow['image'];?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($pByCatRow['productName'],25);?> </h2>
					 <p><?php echo $fm->textShorten($pByCatRow['productName'],25);?></p>
					 <p><span class="price">$<?php echo $pByCatRow['price'];?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $pByCatRow['productId'];?>" class="details">Details</a></span></div>
				</div>
				<?php }}else{?>
					
					<h1 style="text-align: center; color:red; font-size:25px;">Product of this Categoy Comming Soon</h1>
			
				<?php
				}
				?>
			</div>

	
	
    </div>
 </div>
</div>
<?php
include "inc/footer.php";
?>