<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
    $pro = new product();

    if(!isset($_GET['proId']) || $_GET['proId']==NULL){
        echo "<script>window.location = 'productlist.php' </script>";
    }else{
        $id = $_GET['proId'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $update_pro = $pro->update_pro($_POST, $_FILES,$id);
    } 
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">
        <?php
            if(isset($update_pro)){
                echo $update_pro;
            } 
        ?>

        <?php
            $get_pro_id = $pro->getproId($id);
            if($get_pro_id){
                while($result_pro = $get_pro_id->fetch_array()){
        ?>                
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="proName" value="<?php echo $result_pro['productName']?>" class="medium" />
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
                            <option
                            <?php
                                if($result['cateId'] == $result_pro['catId']){ echo 'selected'; }
                            ?> value="<?php echo $result['cateId'] ?>"><?php echo $result['cateName'] ?></option>
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
                            <option
                            <?php
                                if($result['brandId'] == $result_pro['brandId']){ echo 'selected'; }
                            ?>
                             value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
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
                        <textarea class="tinymce" value="<?php echo $result_pro['productDesc']?>" name="proDesc"> </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="proPrice" value="<?php echo $result_pro['productPrice']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <img src = "uploads/<?php echo $result_pro['productImg'] ?>" width="80px">
                        <br/>
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
                            <?php
                                if($result_pro['productType'] == 0){

                            ?>
                            <option selected value="0">Bình thường</option>
                            <option value="1">Nổi bật</option>
                            <?php
                            }else{
                            ?>
                            <option  value="0">Bình thường</option>
                            <option selected value="1">Nổi bật</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
            }
            }
            ?>
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


