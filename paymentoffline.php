<?php include 'inc/header.php';?>
<?php 
if (!Session::get('logged')) {
	header('location:login.php');
}
?>
<?php if (isset($_GET['orderid']) && $_GET['orderid']== 'order') {
   $id= Session::get('id');
   $sid= session_id();
   $order = $cart->orderProduct($id,$sid);
   $deleteAfterLogout= $cart->deleteAfterLogout($sid);
   header('location:success.php');
}?>
<style>
    /* .tblone{
        width: 550px;
        margin: 0 auto;
        border: 2px solid #ddd;
    }
    .tblone tr td{
        text-align: justify;
    } */
    .payment{width: 500px; min-height: 200px;; text-align: center; border: 2px solid #ddd; margin: 0 auto;}
    .payment h2{border-bottom: 1px solid #ddd;margin-bottom: 40px; padding-bottom: 10px;}
    .payment a{background-color: red; color: #fff; font-size: 25px; padding: 5px 30px;}
    .back a{width: 160px; margin: 5px auto 0; padding-bottom: 4px; text-align: center; display: block; background-color:  #555;  border: 1px solid #333;color:#fff; border-radius: 3px; padding: 5px 0px; font-size: 20px;}
    .tblone{
        width: 530px;
        margin: 0 auto;
        border: 2px solid #ddd;
    }
    .tblone tr td{
        text-align: justify;
    }
    .division{
        width: 50%;
        float: left;
    }
    .tbltwo{width: 50%;border: 2px solid #ddd;float:right; text-align:left; margin-right: 14px; margin-top: 12px;}
    .tbltwo tr td{text-align: justify; padding: 5px 10px;}
    /* .tbltwo tr {text-align: justify; padding-bottom: 5px 10px;} */
    .tableone tr td{font-size: 13px; text-align: justify;}
    .order a{width: 200px; margin: 0 auto; text-align: center;padding: 5px; font-size:30px; display: block; background-color: red; color: #fff; border-radius: 3px;}
    .order {padding-bottom: 5px;}
</style>
<div class="main">
    <div class="content">
        <div class="section group">
        <div class="division">  
        <table class="tblone tableone">
							<tr>
							<th width="10%">#SL</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Price</th>
								
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
								<td title="<?php echo $orderRow['productName'];?>"><?php echo $fm->textShorten($orderRow['productName'],20);?></td>
								<td>$ <?php echo $orderRow['price'];?></td>
								<td><?php echo $orderRow['quantity'];?></td>
								
								<td>$ <?php
								
								$price= $orderRow['price'];
								$quantity= $orderRow['quantity'];
								$totalPrice= $price * $quantity;
								echo $totalPrice;
								
								
								?></td>
								
							</tr>
							
				<?php } } else{ ?> 
							
							<?php header('location:index.php');
						}?>

					   </table>
                       <table class="tbltwo">
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
					<tr">
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

          <div class="division">
          <?php
            $id= Session::get('id');
            $getData= $cus->customarData($id);
            if($getData){
                while($cusRow= $getData->fetch_assoc()){

            ?>
                    <table class="tblone">
                        <tr>
                            <td colspan="3"><h2>Your Profile Details</h3></td>    
                        
                        </tr>
                        <tr>
                            <td width='20%' >Name</td>
                            <td width='5%'>:</td>
                            <td><?php echo $cusRow['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><?php echo $cusRow['phone']; ?>User Name</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $cusRow['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $cusRow['address']; ?></td>
                        </tr>
                        
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td><?php echo $cusRow['city']; ?></td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td>:</td>
                            <td><?php echo $cusRow['zip']; ?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td><?php echo $cusRow['countryName']; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><a href="editprofile.php">Update Profile</a></td>
                            <!-- <td><a href="editprofile.php?uid=<?php echo $cusRow['id']; ?>">Update Profile</a></td> -->
                        </tr>
                    </table>    

                    <?php }} ?>
          </div>
          
          
       
        </div>
    </div>
    <div class="order"><a href="?orderid=order">Order Now</a></div>
</div>

<?php include 'inc/footer.php'; ?>