///////ยังใช้ไม่ได้////////
<?php
	include('connec.php');
	$id=$_GET['id'];
 
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
 
	mysqli_query($conn,"update `member` set firstname='$firstname', lastname='$lastname' where id='$id'");
	header('location:profile_list.php');
?>