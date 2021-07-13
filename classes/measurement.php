<?php
function get_all_measurement($mysqli){
    $query = "SELECT * FROM measurement";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}

function get_measurement_by_id($mysqli, $measure_id){
    $query = "SELECT * FROM measurement WHERE measure_id =".$measure_id;
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    return $result;
}