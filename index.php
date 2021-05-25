<?php
include "inc/header.php";
include "inc/slider.php";

?>
<?php

// spl_autoload_register(function($className) {
// 	include_once $className . '.php';
// });
$fm= new Format();
?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php 
		 $pd= new Product(); 
		 $getProduct= $pd->getFeaturedProduct();
		 if ($getProduct) {
			 while ($fproduct= $getProduct->fetch_assoc()) {
				
			// echo $fproduct['image'];
		  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pid=<?php echo $fproduct['productId'] ?>"><img src="admin/uploads/<?php echo $fproduct['image']; ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten($fproduct['productName'],25) ?> </h2>
					 <p><?php echo $fm->textShorten($fproduct['details'],40) ?></p>
					 <p><span class="price"><?php echo $fproduct['price'] ?> </span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $fproduct['productId'] ?> " class="details">Details</a></span></div>
				</div>
				<?php }} ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php 
					$newproduct= $pd->getNewProduct();
					if ($newproduct) {
					while ($newP= $newproduct->fetch_assoc()) {
						
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pid=<?php echo $newP['productId'] ?>"><img src="admin/uploads/<?php echo $newP['image']; ?>" alt="" /></a>
					 <h2><?php $fm->textShorten($newP['productName'],25) ?> </h2>
					 <p><?php echo $fm->textShorten($newP['details'],40) ?></p>
					 <p><span class="price"><?php echo $newP['price'] ?> </span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $newP['productId'] ?> " class="details">Details</a></span></div>
				</div>
				<?php }}?>
			</div>
    </div>
 </div>
</div>
<?php
include "inc/footer.php";

?>
