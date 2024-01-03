<?php
include '../common/connect.php';
//รับค่าตัวแปลมาจากไฟล์ register
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$tel = $_POST['telephone'];
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
// $password = $_POST['password'];
$hardcode = hash('sha256', '123456');

//คำสั่งเพิ่มข้อมูลลงตาราง user
$sql = "INSERT INTO t_user(user_name, user_tel, user_username, user_password, user_type , user_image , create_date , edit_date , create_by , edit_by , del ) 
Values('test', '0808188216', 'admin' , '$hardcode' , 2 , 0 , now() , now() , 0 , 0 , 0)";
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