<?php include 'inc/header.php';?>
<?php 
if (!Session::get('logged')) {
	header('location:login.php');
}
?>
<style>
 .succsess{width: 500px; min-height: 200px;; text-align: center; border: 2px solid #ddd; margin: 0 auto;}
  .succsess h2{border-bottom: 1px solid #ddd;margin-bottom: 40px; padding-bottom: 10px;}
    .succsess p{padding: 2px; width: 50%; margin: 0 auto; text-align: left; }

</style>
<div class="main">
    <div class="content">
        <div class="section group">
          <div class="succsess">
              <h2>success</h2>
              <?php
              $id= Session::get('id');
              $ammount= $cus->payableAmount($id);
              if ($ammount) {
                  $price= 0;
                  $quantity= 0;
                while ($restl = $ammount->fetch_assoc()) {
                    $price += $restl['totalPrice'];
                    $quantity += $restl['quantity'];
                }
               
           
              ?>
              <p>Total Payable Amount (Including VAT 10%) : &
                  <?php
                  $withVat= $price * 0.1;
                  $total =  $withVat+ $price;
                  echo $total;
                  ?>  And Quentity: (<?php echo $quantity;?>)
                  </p>
<?php }?>
              
              <p>Thanks for Purchase. Receive your order successfuly. we will contact you ASAP with delivery details. Here is your order Details.... <br> <a href="order.php">Visit Here</a> </p>
          </div>
          
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>