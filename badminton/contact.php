<?php
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
?>


<?php include "header.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/boostrap/css/bootstrap.min.css">
</head>

<style>
	/* Googlefont Poppins CDN Link */
	@import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800&display=swap');

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'M PLUS Rounded 1c', sans-serif;
		font-family: 'Noto Sans Thai', sans-serif;
	}
</style>
<style type="text/css">
	.block-1 {
		width: 37%;
		height: 853px;
		margin-left: 20px;
		margin-top: 10px;
		margin-right: 20px;
		float: left;
		text-align: center;

	}

	.block-2 {
		width: 58.5%;
		height: 853px;
		margin-top: 10px;
		margin-right: 20px;
		margin: 20px;
		float: left;
	}
</style>

<body>
	<div class="block-1">
		<div style="font-size: 40px; color: #666666; margin-top: 250px;  text-shadow: 3px 2px rgb(90, 222, 245);">ติดต่อเรา</div>

		<div style="font-size: 24px;  color: #666666;">ทีมงานของเรายินดีเป็นอย่างยิ่งสำหรับการให้ข้อมูลและตอบข้อสงสัย</div>
		<div style="font-size: 24px;  color: #666666;">โปรดติดต่อเราเมื่อคุณต้องการความช่วยเหลือ</div>
		<hr>
		<div style="font-size: 20px;  color: #666666;">โทร : 080-5596164</div>
		<div style="font-size: 20px;  color: #666666;">Line ID : 080-5596164</div>
		<div style="font-size: 20px;  color: #666666;">23/4 ม.10 ถนนเลี่ยงเมืองชลบุรี ซอยบ้านสวน-เลี่ยงเมือง3</div>
		<div style="font-size: 20px;  color: #666666;">ต.บ้านสวน อ.เมือง จ.ชลบุรี 20000</div>
	</div>

	<div class="block-2"><img src="images/10.jpg" style="height: 858px; width: 100%;"></div>


	</div>
</body>

</html>