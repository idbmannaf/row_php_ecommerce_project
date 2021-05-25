<?php include 'inc/header.php';?>
<?php 
if (!Session::get('logged')) {
	header('location:login.php');
}
?>
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
</style>
<div class="main">
    <div class="content">
        <div class="section group">
          <div class="payment">
              <h2>Choose Payment Optin</h2>
              <a href="paymentoffline.php">Offline Payment</a>
              <a href="paymentonline.php">Online Payment</a>
          </div>
          <div class="back">
              <a href="cart.php">Previous</a>
          </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>