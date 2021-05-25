<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath= realpath(dirname(__FILE__));
require_once ($filepath.'/../classes/customar.php');
?>

<?php
$cus= new Customar();
if (!isset($_GET['cid']) && $_GET['cid']==NULL) {
   echo "<script>window.location='inbox.php';</script>";
}else {
    $cusId= $_GET['cid'];
    
}

if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $catname= $_POST['catName'];
  //   $id= $_POST['id'];
    $checkCat= $cat->updateCat($catname,$id);
  }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customar Details</h2>
               <div class="block copyblock"> 
                 <form action="catadd.php" method="POST">
                    <table class="form">					
                            <?php
                            // $id= Session::get('id');
                            $getData= $cus->customarData($cusId);
                            if($getData){
                                while($detailsRow= $getData->fetch_assoc()){

                            ?>


                        <tr>
                            <td width='20%'>Name</td>
                            <td><input type="text" name="name" value="<?php echo $detailsRow['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" value="<?php echo $detailsRow['phone']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                                <td><input type="email" name="email" value="<?php echo $detailsRow['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="address" value="<?php echo $detailsRow['address']; ?>"></td>
                        </tr>
                        
                        <tr>
                            <td>City</td>                        
                            <td><input type="text" name="city" value="<?php echo $detailsRow['city']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td><input type="text" name="zip" value="<?php echo $detailsRow['zip']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                           
                            <td>
                            <input type="text" name="country" value="<?php echo $detailsRow['countryName'];?>" id="">
                            
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <a style="color: black; background-color:#ddd; display:block; padding:2px 3px; text-align:center;" href="inbox.php">OK</a>
                            </td>
                       </tr>


                    <?php }} ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>







       

       <div class="main">
    <div class="content"style="background-color: #fff; height:auto;" >
        <div class="section group" >
            <?php echo $update ?? '';?>
            <?php
            // $id= Session::get('id');
            $getData= $cus->customarData($cusId);
            if($getData){
                while($detailsRow= $getData->fetch_assoc()){

            ?>
                    <form action="" method="POST">
                    <table class="tblone">
                        <tr>
                            <td colspan="3"><h2>Update Your Profile</h3></td>    
                        
                        </tr>
                        <tr>
                            <td width='20%'>Name</td>
                            <td><input type="text" name="name" value="<?php echo $detailsRow['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" value="<?php echo $detailsRow['phone']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                                <td><input type="email" name="email" value="<?php echo $detailsRow['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="address" value="<?php echo $detailsRow['address']; ?>"></td>
                        </tr>
                        
                        <tr>
                            <td>City</td>                        
                            <td><input type="text" name="city" value="<?php echo $detailsRow['city']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td><input type="text" name="zip" value="<?php echo $detailsRow['zip']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                           
                            <td>
                            <input type="text" name="country" value="<?php echo $detailsRow['countryName'];?>" id="">
                            
                            </td>
                        </tr>
                       
                    </table>    
                    </form>

                    <?php }} ?>
                    </tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
