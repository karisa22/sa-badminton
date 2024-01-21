///////ยังใช้ไม่ได้////////
<?php
	include('connec.php');
	$id=$_GET['id'];
 
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$tel=$_POST['tel'];
	$username=$_POST['username'];
	$password=$_POST['password'];
 
	mysqli_query($conn,"update `member` set firstname='$firstname', lastname='$lastname' , tel='$tel' , username='$username' , password='$password' where id='$id'");
	header('location:profile_list.php');
?>