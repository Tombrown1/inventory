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


       if(isset($_POST['submit'])){
           $customer_name = $_POST['customer_name'];
           $prod_id       = $_POST['prod_id'];
           $prod_name     = $_POST['prod_name'];
           $quantity      = $_POST['quantity'];
           $measure_id    = $_POST['measure_id'];
           $selling_price = $_POST['selling_price'];
           $sup_id        = $_POST['sup_id'];
           $req_quantity  = $_POST['req_quantity'];
           $new_quantity =  $quantity - $req_quantity;           
           $fprice        = $_POST['fprice'];

          

           //Clean the input variables before posting it to the database;

           $customer_name = mysqli_real_escape_string($mysqli, $customer_name);
           $user_id = mysqli_real_escape_string($mysqli, $user_id);
           $prod_name     = mysqli_real_escape_string($mysqli, $prod_name);
           $quantity      = mysqli_real_escape_string($mysqli, $quantity);
           $measure_id    = mysqli_real_escape_string($mysqli, $measure_id);
           $selling_price = mysqli_real_escape_string($mysqli, $selling_price);
           $sup_id        = mysqli_real_escape_string($mysqli, $sup_id);
           $req_quantity  = mysqli_real_escape_string($mysqli, $req_quantity);
           $new_quantity  = mysqli_real_escape_string($mysqli, $new_quantity);
           $fprice        = mysqli_real_escape_string($mysqli, $fprice);

           // This Query execute and reduce the available product with the exact value of quantity that is added to the cart!
           update_quantity($mysqli, $prod_id, $new_quantity);
            // This query adds to the cart the number of items to be purchase!
      $added2cart =   add_to_cart($mysqli, $user_id, $customer_name, $prod_id, $measure_id, $selling_price, $sup_id, $req_quantity, $fprice);

           if($added2cart){
               echo '<script>
                        alert("Item added to cart sussessfully!");
                        window.location = "checkout.php";
                    </script>';
           }

           
       }

       // This query helps to delete product added to cart table and
       // the get cart quantity function fetch the exact quantity of item that is deleted from the cart
       // and the_update_delete function update same deleted number of value to the exact product items in the product table.

       if(isset($_GET['delete'])){
        $cart_id = $_GET['cart_id'];

        $del_quantity =  get_cart_quantity($mysqli, $cart_id);
         $cart_row = mysqli_fetch_array($del_quantity);
             $update_value = $cart_row['req_quantity'];
             $prod_id      = $cart_row['prod_id'];            

         
         update_delete_quantity($mysqli, $prod_id, $update_value);


        $result = delete_add_to_cart_by_id($mysqli, $cart_id);

        if($result){
         echo '<script>
                 alert("Item added to cart sussessfully!");
                 window.location = "checkout.php";
             </script>';
        }
    }


       
   
?>
    <div class="container">
        <h3>Add to Cart</h3>
    
    <?php
        if(isset($_GET['add'])){
            $prod_id = $_GET['prod_id'];
            $result = get_product_by_id($mysqli, $prod_id);
            $prod_row = mysqli_fetch_assoc($result);
            $prod_id = $prod_row['prod_id'];

                $sup_res = get_supplier_by_id($mysqli, $sup_id = $prod_row['sup_id']);
                $sup_row = mysqli_fetch_assoc($sup_res);
                $sup_id = $sup_row['sup_id'];
                $sup_name = $sup_row['sup_name'];

                $res_measure = get_measurement_by_id($mysqli, $measure_id = $prod_row['measure_id']);
                $measure_row = mysqli_fetch_assoc($res_measure);
                $measure_id = $measure_row['measure_id'];
                $measure_name = $measure_row['measure_name'];
            ?>



            

            <!-- Add product to cart form begins here! -->       
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="modal-body">          
          <div class="form-group">
                <label for="prod_name">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name"  class="form-control" placeholder="Customer Name" required>
            </div> 
            <div class="form-group">
              <input type="hidden" name="prod_id" id="prod_id" value="<?php echo $prod_row['prod_id'] ?>">
          </div>    
            <div class="form-group">
                <label for="prod_name">Product</label>
                <input type="text" readonly="readonly" name="prod_name" id="prod_name" value="<?php  echo $prod_row['prod_name'] ?>" class="form-control" placeholder="Supplier Name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Available Quantity</label>
                <input type="text" name="quantity" id="quantity" readonly="readonly"  value="<?php echo $prod_row['quantity'] ?>" class="form-control" placeholder="Quantity" required>
            </div>             
            <div class="form-group">             
                <input type="hidden" name="measure_id" id="measure_id"  value="<?php echo $measure_id?>" class="form-control">
             </div>      
            <div class="form-group">
                <label for="measure_id">Measurement</label>                
                <input type="text" readonly="readonly" value="<?php echo $measure_name?>" class="form-control">
             </div>
             <div class="form-group">
                <label for="selling_price">Price</label>
                <input type="text" name="selling_price" readonly="readonly" onchange="calcPrice()" id="selling_price" value="<?php echo $prod_row['selling_price'] ?>" class="form-control" placeholder="Selling Price" required>
             </div>
             <div class="form-group">       
                <input type="hidden" name="sup_id" id="sup_id" value="<?php echo $sup_id ?>" class="form-control" required>
             </div>
             <div class="form-group">
                <label for="sup_name">Supplier</label>                
                <input type="text" readonly="readonly"  value="<?php echo $sup_name ?>" class="form-control"  required>
             </div>
             <div class="form-group">
                <label for="req_quantity">Required Quantity</label>
                <input type="text" name="req_quantity" onchange="calcPrice()"  id="req_quantity"  class="form-control" placeholder="Required Quantity" required>
            </div>
            <div class="form-group">
                <label for="fprice">Final Price</label>
                <input type="text" name="fprice" id="fprice" class="form-control" placeholder="Final Price" required>
            </div>  
       </div>  
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" name="submit" class="btn btn-primary">Add to Cart</button>        
          </div>

      </form>
      

       <?php 
        }
    ?>

       
</div>
<?php
    include_once '../includes/footer.php';
?>

<script language="javascript" >
function calcPrice()
{
   var quantity = document.getElementById('req_quantity').value;
   var price = document.getElementById('selling_price').value;
   var amount = quantity * price;
   document.getElementById('fprice').value = amount;

}
</script>