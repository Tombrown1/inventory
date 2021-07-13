<?php
include_once '../database/connect.php';
$mysqli = dbconnect();

include_once '../classes/product.php';
include_once '../classes/measurement.php';
include_once '../classes/supplier.php';


    if(isset($_GET['edit'])){
        $prod_id = $_GET['prod_id'];
        $result = get_product_by_id($mysqli, $prod_id);
        $prod_row = mysqli_fetch_assoc($result);
        $prod_id = $prod_row['prod_id'];

    }
    
     include_once '../includes/header.php';


     if(isset($_POST['update'])){
       $prod_id        = $_POST['prod_id'];
       $prod_name      = $_POST['prod_name'];
       $quantity       = $_POST['quantity'];
       $measure_id     = $_POST['measure_id'];
       $original_price = $_POST['original_price'];
       $profit         = $_POST['profit'];
       $selling_price  = $_POST['selling_price'];
       $sup_id         = $_POST['sup_id'];


       //checking value to be clean before inserting into DB

       $prod_id          = mysqli_real_escape_string($mysqli, $prod_id);
       $prod_name        = mysqli_real_escape_string($mysqli, $prod_name);
       $quantity         = mysqli_real_escape_string($mysqli, $quantity);
       $measure_id       = mysqli_real_escape_string($mysqli, $measure_id);
       $original_price   = mysqli_real_escape_string($mysqli, $original_price);
       $profit           = mysqli_real_escape_string($mysqli, $profit);
       $selling_price    = mysqli_real_escape_string($mysqli, $selling_price);
       $sup_id           = mysqli_real_escape_string($mysqli, $sup_id);


       $prod_update = update_product($mysqli, $prod_id, $prod_name, $quantity, $measure_id, $original_price, $profit,$selling_price,$sup_id);
          if($prod_update){
            echo '<script>
                    alert("Product is updated successfully!");
                    window.location = "product.php";
                  </script>';
          }
       
     }
?>


<!--=================Edit Product Modal====================-->


    <div class="container">
        <div class="col-md-6">
        <form action="" method="post">
      <div class="modal-body"> 
          <div class="form-group">
              <input type="hidden" name="prod_id" id="prod_id" value="<?php echo $prod_row['prod_id'] ?>">
          </div>     
            <div class="form-group">
                <label for="prod_name">Product Name</label>
                <input type="text" name="prod_name" id="prod_name" value="<?php echo $prod_row['prod_name'] ?>" class="form-control" placeholder="Supplier Name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity"   value="<?php echo $prod_row['quantity'] ?>" class="form-control" placeholder="Quantity" required>
            </div>
            <div class="form-group">
                <label for="measurement">Measurement</label>
               <select name="measure_id"  class="form-control">
                  <option value="">Measurement</option>
                    <?php
                      $result = get_all_measurement($mysqli);
                      if(mysqli_num_rows($result) > 0){
                      while ($measure_row = mysqli_fetch_assoc($result)) {
                          $measure_id = $measure_row['measure_id'];
                          $measure_name = $measure_row['measure_name'];   
                          
                          // Check if measurement is selected
                          $chk_measure = get_measurement_by_id($mysqli, $measure_id = $measure_row['measure_id']);
                          $check = false;
                            if(mysqli_num_rows($chk_measure) > 0) {
                              while ($row_measure = mysqli_fetch_assoc($chk_measure)) {
                                  $chk_measure_id = $row_measure['measure_id'];
                                    if($chk_measure_id == $measure_id){
                                      $check = true;
                                      break;
                                    }
                              }
                            }
                      ?>
                    <option value="<?php echo $measure_id ?>" <?php if($chk_measure_id == $prod_row['measure_id']){ echo "selected";} ?>><?php echo $measure_name ?>  </option>
                    <?php
                      }                    
                      }
                    ?>
               </select>
            </div>
            <div class="form-group">
                <label for="original_price">Original Price</label>
                <input type="text" name="original_price" id="original_price" value="<?php echo $prod_row['original_price'] ?>" class="form-control" placeholder="Original Price" required>
             </div>
             <div class="form-group">
                <label for="profit">Profit</label>
                <input type="text" name="profit" id="profit" value="<?php echo $prod_row['profit'] ?>" class="form-control" placeholder="Profit" required>
             </div>
             <div class="form-group">
                <label for="selling_price">Selling Price</label>
                <input type="text" name="selling_price" id="selling_price" value="<?php echo $prod_row['selling_price'] ?>" class="form-control" placeholder="Selling Price" required>
             </div>
             <div class="form-group">               
                  <select name="sup_id" id="" class="form-control">
                      <option value="">Supplier</option>
                      <?php
                        $result = get_all_supplier($mysqli);
                        if(mysqli_num_rows($result)){
                            while ($sup_row = mysqli_fetch_assoc($result)) {
                             $sup_id = $sup_row['sup_id'];
                             $sup_name = $sup_row['sup_name'];

                                // Use this Query to fetch supplier information by id from supplier table
                                $sup_res = get_supplier_by_id($mysqli, $sup_id = $sup_row['sup_id']);
                                  $check_sup = false;
                                if(mysqli_num_rows($sup_res) > 0){
                                  while ($row_sup = mysqli_fetch_assoc($sup_res)) {
                                    $sup_res_id = $row_sup['sup_id'];

                                    if($sup_res_id == $sup_id){
                                      $check_sup = true;
                                      break;
                                    }                              
                                  }
                                }

                             ?>
                             <option value="<?php echo $sup_id ?>" <?php if($sup_res_id == $prod_row['sup_id']){ echo "selected";} ?>><?php echo $sup_name ?></option>
                             <?php
                            }
                        }
                      ?>
                  </select>
             </div>
          </div>    
       
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" name="update" class="btn btn-primary">Update Product</button>        
          </div>

      </form>
        </div>
    </div>








<!-- <div class="modal fade" id="editprod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

      <form action="" method="post">
      <div class="modal-body"> 
          <div class="form-group">
              <input type="hidden" name="prod_id" id="prod_id">
          </div>     
            <div class="form-group">
                <label for="prod_name">Product Name</label>
                <input type="text" name="prod_name" id="prod_name" value="<?php// echo $prod_row['prod_name'] ?>" class="form-control" placeholder="Supplier Name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity"   value="<?php //echo $prod_row['quantity'] ?>" class="form-control" placeholder="Quantity" required>
            </div>
            <div class="form-group">
                <label for="measurement">Measurement</label>
                <input type="text" name="measurement" id="measurement" class="form-control" placeholder="Measurement" required>
            </div>
            <div class="form-group">
                <label for="original_price">Original Price</label>
                <input type="text" name="original_price" id="original_price" class="form-control" placeholder="Original Price" required>
             </div>
             <div class="form-group">
                <label for="profit">Profit</label>
                <input type="text" name="profit" id="profit" class="form-control" placeholder="Profit" required>
             </div>
             <div class="form-group">
                <label for="selling_price">Selling Price</label>
                <input type="text" name="selling_price" id="selling_price" class="form-control" placeholder="Selling Price" required>
             </div>
             <div class="form-group">
                <label for="supplier">Supplier</label>
                <input type="text" name="supplier" id="supplier" class="form-control" placeholder="Supplier" required>
             </div>
          </div>    
       
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="update" class="btn btn-primary">Update Product</button>        
          </div>

      </form>
    </div>
  </div>
</div> -->











<?php
        // include_once '../includes/footer.php';                  
      
         
    ?>