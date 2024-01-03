<?php
include '../common/connect.php';
session_start();

$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
// $password = $_POST['password'];
// echo hash('sha256', $_POST['password']);


$sql = "SELECT * FROM t_user WHERE user_username='$username' and user_password ='$password' limit 1";

$result = mysqli_query($conn,$sql);

if( ! mysqli_num_rows($result) ) {
    $_SESSION["Error"] = "Username หรือ Password ไม่ถูกต้อง";
    $show = header("location:../login.php");
    return;
}

$row = mysqli_fetch_array($result);
$status= $row['user_type'];

$_SESSION["name"]=$row['user_name'];
$_SESSION["tel"]=$row['user_tel'];
$_SESSION["type"]=$row['user_type'];
$show = header("location:../home.php");

echo $show;

?>
