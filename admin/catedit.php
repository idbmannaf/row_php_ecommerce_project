<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
$cat = new Category();
if (!isset($_GET['catid']) || $_GET['catid']== '') {
  echo"<script>window.location='catlist.php';</script>";
// header("lcation:index.php");
}else{
    $id= $_GET['catid'];
}

if ($_SERVER['REQUEST_METHOD']== 'POST') {
  $catname= $_POST['catName'];
//   $id= $_POST['id'];
  $checkCat= $cat->updateCat($catname,$id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>

                <?php
echo $checkCat ?? '';
                ?>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                        <?php 
                           $updateCat= $cat->fetchCat($id);
                           if ($updateCat) {
                               $row= $updateCat->fetch_assoc();
                        
                        ?>
                            <td>
                            <input type="hidden" name="id" value="<?php $row['catId']?>">
                                <input type="text" placeholder="Enter Category Name..." name="catName" value="<?php echo $row['catName'] ?>" class="medium" />
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