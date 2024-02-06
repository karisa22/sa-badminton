<?php
include '../common/connect.php';
session_start();

$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
// $password = $_POST['password'];
// echo hash('sha256', $_POST['password']);


$sql = "SELECT * FROM t_user WHERE user_username='$username' and user_password ='$password' and del = 0 limit 1";

$result = mysqli_query($conn,$sql);

if( ! mysqli_num_rows($result) ) {
    $_SESSION["Error"] = "Username หรือ Password ไม่ถูกต้อง";
    $show = header("location:../login.php");
    return;
}

$row = mysqli_fetch_array($result);
$status= $row['user_type'];

$_SESSION["user_id"]=$row['user_id'];
$_SESSION["name"]=$row['user_name'];
$_SESSION["tel"]=$row['user_tel'];
$_SESSION["type"]=$row['user_type'];
$_SESSION["img"]=$row['image_name'];
// $_SESSION["create_date"]=$row['create_date'];
$date=date_create($row['create_date']);
$_SESSION["create_date"]=date_format($date,"Y/m/d H:i:s");
$show = header("location:../home.php");

echo $show;

?>
