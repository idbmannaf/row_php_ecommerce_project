<?php include 'inc/header.php';?>
<?php 
if (!Session::get('logged')) {
	header('location:login.php');
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
</style>
<div class="main">
    <div class="content">
        <div class="section group">
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

<?php include 'inc/footer.php'; ?>