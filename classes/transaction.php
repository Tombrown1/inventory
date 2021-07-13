<?php
   
    function transaction($mysqli, $user_id, $customer_name, $prod_id, $quantity, $measure_id, $price, $sup_id){
        $query = "INSERT INTO transaction(user_id, customer_name,prod_id,measure_id,quantity, price,sup_id) VALUES('$user_id', '$customer_name', '$prod_id', '$measure_id', '$quantity', '$price', '$sup_id')";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
        // print_r($query);
        // exit();
    }
    
    function update_transaction($mysqli, $cart_id, $customer_name, $prod_id, $measure_id, $selling_price, $sup_id, $req_quantity, $fprice){
        $query = "UPDATE transaction SET customer_name = '".$customer_name."',prod_id = '".$prod_id."', measure_id='".$measure_id."', sellig_price='".$selling_price."', sup_id='".$sup_id."', req_quantity='".$req_quantity."', final_price='".$fprice."' WHERE cart_id =".$cart_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
        // print_r($query);
        // exit();
    }
    
    function get_all_transaction($mysqli){
        $query = "SELECT * FROM transaction WHERE status = 0";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
    // customer_name, prod_id, quantity, measure_id, price
    function get_pdf_transaction($mysqli){
        $query = "SELECT * FROM transaction";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
    // AND `COLUNM_NAME` in ('customer_name', 'prod_id', 'quantity', 'measure_id', 'price')
    function pdf_header($mysqli){
        $query = "SELECT UCASE(`COLUMN_NAME`)
        FROM `INFORMATION_SCHEMA`. `COLUMNS`
        WHERE `TABLE_SCHEMA`='inventory'
        AND `TABLE_NAME`='transaction'";
       
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function get_transaction_report($mysqli){
        $query = "SELECT * FROM transaction WHERE status = 1";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
    
    function get_transaction_by_id($mysqli, $cart_id){
        $query = "SELECT * FROM transaction WHERE cart_id =".$cart_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
    // transaction logical delete function using update query.
    function delete_transaction_logically($mysqli, $user_id){
        $query = "UPDATE transaction SET status = 1 WHERE user_id =".$user_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
          
    
    function delete_transaction_by_id($mysqli, $cart_id){
        $query = "DELETE FROM transaction WHERE cart_id =". $cart_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return true;
    
        // print_r($query);
        // exit;
    }
?>