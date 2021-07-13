<?php
include_once '../database/connect.php';
  $mysqli = dbconnect();

include_once '../classes/supplier.php';

  if(isset($_POST['update'])){
    $sup_id   = $_POST['sup_id'];
    $sup_name = $_POST['sup_name'];
    $sup_comp = $_POST['sup_comp'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];


    // using php function to check data is safe for the database.. mysqli_real_escape_string!

    $sup_id   = mysqli_real_escape_string($mysqli, $sup_id);
    $sup_name = mysqli_real_escape_string($mysqli, $sup_name);
    $sup_comp = mysqli_real_escape_string($mysqli, $sup_comp);
    $phone    = mysqli_real_escape_string($mysqli, $phone);
    $address  = mysqli_real_escape_string($mysqli, $address);

    $result = update_supplier($mysqli, $sup_id, $sup_name, $sup_comp, $phone, $address);

        if($result){
          echo '<script>
                  alert("Supplier Record Updated Successfully");
                  window.location = "home.php";
                </script>';
        }

  }