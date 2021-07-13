<?php 
include_once '../database/connect.php';
    $mysqli = dbconnect();
    session_start();

    if(!isset($_SESSION['user_id'])){
      header("Location: ../index.php");
      exit();
    }   

   include_once '../classes/supplier.php';
   include_once '../includes/header.php';

   //$sup_row = 0;
 ?>

<!--Add Modal -->
<div class="modal fade" id="addsup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>

      <form action="../model/add_supplier.php" method="post">
      <div class="modal-body">      
            <div class="form-group">
                <label for="sup_name">Supplier Name</label>
                <input type="text" name="sup_name" class="form-control" placehoder="Supplier Name">
            </div>
            <div class="form-group">
                <label for="sup_comp">Company</label>
                <input type="text" name="sup_comp" class="form-control" placehoder="Company">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control" placehoder="Phone Numeber">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" placehoder="Address">
             </div>
          </div>    
       
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Add Supplier</button>        
          </div>

      </form>
    </div>
  </div>
</div>
    <?php
    // This Line of code helps to fetch sup_id to enable editing!

// if(isset($_GET['edit'])){
//   $sup_id = $_GET['sup_id'];
//   $supplier = get_supplier_by_id($mysqli, $sup_id);
//   $sup_row =  mysqli_fetch_assoc($supplier); 
//   $supp_id =  $sup_row['sup_id'];
//   $supname =  $sup_row['sup_name'];
//   ?>

  <!--=================Edit Modal====================-->
<div class="modal fade" id="editsup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form action="update_supplier.php" method="post">
      <div class="modal-body"> 
      <div class="form-group">      
            <input type="hidden" name="sup_id" id="sup_id" class="form-control" placehoder="First Name" required>
         </div>     
         <div class="form-group">
            <label for="sup_name">First Name</label>
            <input type="text" name="sup_name" id="sup_name"  class="form-control" placehoder="First Name" required>
         </div>       
         <div class="form-group">
            <label for="sup_comp">Company Name</label>
            <input type="text" name="sup_comp" id="sup_comp" class="form-control" placehoder="Company Name" required>
         </div>
         <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" class="form-control" placehoder="Phone Numeber" required>
         </div>
         <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" placehoder="Address">
         </div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Update Supplier</button>
      </div>
      </form>
    </div>
  </div>
</div>
   
<!--=================Delete Modal====================-->
<div class="modal fade" id="deletesup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form action="../model/delete_supplier.php" method="post">
      <div class="modal-body">    
           <input type="hidden" name="delete_id" id="delete_id" class="form-control" placehoder="Address">

          <h4>Do you want to Delete this data ??</h4>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" name="delete_sup" class="btn btn-primary">Yes Delete </button>
      </div>
      </form>
    </div>
  </div>
</div>

    
      <div class="container">     
          <div class="card">
            <div class="card-header">
            <h3>Supplier Details</h3>
            </div>
            <div class="card-body">
              <h5 class="card-title">Manage Supplier</h5>
                  <!-- <input type="submit" class="btn btn-success badge-pill float-right " style="width:80px" value="Add"> -->
                  <div class="row">
                     <div class="col-md-12 text-right">
                     <button class="btn btn-success badge-pill" data-bs-toggle="modal" data-bs-target="#addsup" style="width:120px">Add Supplier</button>
                  
                     </div>
                   </div>
                   <br>
              <table class="table table-hover table-border" >
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Supplier Name</th>
                      <th scope="col">Company Name</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Address</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>                 
                    <?php                    
                      $cnt = 1;
                      $result = get_all_supplier($mysqli);
                      if(mysqli_num_rows($result)){
                         while ($sup_row = mysqli_fetch_assoc($result)) {
                          $sup_id   = $sup_row['sup_id'];
                          $sup_name = $sup_row['sup_name'];
                          $sup_comp = $sup_row['sup_comp'];
                          $phone    = $sup_row['phone'];
                          $address  = $sup_row['address'];
                        ?>
                         <tbody>
                      <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php echo $sup_name;?></td>
                        <td><?php echo $sup_comp;?></td>
                        <td><?php echo $phone;?></td>
                        <td><?php echo $address;?></td>
                        <!-- <td><button type="button" class="btn btn-primary editbtn">Edit</button></td> -->
                        <td><button class="btn btn-primary badge-pill editbtn" style="width:80px">Edit</button></td>
                        <!-- <td class="text-right"> <a class="btn btn-primary badge-pill" style="width:80px" href="../model/add_supplier.php?edit=1&sup_id=<?php//echo $sup_id;?>">Edit</a></td>                        -->
                        <td> <button class="btn btn-danger badge-pill deletebtn" style="width:80px">Delete</button></td>
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