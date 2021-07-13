<?php 
include_once '../database/connect.php';
    $mysqli = dbconnect();
   session_start();
   $prod_row = 0;
    if(!isset($_SESSION['user_id'])){
      header("Location: ../index.php");
      exit();
    }    
    include_once '../includes/header.php';
    include_once '../classes/supplier.php';
    include_once '../classes/measurement.php';
    include_once '../classes/product.php';
 ?>
 <style>
    #val {
  border:2px solid orange;
  border-radius: 15px;
  text-align: center;
  padding: 20px;
  width: 25%;
  /* height: 70px; */
  position: relative;
  left:40%;
  top: 100px;
}
#prod {
  border:2px solid orange;
  border-radius: 15px;
  text-align: center;
  padding: 20px;
  width: 25%;
  /* height: 70px; */
  position: relative;
  top: -8px;  
}
#box{
  margin-top:-120px;  
}

 </style>
<!--Add Product Modal -->
<div class="modal fade" id="addprod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>

      <form action="../model/add_product.php" method="post">
      <div class="modal-body">      
            <div class="form-group">
                <label for="prod_name">Product Name</label>
                <input type="text" name="prod_name" class="form-control" placeholder="Supplier Name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity" required>
            </div>
            <div class="form-group">
                <label for="measurement">Measurement</label>
                <select name="measure_id" class="form-control">
                    <?php
                    $result =get_all_measurement($mysqli);
                        if(mysqli_num_rows($result) > 0){
                            while($sup_row = mysqli_fetch_assoc($result)){
                                $measure_id = $sup_row['measure_id'];
                                $measure_name = $sup_row['measure_name'];                                                       
                        ?>                       
                        <option value="<?php echo $measure_id?>"><?php echo $measure_name?></option>
                        <?php                          
                        }
                    }
                    ?>                   
                </select>              
            </div>
            <div class="form-group">
                <label for="original_price">Original Price</label>
                <input type="number" name="original_price" id="original_price" onchange="Cal_price()" class="form-control" placeholder="Original Price" required>
             </div>
             <div class="form-group">
                <label for="profit">Profit</label>
                <input type="number" name="profit" id="profit" class="form-control" onchange="Cal_price()" placeholder="Profit" required>
             </div>
             <div class="form-group">
                <label for="selling_price">Selling Price</label>
                <input type="number" name="selling_price" id="selling_price" class="form-control" placeholder="Selling Price" required>
             </div>
             <div class="form-group">
                <label for="supplier">Supplier</label>
                <select name="sup_id"  class="form-control">
                    <option value="">Select Supplier</option>
                    <?php
                    $result = get_all_supplier($mysqli);
                        if(mysqli_num_rows($result) > 0){
                            while($sup_row = mysqli_fetch_assoc($result)){
                                $sup_id = $sup_row['sup_id'];
                                $sup_name = $sup_row['sup_name'];                                                       
                        ?>                       
                        <option value="<?php echo $sup_id?>"><?php echo $sup_name?></option>
                        <?php                          
                        }
                    }
                    ?>
                </select>               
             </div>
          </div>    
       
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Add Product</button>        
          </div>

      </form>
    </div>
  </div>
</div>

