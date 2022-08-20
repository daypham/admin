<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
    $pro = new product();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $insert_pro = $pro->insert_pro($_POST, $_FILES);
    } 
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <div class="block">
        <?php
            if(isset($insert_pro)){
                echo $insert_pro;
            } 
        ?>                
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="proName" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>-----Chọn danh mục-----</option>
                            <?php
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while($result = $catlist->fetch_array()){

                            ?>
                            <option value="<?php echo $result['cateId'] ?>"><?php echo $result['cateName'] ?></option>
                            <?php
                            }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>----Chọn thương hiệu-----</option>
                              <?php
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while($result = $brandlist->fetch_array()){

                            ?>
                            <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                            <?php
                            }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="proDesc"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="proPrice" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại</label>
                    </td>
                    <td>
                        <select id="select" name="proType">
                            <option>Chọn loại</option>
                            <option value="0">Bình thường</option>
                            <option value="1">Nổi bật</option>
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


