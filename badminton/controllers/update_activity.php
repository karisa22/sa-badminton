<?php
include "../common/connect.php";
session_start();
$activity_id = $_POST['activity_id'];
$user_id = $_SESSION["user_id"];

// $activity_id = $row['activity_id'];
// $activity_name = $row['activity_name'];

// $activity_desc = $row['activity_desc'];
// $activity_type_id = $row['activity_type_id'];
// $activity_type_name = $row['activity_type_name'];
// $activity_start_time = $row['activity_start_time'];
// $activity_end_time = $row['activity_end_time'];

if (
    isset($_POST['activity_id']) &&
    isset($_POST['activity_name']) &&
    isset($_POST['activity_desc']) &&
    isset($_POST['activity_type_id']) &&
    isset($_POST['activity_start_time']) &&
    isset($_POST['activity_end_time'])
) {
    $activity_id = $_POST['activity_id'];
    $activity_name = $_POST['activity_name'];
    $activity_desc = $_POST['activity_desc'];
    $activity_type_id = $_POST['activity_type_id'];
    $activity_start_time = $_POST['activity_start_time'];
    $activity_end_time = $_POST['activity_end_time'];
    $activity_type_name = "";
    $result = "";

    if ($activity_type_id == 2) {
        $activity_type_name = "advertise";
    } else if ($activity_type_id == 3) {
        $activity_type_name = "activity";
    } else if ($activity_type_id == 4) {
        $activity_type_name = "facilities";
    } else if ($activity_type_id == 5) {
        $activity_type_name = "rules";
    }

    $password = hash('sha256', $_POST['password']);

    $sql = "UPDATE `activity` SET 
    `activity_name`='$activity_name',
    `activity_desc`='$activity_desc',
    `activity_type_id`='$activity_type_id',
    `activity_type_name`='$activity_type_name',
    `activity_start_time`='$activity_start_time',
    `activity_end_time`='$activity_end_time',
    `edit_date`=NOW(),
    `edit_by`=$user_id
     WHERE activity_id = $activity_id";

    $result = mysqli_query($conn, $sql);


    if ($result) {
        header("Location: ../add_activity.php");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
} else {
    echo "Failed: ";
}
