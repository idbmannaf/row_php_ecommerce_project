<?php
include "inc/header.php";
?>
<?php
if (isset($_GET['cusid']) &&  isset($_GET['pid']) ) {
    $cusid= $_GET['cusid'];
    $pid= $_GET['pid'];
    $cancel= $cart->cancelOrder($cusid,$pid);
    if ($cancel) {
        header("location:order.php");
      }else {
          echo "not Delete";
      }
  }
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 100%;">Your Order Details</h2>
				
						<table class="tblone">
							<tr>
							    <th>#SL</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Price</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
									
							<?php 
				 $id = Session::get('id');
                 $orderlist= $cus->orderList($id);
                 $sl=0;
                 if ($orderlist) {
                 while ($orderRow= $orderlist->fetch_assoc()) {
                     $sl++;

				?>
							<tr>
								<td><b><?php echo $sl?></b></td>
								<td title="<?php echo $orderRow['productName']; ?>"><?php echo $fm->textShorten($orderRow['productName'], 20);?></td>
								<td><img src="admin/uploads/<?php echo $orderRow['image'];?>" alt=""/></td>
								<td>$ <?php echo $orderRow['price'];?></td>
								<td><?php echo $orderRow['quantity'];?></td>
								
								<td>$ <?php echo  $orderRow['totalPrice'];  ?></td>
								<td> <?php echo  $orderRow['dat'];  ?></td>
								<td><?php 
                                
                                  if ( $orderRow['status'] == 0) {
                                     echo "<span style='color:red'>Panding</span>";
                                  } elseif ( $orderRow['status']== 1) {
                                    echo "<span style='color:gold'>Prossesing</span>";
                                  }elseif ( $orderRow['status']== 2) {
                                    echo "<span style='color:green'>Shift</span>";
                                  }
                                    
                                     ?>
                                     
                                     <?php
                                    if ($orderRow['status']== 0 ) { ?>
                                       <td><a onclick="return confirm('You Want to deleted This product'); " href="?cusid=<?php echo $orderRow['customarId'];?>&pid=<?php echo $orderRow['productId'];?>">x</a></td>
                                  <?php  }else{?>
                                                <td>N/A</td>
                                            <?php }?>
							</tr>
							
				<?php } } else{ ?> 
							
							<?php header('location:404.php');
						}?>

					   </table>
					<table style="float:right; text-align:left; width:40%;">
					<?php
						 $id = Session::get('id');
                         $orderlist= $cus->orderList($id);
                         $total= 0;
                         if ($orderlist) {
                         while ($orderRow= $orderlist->fetch_assoc()) {
                            $total += $orderRow['totalPrice'];
                         }
					?>
					<tr>
						<th>Sub Total: </th>
						<td>$ <?php  echo $total; ?></td>
					</tr>
					
					<tr>
						<th>VAT:10%</th>
						<td>$ <?php 
                        $vat= $total * 0.1;
                        $withVat= $vat + $total;
                         echo $vat?></td> 
					</tr>
					<tr>
						<th>Discount:5%</th>
						<td>$ <?php 
                        $dis= $withVat * .05;
                         echo $dis; ?></td> 
					</tr>
					<tr>
						<th>Grand Total: </th>
						<td>$ 
						<?php 
						$grandT= ($vat + $total)-$dis;
						echo $grandT;
						
						
						?></td>
					</tr>

					<?php }?>
					</table>
					</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php
include "inc/footer.php";
?>