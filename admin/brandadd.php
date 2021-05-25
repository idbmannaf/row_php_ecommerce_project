<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
$brand = new Brand();
if ($_SERVER['REQUEST_METHOD']== 'POST') {
  $brandName= $_POST['branName'];
  $checkBrand= $brand->insertBrand($brandName);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
                <?php
echo $checkBrand ?? '';
                ?>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Brand Name..." name="branName" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>