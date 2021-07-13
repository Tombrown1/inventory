<?php
include_once '../database/connect.php';
$mysqli = dbconnect();

include_once '../classes/supplier.php';

if(isset($_POST['delete_sup'])){
    $sup_id = $_POST['delete_id'];

   //$sup_id = mysqli_real_escape_string($mysqli, $sup_id);

    delete_supplier_by_id($mysqli, $sup_id);

      
            echo '<script>
                    alert("Data Deleted Successfully");
                    window.location ="../view/supplier.php";
                </script>';
       
}