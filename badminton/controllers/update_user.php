<?php
include "../common/connect.php";

$id = $_POST['id'];

if (
  isset($_POST['name']) &&
  isset($_POST['tel']) &&
  isset($_POST['username']) &&
  isset($_POST['password'])
) {
  $name = $_POST['name'];
  $tel = $_POST['tel'];
  $username = $_POST['username'];
  $password = hash('sha256', $_POST['password']);

  $sql = "UPDATE `t_user` SET `user_name`='$name',`user_tel`='$tel',`user_username`='$username' ,`user_password`='$password' WHERE user_id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    // header("Location: ../showprofile.php?msg=Data updated successfully");
    header("Location: ../showprofile.php");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
} else {
  echo "Failed: ";
}