<!--Edit Product Modal -->
<div class="modal fade" id="editprod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>

      <form action="" method="post">
      <div class="modal-body"> 
          <div class="form-group">
              <input type="hidden" name="prod_id" id="prod_id">
          </div>     
            <div class="form-group">
                <label for="prod_name">Product Name</label>
                <input type="text" name="prod_name" id="prod_name" class="form-control" placeholder="Supplier Name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity" required>
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
</div>
    
      <div class="container">     
          <div class="card">
            <div class="card-header">
            <h3>Inventory</h3>
            </div>
            <div class="card-body">              
                  <!-- <input type="submit" class="btn btn-success badge-pill float-right " style="width:80px" value="Add"> -->
                  <div class="row">
                     <div class="col-md-12 text-right">                     
                     <button class="btn btn-primary badge-pill" data-bs-toggle="modal" data-bs-target="#addprod" style="width:120px">Add Product</button>
                        <div id="box">
                          <h5 class="card-title" id="val">Total Inventory Value 
                          <br>
                          <?php
                              $result = total_product_value($mysqli);
                              $tot_val_row = mysqli_fetch_assoc($result);
                              $total_product_value = $tot_val_row['total_product_value'];
                           ?>
                          <strong>#<?php echo $total_product_value ?></strong>
                           </h5>

                          <h5 class="card-title" id="prod">Total Products
                           <br> 
                           <?php
                              $result = count_total_product($mysqli);
                              $count_row = mysqli_fetch_assoc($result);
                              $total_product = $count_row['total_product'];
                           ?>
                          <strong> <?php echo $total_product ?></strong>
                           </h5>
                        </div>
                     </div>
                    
                   </div>
                   <br>
              <table class="table table-hover table-border" >
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Measurement</th>
                      <th scope="col">Original Price</th>
                      <th scope="col">Profit</th>
                      <th scope="col">Selling Price</th>                      
                      <th scope="col">Supplier</th>
                      <th class="text-right"  scope="col">Action</th>
                    </tr>
                  </thead>
                 
                      <?php
                      $cnt = 1;
                      // this query fetches all details about the product and display it on the manage inventory table!
                      $result = get_all_product($mysqli);
                        if(mysqli_num_rows($result) > 0){
                            while ($prod_row = mysqli_fetch_assoc($result)) {
                               $prod_id         = $prod_row['prod_id'];
                               $prod_name       = $prod_row['prod_name'];
                               $quantity        = $prod_row['quantity'];
                                //  This below query is to fetch the measurement id and echo the measurement name from the measurement table!
                                $res_measure = get_measurement_by_id($mysqli, $measure_id = $prod_row['measure_id']);
                                while ($measure_row = mysqli_fetch_assoc($res_measure)) {
                                    $measure_name = $measure_row['measure_name'];
                                }
                               $original_price  = $prod_row['original_price'];
                               $profit          = $prod_row['profit'];
                               $selling_price   = $prod_row['selling_price'];

                                    //  This below query is to fetch the supplier id and echo the supplier name from the supplier table!
                                $res_sup = get_supplier_by_id($mysqli, $sup_id = $prod_row['sup_id']);
                                while ($sup_row = mysqli_fetch_assoc($res_sup)) {
                                    $sup_name = $sup_row['sup_name'];
                                }
                              ?>
                         <tbody>
                        <tr>
                        <td scope="col"><?php echo $cnt ?></td>    
                        <td scope="col"><?php echo $prod_name ?></td> 
                        <td scope="col"><?php echo $quantity ?></td>
                        <td scope="col"><?php echo $measure_name ?></td> 
                        <td scope="col"><?php echo $original_price ?></td>
                        <td scope="col"><?php echo $profit ?></td> 
                        <td scope="col"><?php echo $selling_price ?></td>
                        <td scope="col"><?php echo $sup_name ?></td>
                        <td><button class="btn btn-primary badge-pill " type="button" value="open popup" onclick="window.open('edit_product.php?edit=1&prod_id=<?php echo $prod_id ?>', '_blank', 'height=700, width=400 top=-200 left=100')" style="width:80px">Edit</button></td>
                        <!-- <td><button class="btn btn-primary editprd badge-pill" style="width:80px">Edit</button></td> -->
                        <td><button class="btn btn-danger badge-pill" style="width:80px">Delete</button></td>
                        <!-- <td class="text-right" >
                            <button class="btn btn-primary badge-pill" data-bs-toggle="modal" data-bs-target="#editsup" style="width:80px">Edit</button> edit_product.php?edit=1&prod_id=<?php echo $prod_id ?>
                            <button class="btn btn-danger badge-pill" style="width:80px">Delete</button>
                        </td>                    -->
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

      <?php
        include_once '../includes/footer.php';                  
      
         
    ?>
   
      <script language="javascript" >
          function Cal_price()
          {
            var purchase_price = document.getElementById('original_price').value;
            var profit = document.getElementById('profit').value;
            var selling_price = purchase_price + profit;

            document.getElementById('selling_price').value = selling_price;
          }
      </script>