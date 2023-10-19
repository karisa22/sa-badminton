<?php
include 'connec.php';
//รับค่าตัวแปลมาจากไฟล์ register
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$tel = $_POST['telephone'];
$username = $_POST['username'];
$password = $_POST['password'];


//คำสั่งเพิ่มข้อมูลลงตาราง user
$sql = "INSERT INTO member(firstname, lastname, tel, username, password , status ) 
Values('$irstname', '$lastname', '$tel' , '$username' , '$password' , 'user')";
$result = mysqli_query($conn , $sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location='login.php'; </script>";
} else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่ได้'); </script>";
}
mysqli_close($conn);

?>