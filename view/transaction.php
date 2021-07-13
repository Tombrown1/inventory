<?php 
   include_once '../database/connect.php';
       $mysqli = dbconnect();
      session_start();
      $user_id = $_SESSION['user_id'];
       if(!isset($_SESSION['user_id'])){
         header("Location: ../index.php");
         exit();
       }    
       include_once '../includes/header.php';
       include_once '../classes/supplier.php';
       include_once '../classes/measurement.php';
       include_once '../classes/product.php';
       include_once '../classes/addtocart.php';
       include_once '../classes/transaction.php';
?>
    <div class="container-fluid">       
        <div class="container">
        <div class="card">
                    <div class="card-header">               
                    </div>
                    <div class="card-body">
                        <h4 class="card-title" style="text-align:center;"><strong>Transaction Details</strong></h4>
                    <div class="table-responsive">
                    <table class="table table-hover " >
                    <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Measurement</th>
                    <th scope="col">Price</th>                   
                    <th scope="col">Supplier</th>
                    <th class="text-right"  scope="col">Delete</th>
                    </tr>
                    </thead>
                    <?php
                                $cnt = 1;
                                $result = get_all_transaction($mysqli);
                                    if(mysqli_num_rows($result)){
                                        while ($check_row = mysqli_fetch_assoc($result)) {
                                                $trans_id = $check_row['trans_id'];
                                                $customer_name = $check_row['customer_name'];
                                                // This Query fetches product name to checkout table;
                                                $res_prd   = get_product_by_id($mysqli, $prod_id = $check_row['prod_id']);
                                                $prd_row   = mysqli_fetch_assoc($res_prd);
                                                $prod_id   = $prd_row['prod_id'];
                                                $prod_name = $prd_row['prod_name'];
                                                // This Query fetches measurement name to checkout table;
                                                $quantity      = $check_row['quantity'];
                                                $res_measure = get_measurement_by_id($mysqli, $measure_id= $check_row['measure_id']);
                                                $measure_row = mysqli_fetch_assoc($res_measure);
                                                $measurement = $measure_row['measure_name'];
                                                // This Query fetches supplier name to checkout table;
                                                $price       = $check_row['price'];
                                                $res_sup = get_supplier_by_id($mysqli, $sup_id= $check_row['sup_id']);
                                                $sup_row = mysqli_fetch_assoc($res_sup);
                                                $supplier = $sup_row['sup_name'];
                                           ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $prod_name; ?></td>
                                        <td><?php echo $quantity; ?></td>
                                        <td><?php echo $measurement; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $supplier; ?></td>
                                        <td>
                                              
                                        <a class="btn btn-danger badge-pill" href="add2cart.php?delete=1">Delete</a></td>                                    
                                    </tr>
                                </tbody>

                                        <?php
                                        $cnt ++;
                                        }
                                    }
                                ?>
                    </table>
                                    <?php
                                                if(isset($_GET['update_delete'])){
                                                    $user_id = $_GET['user_id'];
                                                    $result = delete_transaction_logically($mysqli, $user_id);

                                                    if($result){
                                                        echo '<script>
                                                                alert("Transaction Record Deleted Successfully");
                                                                window.location ="transaction.php";
                                                              </script>';
                                                    }
                                                }
                                            ?>  

                    <div class="container">
                        <a href="transaction.php?update_delete=1&user_id=<?php echo $user_id ?>" class="btn btn-danger"> Clear Transaction</a>
                    </div>
</div>
        </div>
    </div>

<?php
    include_once '../includes/footer.php';
?>