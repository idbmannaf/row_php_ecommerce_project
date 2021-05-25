<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
.active {
	color: #fff;
	background-color: red;
}
</style>
<?php
$filepath= realpath(dirname(__FILE__));
require_once ($filepath.'/../classes/cart.php');
require_once ($filepath.'/../helper/format.php');
$fm= new Format();
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>#id</th>
							<th>Order Id</th>
							<th>Date</th>
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Singel Price</th>
							<th>Total Price</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$cart= new Cart();
					// $fm= new Format();
					$getOrder= $cart->getAllOrder();
					if ($getOrder) {
						$sl= 0;
						while ($orderRow= $getOrder->fetch_array()) {
							$sl++;
				
					?>
						<tr class="odd gradeX">
							<td><?php echo $sl;?></td>
							<td><?php echo $orderRow['customarId'];?></td>
							<td><?php echo $orderRow['date'];?></td>
							<td><?php echo $orderRow['productId'];?></td>
							<td><?php echo $fm->textShorten($orderRow['productName'],20);?></td>
							<td><?php echo $orderRow['quantity'];?></td>
							<td><?php echo $orderRow['price'];?></td>
							<td><?php echo $orderRow['totalPrice'];?></td>
							<td><a href="customar.php?cid=<?php echo $orderRow['customarId'];?>">View Address</a></td>
							<td> 
							<!-- <a href="#" class="" id="a" dta-value="0"><span style='color:green'>Panding</span></a>
							<a href="#" class="" id="a" dta-value="1"><span style='color:green'>Prossesing</span></a>
							<a href="#" class="" id="a" dta-value="2"><span style='color:green'>Shift</span></a> -->
							<?php 
							if ($orderRow['status'] == 0) {?>
									<!-- <a href="?cusid=<?php echo $orderRow['customarId'];?>&date=<?php echo $orderRow['date'];?>&price=<?php echo $orderRow['totalPrice'];?>">Panding</a> -->
								<a href="#" id="a" class="active" data-cusId="<?php echo $orderRow['customarId'];?> " data-date="<?php echo $orderRow['date'];?>" date-totalPrice="<?php echo $orderRow['totalPrice'];?>" data-value='0'>Panding</a> 

								<a href="#" id="a" class="" data-cusId="<?php echo $orderRow['customarId'];?> " data-date="<?php echo $orderRow['date'];?>" date-totalPrice="<?php echo $orderRow['totalPrice'];?>" data-value='1'>Prossesing</a> 

								<a href="#" id="a" class="" data-cusId="<?php echo $orderRow['customarId'];?> " data-date="<?php echo $orderRow['date'];?>" date-totalPrice="<?php echo $orderRow['totalPrice'];?> " data-value='2'>Shift</a> 
								<?php } elseif ($orderRow['status']==1) { ?>

						
									<a href="#" id="a" class="" data-cusId="<?php echo $orderRow['customarId'];?> " data-date="<?php echo $orderRow['date'];?>" date-totalPrice="<?php echo $orderRow['totalPrice'];?>" data-value='0'>Panding</a> 

								<a href="#" id="a" class="active" data-cusId="<?php echo $orderRow['customarId'];?> " data-date="<?php echo $orderRow['date'];?>" date-totalPrice="<?php echo $orderRow['totalPrice'];?>" data-value='1'>Prossesing</a> 

								<a href="#" id="a" class="" data-cusId="<?php echo $orderRow['customarId'];?> " data-date="<?php echo $orderRow['date'];?>" date-totalPrice="<?php echo $orderRow['totalPrice'];?> " data-value='2'>Shift</a> 
							<?php } elseif($orderRow['status']== 2) {?>
							
								<a href="#" id="a" class="" data-cusId="<?php echo $orderRow['customarId'];?> " data-date="<?php echo $orderRow['date'];?>" date-totalPrice="<?php echo $orderRow['totalPrice'];?>" data-value='0'>Panding</a> 

								<a href="#" id="a" class="" data-cusId="<?php echo $orderRow['customarId'];?> " data-date="<?php echo $orderRow['date'];?>" date-totalPrice="<?php echo $orderRow['totalPrice'];?>" data-value='1'>Prossesing</a> 

								<a href="#" id="a" class="active" data-cusId="<?php echo $orderRow['customarId'];?> " data-date="<?php echo $orderRow['date'];?>" date-totalPrice="<?php echo $orderRow['totalPrice'];?> " data-value='2'>Shift</a> 
							
							<?php } ?>
							
							</td>
						</tr>

						<?php }} else{?>
						<h4>Order Not Found</h4>
						<?php }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
		<!-- <script src="js/jquery-3.6.0.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
		
		$("a#a").click(function(e){
			e.preventDefault();
			$a= $(this).attr('data-cusId');
			$b= $(this).attr('data-date');
			$c= $(this).attr('date-totalPrice');
			$v= $(this).attr('data-value');
			$.post("ajax.php",
			{
				customarId: $a,
				date: $b,
				totalPrice: $c,
				status: $v
			},function(data){
				console.log(data);
			});
			
			
		});
    });
</script>
<?php include 'inc/footer.php';?>
