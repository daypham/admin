<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    $cat = new category();
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $del_cat = $cat->del_category($id);
    }
    


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                <?php
                    if(isset($del_cat)){
                        echo $del_cat;
                    } 
                ?>         
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_cat = $cat->show_category();
							if($show_cat){
								$i = 0;
								while($result = $show_cat->fetch_array()){
									$i++;
							  
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['cateName'] ?></td>
							<td><a href="catedit.php?catid=<?php echo $result['cateId']?>">Edit</a> || <a onclick = "return confirm('Bạn có chắc muốn xóa?')" href="?delid=<?php echo $result['cateId']?>">Delete</a></td>
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

