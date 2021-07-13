<?php
function add_product($mysqli, $prod_name, $quantity, $measure_id, $original_price, $profit,$selling_price,$sup_id){
    $query = "INSERT INTO product(prod_name,quantity,measure_id,original_price,profit, selling_price,sup_id) VALUES('$prod_name', '$quantity', '$measure_id','$original_price', '$profit', $selling_price, '$sup_id')";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;

    // print_r($query);
    // exit;
     	 	 	 	 	 	
}

function update_product($mysqli, $prod_id, $prod_name, $quantity, $measure_id, $original_price, $profit,$selling_price,$sup_id){
    $query = "UPDATE product SET prod_name = '".$prod_name."', quantity = '".$quantity."', measure_id ='".$measure_id."', original_price='".$original_price."', profit ='".$profit."', selling_price='".$selling_price."', sup_id='".$sup_id."' WHERE prod_id =".$prod_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;

    // print_r($query);
    // exit;
}

function update_quantity($mysqli, $prod_id, $new_quantity){
    $query = "UPDATE product SET quantity = '".$new_quantity."' WHERE prod_id=".$prod_id;
    $result = mysqli_query($mysqli, $query);
    return $result;
}

function update_delete_quantity($mysqli, $prod_id, $update_value){
    $query = "UPDATE product SET quantity = quantity + '".$update_value."' WHERE prod_id=".$prod_id;
    $result = mysqli_query($mysqli, $query);
    return $result;
    // print_r($query);
    // exit();
}

function get_all_product($mysqli){
    $query = "SELECT * FROM product";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function get_product_by_id($mysqli, $prod_id){
    $query = "SELECT * FROM product WHERE prod_id =".$prod_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function check_prod_phone($mysqli, $phone){
    $query = "SELECT * FROM product WHERE phone = '".$phone."'";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}
function count_total_product($mysqli){
    $query = "SELECT count(*) AS total_product FROM product";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function total_product_value($mysqli){
    $query = "SELECT sum(quantity*selling_price) AS total_product_value FROM product";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}