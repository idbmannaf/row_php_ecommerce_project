<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php
$product = new Product();
$conn= new Database();
// if (isset($_GET['pid'])) {
//     $productId= $_GET['pid'];
   
//  }
 if (!isset($_GET['pid']) || $_GET['pid']== '') {
    echo"<script>window.location='productlist.php';</script>";
  // header("lcation:productlist.php");
  }else{
      $productId= $_GET['pid'];
  }
if ($_SERVER['REQUEST_METHOD']== 'POST') {
   $insertProduct= $product->updateProduct($_POST,$_FILES,$productId);

}



?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <?php echo $insertProduct??''?>
        <div class="block">               
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
               <?php

 $getProduct = $product->fetchProduct($productId);
   if ($getProduct) {
      $row= $getProduct->fetch_assoc();
  
               ?>
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Product Name..." name="productName" value="<?php echo $row['productName'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php
                                    $catlist= $product->catlist();
                                    if ($catlist) {
                                       while($catrow= $catlist->fetch_assoc()){
                            ?>
                            <option
                            
                            
                            <?php 
                                    if($catrow['catId']==$row['catId']){
                                        echo "selected";
                                    }
                            ?>

                             value="<?php echo $catrow['catId'] ?>"><?php echo $catrow['catName'] ?></option>
                              <?php    } }?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php
                                    $brandList= $product->brandList();
                                    if ($brandList) {
                                        while($brandRow= $brandList->fetch_assoc()){
                                    
                            ?>
                            <option
                            <?php 
                                    if($brandRow['brandId']==$row['brandId']){
                                        echo "selected";
                                    }
                            ?>
                             value="<?php echo $brandRow['brandId'] ?>"><?php echo $brandRow['brandName'] ?></option>

                            <?php }} ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="details"><?php echo $row['details'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $row['price'] ?>" name="price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    <img src="uploads/<?php echo $row['image']?>" width="200px" height="80px" alt=""> <br>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                        <option>Select Type</option>
                        <?php
                        if($row['type']==0){ ?>
                            <option selected value="0">Featured</option>
                            <option value="1">General</option>
                        <?php } else{  ?>
                            
                            <option value="0">Featured</option>
                            <option selected value="1">General</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
<?php  }?>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


