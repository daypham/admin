<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php';?>
<?php
    $cs = new customer();

    if(!isset($_GET['customerId']) || $_GET['customerId']==NULL){
        echo "<script>window.location = 'inbox.php' </script>";
    }else{
        $id = $_GET['customerId'];
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
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_array()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Name: </td>
                            <td><?php echo $result['name']?></td>
                        </tr>
                        <tr>
                            <td>Phone: </td>
                            <td><?php echo $result['phone']?></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><?php echo $result['email']?></td>
                        </tr>
                        <tr>
                            <td>Address: </td>
                            <td><?php echo $result['address']?></td>
                        </tr>
                        <tr>
                            <td>Country: </td>
                            <td><?php echo $result['country']?></td>
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