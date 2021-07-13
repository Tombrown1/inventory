<?php
include_once '../database/connect.php';
$mysqli = dbconnect();

include_once '../classes/supplier.php';

if(isset($_POST['submit'])){
  $sup_name = $_POST['sup_name'];
  $sup_comp = $_POST['sup_comp'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  // print_r($_POST);
  // exit();

  // Clean Input Variables before inserting into Database!
  $sup_name = mysqli_real_escape_string($mysqli, $sup_name);
  $sup_comp = mysqli_real_escape_string($mysqli, $sup_comp);
  $phone = mysqli_real_escape_string($mysqli, $phone);
  $address = mysqli_real_escape_string($mysqli, $address);

  $added_supplier = add_supplier($mysqli, $sup_name, $sup_comp, $phone, $address);
    if($added_supplier){
      echo '<script>
            alert("Supplier Added Successfully!");
            window.location = "../view/supplier.php";
          </script>';
  }    
}


