<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include('../helpers/format.php'); ?>
<?php
  $filepath = realpath(dirname(__FILE__));
  include($filepath.'/../classes/cart.php');
  
?>
<?php
	$cart = new cart();
	if(isset($_GET['shiftid'])){
		$id = $_GET['shiftid'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$shiftid = $cart->shiftid($id, $time, $price);
	} 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">
                <?php
                	if(isset($shiftid)){
                		echo $shiftid;
                	} 
                ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
						 	<th>STT</th>
							<th>Thời gian đặt</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Id khách</th>
							<th>Địa chỉ</th>
							<th>Trạng thái</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$cart = new cart();
							$fm = new Format();
							$get_inbox_cart = $cart->get_inbox_cart();
							if($get_inbox_cart){
								$i = 0;
								while($result = $get_inbox_cart->fetch_assoc()){
									$i++;

						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $fm->formatDate($result['date_order'])?></td>
							<td><?php echo $result['productName']?></td>
							<td><?php echo $result['quantity']?></td>
							<td><?php echo $result['price']?></td>
							<td><?php echo $result['customerId']?></td>
							<td><a href="customer.php?customerId=<?php echo $result['customerId']?>">Xem địa chỉ</a>	</td>
							<td><?php 
								if($result['status']==0){
								?>
								<a href="?shiftid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Chưa xử lý</a>
								<?php
								}else{
									echo '<a href="">Đã xử lý</a>';
								}
								?></td>
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
