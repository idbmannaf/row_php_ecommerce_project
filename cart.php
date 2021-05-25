<?php
include "inc/header.php";
?>
<?php
if (isset($_POST['update'])) {
	$cartId= $_POST['cartId'];
	$updateQuantity= $_POST['quantity'];
	$update= $cart->updateQuantity($updateQuantity,$cartId);
}

if (isset($_GET['deleteproduct'])) {
	$dpid= $_GET['deleteproduct'];
	$deleteproductCart= $cart->deleteCartProdunt($dpid);
}
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
				
						<table class="tblone">
							<tr>
							<th width="10%">#SL</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
									
							<?php 
				$sid = session_id();
				$orderDetails= $cart->orderDetails($sid);
				if ($orderDetails) {
					$sl= 0;
					$totalQuantity= 0;
					while ($orderRow= $orderDetails->fetch_assoc()) {
					$sl++;
					$totalQuantity += $orderRow['quantity'];
				?>
							<tr>
								<td><b><?php echo $sl?></b></td>
								<td><?php echo $orderRow['productName'];?></td>
								<td><img src="admin/uploads/<?php echo $orderRow['image'];?>" alt=""/></td>
								<td>$ <?php echo $orderRow['price'];?></td>
								<td>
									<form action="" method="post">
								
									<input type="hidden" name="cartId" value="<?php echo $orderRow['cartId'];?>"/>
									<input type="number" name="quantity" value="<?php echo $orderRow['quantity'];?>"/>
										<input type="submit" name="update" value="Update"/>
									</form>
								</td>
								<td>$ <?php
								
								$price= $orderRow['price'];
								$quantity= $orderRow['quantity'];
								$totalPrice= $price * $quantity;
								echo $totalPrice;
								
								
								?></td>
								<td><a onclick="return confirm('You Want to deleted This product'); " href="?deleteproduct=<?php echo $orderRow['cartId'];?>">x</a></td>
								
							</tr>
							
				<?php } } else{ ?> 
							
							<?php header('location:index.php');
						}?>

					   </table>
					<table style="float:right; text-align:left; width:40%;">
					<?php
							$sid= session_id();

							$grandTotal= $cart->grandTotal($sid);
							if ($grandTotal) {
								$subt= 0;
							   while ($subtotal= $grandTotal->fetch_assoc()) {
								$subt += $subtotal['price'] * $subtotal['quantity'];
							   }
							   Session::set('total',$subt);
					?>
					<tr>
						<th>Sub Total: </th>
						<td>$ <?php  echo $subt; ?></td>
					</tr>
					
					<tr>
						<th>VAT:4%</th>
						<td>$ <?php $vat= ($subt*4)/100; echo $vat?></td> 
					</tr>
					<tr>
						<th>Discount:10%</th>
						<td>$ <?php $dis= $subt+$vat;  echo $discount= ($dis*10)/100; ?></td> 
					</tr>
					<tr style="border-top: 2px solid black; margin-top:5px;">
						<th>Grand Total: </th>
						<td>$ 
						<?php 
						$grandT= ($subt+$vat)-$discount;
						echo $grandT;
						
						
						?></td>
					</tr>

					<?php }?>
					</table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php
include "inc/footer.php";
?>