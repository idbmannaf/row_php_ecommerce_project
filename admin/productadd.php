<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php
$product = new Product();
if ($_SERVER['REQUEST_METHOD']== 'POST') {
   $insertProduct= $product->insertProduct($_POST,$_FILES);
// echo $_POST['productName'];
// $r= $_POST['productName'];
}
// if (isset($_POST['submit'])) {
//    $r= $_POST['productName'];
// }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <?php echo $insertProduct??''?>
        <div class="block">               
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Product Name..." name="productName" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option >Select Category</option>
                            <?php
                                    $catlist= $product->catlist();
                                    if ($catlist) {
                                       while($catrow= $catlist->fetch_assoc()){
                            ?>
                            <option value="<?php echo $catrow['catId'] ?>"><?php echo $catrow['catName'] ?></option>
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
                            <option value="<?php echo $brandRow['brandId'] ?>"><?php echo $brandRow['brandName'] ?></option>

                            <?php }} ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="details"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." name="price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
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
                            <option value="0">Featured</option>
                            <option value="1">Genaral</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
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


