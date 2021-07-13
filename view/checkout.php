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
        <h2>Checkout</h2>
        </div>  
        <!-- Add to Cart Table begins here!        -->
    <div class="row">            
            <div class="col-md-6">
                <div class="card">
                        <div class="card-header">              
                        </div>
                        <div class="card-body">
                                <h4 class="card-title"><Strong>Cart</Strong></h4>
                                <div class="table-responsive">
                                <table class="table table-hover table-border" >
                                <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Measurement</th>
                                    <th scope="col">Price</th>                   
                                    <th scope="col">Supplier</th>
                                    <th >Delete</th>
                                    </tr>
                                </thead>
                                <?php
                                $cnt = 1;
                                $result = get_all_add_to_cart($mysqli);
                                    if(mysqli_num_rows($result)){
                                        while ($check_row = mysqli_fetch_assoc($result)) {
                                           $customer_name = $check_row['customer_name'];
                                                // This Query fetches product name to checkout table;
                                                $res_prd   = get_product_by_id($mysqli, $prod_id = $check_row['prod_id']);
                                                $prd_row   = mysqli_fetch_assoc($res_prd);
                                                $prod_id   = $prd_row['prod_id'];
                                                $prod_name = $prd_row['prod_name'];
                                                // This Query fetches measurement name to checkout table;
                                           $quantity      = $check_row['req_quantity'];
                                                $res_measure = get_measurement_by_id($mysqli, $measure_id= $check_row['measure_id']);
                                                $measure_row = mysqli_fetch_assoc($res_measure);
                                                $measurement = $measure_row['measure_name'];
                                                // This Query fetches supplier name to checkout table;
                                           $price         = $check_row['selling_price'];
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
                                        <td><a class="btn btn-danger badge-pill" href="add2cart.php?delete=1&cart_id=<?php echo $check_row['cart_id'] ?>">Delete</a></td>                                    
                                    </tr>
                                </tbody>

                                        <?php
                                        $cnt ++;
                                        }
                                    }
                                ?>
                                </table>
                                </div>
                        </div>                        
                </div>
                    <div class="container"> 
                    <br><br>
                       <div class="row">                           
                       <div class="col-md-"> 
                           <?php 
                                $result =  sum_cart_item($mysqli);
                                $cart_sum_row = mysqli_fetch_assoc($result);
                                $cart_sum = $cart_sum_row['cart_sales'];
                            ?>
                            <strong>Total Sales: &nbsp;&nbsp;# <input type="text" id="total_sales" onchange="Calcartitem()"  value="<?php echo $cart_sum ?>" readonly> </strong> <br>  <br>
                            <strong>Amount Paid: </strong> <input type="text" name="amount" id="amount" onchange="Calcartitem()"> <br><br>
                            <strong>Balance: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;# <input type="text" name="balance" id="balance"> <br> </strong> 
                            <?php
                           ?>                                           
                           
                       </div> 
                      
                       <div class="col-md-3">
                           <?php
                                if(isset($_GET['update'])){
                                    $user_id = $_GET['user_id'];
                                    $result = update_add_to_cart_status($mysqli, $user_id);
                                    $cart_id = mysqli_insert_id($mysqli);                                   
                                    
                                    $fetch_cart = fetch_all_from_cart($mysqli, $cart_id);
                                    if(mysqli_num_rows($fetch_cart > 0)){
                                        while($values = mysqli_fetch_assoc($mysqli)){
                                            $values = mysqli_fetch_assoc($fetch_cart);
                                            $user_id = $values['user_id'];
                                            $customer_name = $values['customer_name'];
                                            $prod_id = $values['prod_id'];
                                            $quantity = $values['quantity'];
                                            $measure_id = $values['measure_id'];
                                            $price = $values['price'];
                                            $sup_id = $values['sup_id'];
                                        }
                                    }                                   

                              $insert_trans = transaction($mysqli, $user_id, $customer_name, $prod_id, $quantity, $measure_id, $price, $sup_id);
                                    if($insert_trans){
                                        echo "<script>
                                                alert('Item Checked out successfully');
                                                window.location = 'checkout.php '; 
                                            </script>";
                                    }
                                    
                            }

                           ?>
                           <a href="checkout.php?update=1&user_id=<?php echo $user_id ?>" class="btn btn-primary" type="submit">Checkout</a>
                       </div>
                       </div>                 
                    </div>
         </div>
       

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">               
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><strong>Products</strong></h4>
                    <div class="table-responsive">
                    <table class="table table-hover " >
                    <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Measurement</th>
                    <th scope="col">Price</th>                   
                    <th scope="col">Supplier</th>
                    <th class="text-right"  scope="col">Add to Cart</th>
                    </tr>
                    </thead>
                    <?php
                    $cnt = 1;
                        $result = get_all_product($mysqli);
                        if(mysqli_num_rows($result) > 0){
                            while ($prod_row = mysqli_fetch_assoc($result)) {
                                $prod_name = $prod_row['prod_name'];
                                $quantity = $prod_row['quantity'];
                                    $mea_res = get_measurement_by_id($mysqli, $measure_id= $prod_row['measure_id']);
                                        $mea_row = mysqli_fetch_assoc($mea_res);
                                        $measurement = $mea_row['measure_name'];
                                $price = $prod_row['selling_price'];
                                    $sup_res = get_supplier_by_id($mysqli, $sup_id= $prod_row['sup_id']);
                                    $sup_row = mysqli_fetch_assoc($sup_res);
                                    $supplier = $sup_row['sup_name'];                               
                                ?>
                        <body>
                            <tr>
                                <td><?php echo $cnt ?></td>
                                <td><?php echo $prod_name ?></td>
                                <td><?php echo $quantity ?></td>
                                <td><?php echo $measurement ?></td>
                                <td><?php echo $price ?></td>
                                <td><?php echo $supplier ?></td>
                                <td><button class="btn btn-primary badge-pill" type="button" value="open popup" onclick="window.open('add2cart.php?add=1&prod_id=<?php echo $prod_row['prod_id']?>', '_blank', 'height=700, width=400, top=-400, left=100')" >Add</button></td>
                            </tr>
                        </body>                            
                            <?php
                            $cnt ++;
                                }
                            }
                        ?>
                        
                    </table>
                    </div>
                    </div>
                </div>
            </div>
       
    </div>
 </div>
<?php
    include_once '../includes/footer.php';
?>

<script  >
    function Calcartitem()
    {
        var sales_amount = document.getElementById('total_sales').value;
        var amount_deposited = document.getElementById('amount').value;
        var balance = amount_deposited - sales_amount;

        document.getElementById('balance').value = balance;

    }
</script>