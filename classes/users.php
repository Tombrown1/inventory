<?php
function insert_users($mysqli, $fname, $lname, $email, $password, $phone){
    $query = "INSERT INTO users(fname, lname, email, password, phone) VALUES('$fname', '$lname', '$email', '".md5($password)."', '$phone')";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
    // print_r($query);
    // exit();
}

function get_all_users($mysqli){
    $query = "SELECT * FROM users ";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function get_user_by_id($mysqli, $user_id){
    $query = "SELECT * FROM users WHERE user_id = ".$user_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function update_user($mysqli, $user_id, $fname, $lname, $email, $password, $phone){
    $query = "UPDATE users SET fname = '".$fname."', lname = '".$lname."', email = '".$email."', password = '".md5($password)."', phone = '".$phone."', WHERE user_id =".$user_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function user_login($mysqli, $email, $password){
    $query = "SELECT * FROM users WHERE email = '".$email."' AND password = '".md5($password)."' ";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
    // print_r($query);
    // exit();
}

function check_email($mysqli, $email){
    $query = "SELECT * FROM users WHERE email = '".$email."'"; 
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}