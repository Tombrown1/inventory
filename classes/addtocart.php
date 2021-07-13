<?php
function add_to_cart($mysqli, $user_id, $customer_name, $prod_id,  $measure_id, $selling_price, $sup_id, $req_quantity, $fprice){
    $query = "INSERT INTO add_to_cart(user_id, customer_name,prod_id,measure_id,selling_price,sup_id,req_quantity,final_price) VALUES('$user_id', '$customer_name', '$prod_id', '$measure_id', '$selling_price', '$sup_id', '$req_quantity', '$fprice')";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
    // print_r($query);
    // exit();

    // $master_id = mysqli_master_id();
    // $cart_id = last_insert_id();
} 

function update_add_to_cart($mysqli, $user_id, $cart_id, $customer_name, $prod_id, $measure_id, $selling_price, $sup_id, $req_quantity, $fprice){
    $query = "UPDATE add_to_cart SET user_id = '".$user_id."' customer_name = '".$customer_name."',prod_id = '".$prod_id."', measure_id='".$measure_id."', sellig_price='".$selling_price."', sup_id='".$sup_id."', req_quantity='".$req_quantity."', final_price='".$fprice."' WHERE cart_id =".$cart_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
    // print_r($query);
    // exit();
}

function get_all_add_to_cart($mysqli){
    $query = "SELECT * FROM add_to_cart WHERE cart_status = 0";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function fetch_all_from_cart($mysqli, $cart_id){
    $query = "SELECT * FROM add_to_cart WHERE cart_id =".$cart_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function fetch_paid_cart_to_transaction($mysqli){
    $query = "SELECT * FROM add_to_cart WHERE cart_status = 1";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function fetch_paid_transaction_report($mysqli,$user_id){
    $query = "SELECT * FROM add_to_cart WHERE cart_status = 1 AND user_id =".$user_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function update_add_to_cart_status($mysqli, $user_id){
    $query = "UPDATE add_to_cart SET cart_status = 1 WHERE user_id =".$user_id;
     $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
     $cart_id = mysqli_insert_id($mysqli);
    return $result;
}

function delete_update_add_to_cart_status($mysqli, $user_id){
    $query = "UPDATE add_to_cart SET cart_status = 2 WHERE user_id =".$user_id;
     $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}


function get_add_to_cart_by_id($mysqli, $cart_id){
    $query = "SELECT * FROM add_to_cart WHERE cart_id =".$cart_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}
    function get_cart_quantity($mysqli, $cart_id){
        $query = "SELECT * FROM add_to_cart WHERE cart_id =". $cart_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }


function delete_add_to_cart_by_id($mysqli, $cart_id){
    $query = "DELETE FROM add_to_cart WHERE cart_id =". $cart_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return true;

    // print_r($query);
    // exit;
}

function sum_cart_item($mysqli){
    $query = "SELECT sum(req_quantity * selling_price) AS cart_sales FROM add_to_cart WHERE cart_status = 0";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function cart_status($mysqli, $cart_id){
    $query = "UPDATE add_to_cart SET status = 0 WHERE cart_id =".$cart_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return true;
}

// function delete_add_to_cart_by_id($mysqli, $cart_id){
//     $query = "DELETE FROM add_to_cart WHERE cart_id =". $cart_id;
//     $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
//     return true;

//     // print_r($query);
//     // exit;
// }