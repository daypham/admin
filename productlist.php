<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$pro = new product();
	$fm = new Format();

	if(isset($_GET['proId'])){
        $id = $_GET['proId'];
        $del_pro = $pro->del_pro($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">
        	<?php
                if(isset($del_pro)){
                    echo $del_pro;
                } 
                ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên</th>
					<th>Giá</th>
					<th>Hình ảnh</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					<th>Mô tả</th>
					<th>Loại</th>
					<th>Action</th>

				</tr>
			</thead>
			<tbody>
				<?php
					$prolist = $pro->show_pro();
					if($prolist){
						$i = 0;
						while($result = $prolist->fetch_array()){
							$i++;
				?>
				<tr class="odd gradeX">
					
					<td><?php echo $i?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['productPrice'] ?></td>
					<td><img src = "uploads/<?php echo $result['productImg'] ?>" width="70px"></td>
					<td><?php echo $result['cateName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $fm->textShorten($result['productDesc'], 10)?></td>
					<td><?php
						if($result['productType'] == 0){
							echo 'Bình thường';
						}else{
							echo 'Nổi bật';
						}
						?></td>
					<td><a href="productedit.php?proId=<?php echo $result['productId']?>">Edit</a> || <a href="?proId=<?php echo $result['productId']?>">Delete</a></td>
				</tr>
				<?php
					}
					} 
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
