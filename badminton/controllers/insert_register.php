<?php
include '../common/connect.php';
//รับค่าตัวแปลมาจากไฟล์ register
$name = $_POST['name'];
// $lastname = $_POST['lastname'];
$tel = $_POST['telephone'];
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
// $password = $_POST['password'];
// $hardcode = hash('sha256', '123456');


//check user
$sqlSel = "SELECT * FROM t_user WHERE user_username='$username' limit 1";
$resultSel = mysqli_query($conn,$sqlSel);
if(mysqli_num_rows($resultSel) ) {
    // $_SESSION["Error"] = "Username มีการใช้งานแล้ว";
    // $show = header("location:../login.php");
    echo "<script> alert('Username มีการใช้งานแล้ว'); </script>";
    echo "<script> window.location='../register.php'; </script>";
    return;
}

//คำสั่งเพิ่มข้อมูลลงตาราง user
$sql = "INSERT INTO t_user(user_name, user_tel, user_username, user_password, user_type , image_name , create_date , edit_date , create_by , edit_by , del ) 
Values('$name', '$tel', '$username' , '$password' , 2 , NULL , now() , now() , 0 , 0 , 0)";
$result = mysqli_query($conn , $sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location='../login.php'; </script>";
} else{
    // echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่ได้'); </script>";
    echo "<script> window.location='../register.php'; </script>";
}
mysqli_close($conn);

?>