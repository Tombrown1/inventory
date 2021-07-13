<?php
include_once '../database/connect.php';
$mysqli = dbconnect();

include_once '../classes/supplier.php';
include_once '../classes/product.php';

  if(isset($_POST['submit'])){
    $prod_name      = $_POST['prod_name'];
    $quantity       = $_POST['quantity'];
    $measure_id     = $_POST['measure_id'];
    $original_price = $_POST['original_price'];
    $profit         = $_POST['profit'];
    $selling_price  = $_POST['selling_price'];
    $sup_id         = $_POST['sup_id'];
    // print_r($_POST);
    // exit();

    // Clean Input Variables before inserting into Database!
    $prod_name      = mysqli_real_escape_string($mysqli, $prod_name);
    $quantity       = mysqli_real_escape_string($mysqli, $quantity);
    $measure_id    = mysqli_real_escape_string($mysqli, $measure_id);
    $original_price = mysqli_real_escape_string($mysqli, $original_price);
    $profit         = mysqli_real_escape_string($mysqli, $profit);
    $selling_price  = mysqli_real_escape_string($mysqli, $selling_price);
    $sup_id       = mysqli_real_escape_string($mysqli, $sup_id);

    $added_product = add_product($mysqli, $prod_name, $quantity, $measure_id, $original_price, $profit, $selling_price, $sup_id);
      if($added_product){
        echo '<script>
              alert("Product Added Successfully!");
              window.location = "../view/product.php";
            </script>';
    }    
  }
