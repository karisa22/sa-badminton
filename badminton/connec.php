<?php
$servername = "localhost";
$username = "root";
$password = ""; //ถ้าไม่ได้ตั้งรหัสผ่านให้ลบ yourpassword ออก
$dbname = "badminton";

//
$conn = mysqli_connect($servername,$username ,$password,$dbname);

if (!$conn) {
  die ("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

?>