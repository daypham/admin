<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    $cat = new category();

    if(!isset($_GET['catid']) || $_GET['catid']==NULL){
        echo "<script>window.location = 'catlist.php' </script>";
    }else{
        $id = $_GET['catid'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $catName = $_POST['catName'];

        $update_cat = $cat->update_category($catName, $id);
    } 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>

               <div class="block copyblock">
               <?php
                    if(isset($update_cat)){
                        echo $update_cat;
                    } 
                ?> 
                <?php
                    $get_cat_name = $cat->getcatId($id);
                    if($get_cat_name){
                        while($result = $get_cat_name->fetch_array()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['cateName']?>" name="catName" placeholder="Tên danh mục..." class="medium" />
                            </td>
                        </tr>
						<tr> 
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
<?php include 'inc/footer.php';?>