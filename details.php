<?php
include "inc/header.php";
?>
<?php 
if (!isset($_GET['pid']) || $_GET['pid']==NULL ) {
	echo "<script>window.location='products.php';</script>";
}else{
	$pid= $_GET['pid'];
}
// $d= new Database();
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$quintety= $_POST['quantity'];
	$addCart= $cart->addToCart($quintety,$pid);
}
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
			<?php 
			$getpro= $pd->getSingelData($pid);
			if ($getpro) {
				while ($singlepro= $getpro->fetch_assoc()) {
					
			
			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $singlepro['image'];?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $singlepro['productName'];?></h2>
					<p><?php echo $fm->textShorten($singlepro['details'],300);?></p>					
					<div class="price">
						<p>Price: <span>$<?php echo $singlepro['price'];?></span></p>
						<p>Category: <span><?php echo $singlepro['catName'];?></span></p>
						<p>Brand:<span><?php echo $singlepro['brandName'];?></span></p>
					</div>

				<div class="add-cart">

					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>			
						
				</div>
				<div><?php echo $addCart ?? ""; ?></div>

			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $singlepro['details'];?></p>
	    </div>
			<?php }}?>	
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php
					$category= $cat->categories();
					if ($category) {
						while ($catRow= $category->fetch_assoc()) {
							
				
					?>
				      <li><a href="productbycat.php?catid=<?php echo $catRow['catId'];?>"><?php echo $catRow['catName'];?></a></li>
					  <?php }}?>
				      
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
	<?php
include "inc/footer.php";
?>

