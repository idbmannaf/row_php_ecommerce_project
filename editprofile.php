
<?php include 'inc/header.php';?>
<?php 
if (!Session::get('logged')) {
	header('location:login.php');
}
if(isset($_POST['update'])){
    $id= Session::get('id');
    $update= $cus->updateProfile($_POST,$id);
}
?>
<style>
    .tblone{
        width: 550px;
        margin: 0 auto;
        border: 2px solid #ddd;
    }
    .tblone tr td{
        text-align: justify;
    }
    .tblone input[type="text"],.tblone input[type="email"],.tblone input[type="password"], select{
        width: 350px;
        padding: 5px;
        font-size: 15px;
    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <?php echo $update ?? '';?>
            <?php
            $id= Session::get('id');
            $getData= $cus->customarData($id);
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
                            <select id="country" name="country">
									<option value="null">Select a Country</option>
									<?php 
									$country= $cus->country();
									if($country){
										while($cRow= $country->fetch_assoc()){
                                            
										?>
									<option <?php
                                    if($cRow['id'] == $detailsRow['country']){
                                        echo 'selected';
                                    }
                                    ?> value="<?php echo $cRow['id'];?>"><?php echo $cRow['countryName'];?></option>
								<?php }} ?>
									</select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="update" value="Save" class="grey"></td>
                            <td></td>
                            
              
                        </tr>
                    </table>    
                    </form>

                    <?php }} ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>


