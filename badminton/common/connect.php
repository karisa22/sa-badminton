<?php
$servername = "localhost";
$username = "root";
$password = "ongsa@112233"; //ถ้าไม่ได้ตั้งรหัสผ่านให้ลบ yourpassword ออก
$dbname = "badminton";

//
$conn = mysqli_connect($servername,$username ,$password,$dbname);


if (!$conn) {
  die ("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

mysqli_query($conn,"SET character_set_results=utf8");
mysqli_query($conn,"SET character_set_client='utf8'");
mysqli_query($conn,"SET character_set_connection='utf8'");
mysqli_query($conn,"collation_connection = utf8_unicode_ci");
mysqli_query($conn,"collation_database = utf8_unicode_ci");
mysqli_query($conn,"collation_server = utf8_unicode_ci");

?>