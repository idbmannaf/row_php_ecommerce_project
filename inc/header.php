<?php 
include "lib/session.php";
include "lib/database.php";
include "helper/format.php";
Session::init();

spl_autoload_register(function($className) {
	include_once "classes/" . $className . '.php';
	// echo $className;
});
// $conn= new Database();
$fm= new Format();
$pd= new Product();
$cart= new Cart();
$cat= new Category();
$cus = new Customar();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product"><a style="color:#DD0F0E; font-size:13px; font-weight: bold; " href="cart.php">
								
    
								( $<?php
								$sid= session_id();
								$grandTotal= $cart->grandTotal($sid);
								if ($grandTotal) {
									$subt= 0;
								   while ($subtotal= $grandTotal->fetch_assoc()) {
									$subt += $subtotal['price'] * $subtotal['quantity'];
								   }
								   echo $subt;

								}else{
									echo "Empty";
								}
								?>)
								
								<?php 
								$sid= session_id();
								$count= $cart->countProduct($sid);
								if ($count) {
									$totalProduct=0;
									$totalPrice= 0;
								while ($countProduct= $count->fetch_assoc()) {
									$totalProduct += $countProduct['quantity'];
									// $$totalPrice += $countProduct['price'];

								}
								echo "Qt: ".$totalProduct;
								// Session::set('total',$totalPrice);
								}
								?>
								</a>
								</span>
								
							</a>
						</div>
			      </div>
	 <?php
	 if (isset($_GET['lid'])) {
		 $sid= session_id();
		 $deleteAfterLogout= $cart->deleteAfterLogout($sid);
		Session::destroy();
	 }?>

		<?php
		if (Session::get('logged')) {?>
		<div class="login"><a href="?lid=<?php echo Session::get('id');?>">LogOut</a></div>
		<?php }else{?>
			<div class="login"><a href="login.php">Login</a></div>
		<?php }?>

				
		   <!-- <div class="login"><a href="login.php">Login</a></div> -->
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>


	  <?php
	  $checkCart= $cart->checkCart($sid);
	  if($checkCart){?>
			<li><a href="cart.php">Cart</a></li>
			<li><a href="payment.php">Payment</a></li>
	  <?php } ?>
	  <?php
	  $id= Session::get('id');
	  $chkOrder= $cart->checkOrder($id);
	  if($chkOrder){?>
			<li><a href="order.php">Order</a></li>
			
	  <?php } ?>
	  <?php 
	 if(Session::get('logged')){?>
<li><a href="profile.php">Profile</a></li>
	<?php }   ?>
	  
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>