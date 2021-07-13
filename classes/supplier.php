<?php
function add_supplier($mysqli, $sup_name, $sup_comp, $phone, $address){
    $query = "INSERT INTO supplier(sup_name,sup_comp,phone,address) VALUES('$sup_name', '$sup_comp', '$phone','$address')";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
    // print_r($query);
    // exit();
}

function update_supplier($mysqli, $sup_id, $sup_name, $sup_comp, $phone, $address){
    $query = "UPDATE supplier SET sup_name = '".$sup_name."',sup_comp = '".$sup_comp."', phone ='".$phone."', address='".$address."' WHERE sup_id =".$sup_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
    // print_r($query);
    // exit();
}

function get_all_supplier($mysqli){
    $query = "SELECT * FROM supplier";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function get_supplier_by_id($mysqli, $sup_id){
    $query = "SELECT * FROM supplier WHERE sup_id =".$sup_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function check_sup_phone($mysqli, $phone){
    $query = "SELECT * FROM supplier WHERE phone = '".$phone."'";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

// function delete_supplier_by_id($mysqli, $sup_id){
//     $query = "DELETE FROM supplier WHERE sup_id = ".$sup_id;
//     $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
//     return true;
function delete_supplier_by_id($mysqli, $sup_id){
    $query = "DELETE FROM supplier WHERE sup_id =". $sup_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return true;

    // print_r($query);
    // exit;
}