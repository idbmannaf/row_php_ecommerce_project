
<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			<?php
			
			$fromIphone= $pd->fromIphone();
			if ($fromIphone) {
				while ($row= $fromIphone->fetch_assoc()) {
					
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?pid=<?php echo $row['productId'];?>"> <img src="admin/uploads/<?php echo $row['image'];?>" alt="" /></a>
					</div>
				
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p>Lorem ipsum dolor sit amet sed do eiusmod.</p>
						<div class="button"><span><a href="details.php?pid=<?php echo $row['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>	

			   <?php }}?>	
			   <?php
			   $samsung= $pd->fromSamsung();
			   if ($samsung) {
				  while ($srow= $samsung->fetch_assoc()) {
					
				
			   ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?pid=<?php echo $srow['productId'];?>"><img src="admin/uploads/<?php echo $srow['image'];?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="details.php?pid=<?php echo $srow['productId'];?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php }}?>
			</div>
			<div class="section group">
			<?php 
			$formAccer= $pd->fromIAccer();
			if ($formAccer) {
				while ($accer= $formAccer->fetch_assoc()) {
				
					
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?pid=<?php echo $accer['productId'];?>"> <img src="admin/uploads/<?php echo $accer['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						<div class="button"><span><a href="details.php?pid=<?php echo $accer['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php  }} ?>		

			   <?php 
			 	$fromCannon= $pd->fromICanon();
				 if ($fromCannon) {
					while ($cannon= $fromCannon->fetch_assoc()) {
						
			   ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?pid=<?php echo $cannon['productId'];?>"><img src="admin/uploads/<?php echo $cannon['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="details.php?pid=<?php echo $cannon['productId'];?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php }}?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	