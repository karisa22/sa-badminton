<?php
include 'connec.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM member WHERE username='$username' and password ='$password'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$status= $row['status'];

if($row > 0 ){
    $_SESSION["username"]=$row['username'];
    $_SESSION["password"]=$row['password'];
    $_SESSION["firstname"]=$row['firstname'];
    $_SESSION["lastname"]=$row['lastname'];
    $_SESSION["tel"]=$row['tel'];

    if ($status == 'admin'){
      $show = header("location:homeadmin.php");
    }elseif($status == 'user') {
      $row =header("location:home.php");

    }
    
}else{
    $_SESSION["Error"] = "Username หรือ Password ไม่ถูกต้อง";
    $show = header("location:login.php");
   }

echo $show;

?>
