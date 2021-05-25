<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
$brand= new Brand();
if (!isset($_GET['brandId']) || $_GET['brandId']== '') {
  echo"<script>window.location='catlist.php';</script>";
// header("lcation:index.php");
}else{
    $id= $_GET['brandId'];
}

if ($_SERVER['REQUEST_METHOD']== 'POST') {
  $brandName= $_POST['brandName'];
//   $id= $_POST['id'];
  $checkBrand= $brand->updateBrand($brandName,$id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>

                <?php
echo $checkBrand ?? '';
                ?>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                        <?php 
                           $updateBrand= $brand->fetchBrand($id);
                           if ($updateBrand) {
                               $row= $updateBrand->fetch_assoc();
                        
                        ?>
                            <td>
                            <input type="hidden" name="id" value="<?php $row['brandId']?>">
                                <input type="text" placeholder="Enter Category Name..." name="brandName" value="<?php echo $row['brandName'] ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                        <?php    }?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>