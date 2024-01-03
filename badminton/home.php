<script src="https://cdn.tailwindcss.com"></script>
<!--ลิงค์ไทวิน-->
<?php
session_start();
include"header.php";
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
  header("location:login.php");
// include"headeradmin.php";
?>

<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Home </title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
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

  body {
    min-height: 100vh;
  }
</style>
<style>
  .block-1 {
    width: 37%;
    height: 600px;
    margin-left: 20px;
    margin-top: 10px;
    margin-right: 20px;
    text-align: center;

  }

  .block-2 {
    width: 58.5%;
    height: 600px;
    margin-right: 10px;
    margin-left: 10px;
  }
</style>

<body>
  <script src="script.js"></script>
  <div style=" margin-left: 20px; margin-right: 20px;">
    <img src="images/10.jpg" style="height: 700px; width: 100%; ">
    <br>

    <div align=center>
      <a style="font-size: 50px;">ยินดีต้อนรับเข้าสู่ระบบสนามแบดมินตัน Home Sport Club</a>
      <div class="input-field">
      </div>
    </div>

    <div class="row">
      <div class="block-1">
        <div style="font-size: 40px; color: #000; margin-top: 170px;">สนามแบดมินตัน</div>
        <div style="font-size: 24px;  color: #000;">สนามแบดมินตันพื้นยางมาตรฐาน</div>
        <div style="font-size: 24px;  color: #000;">จำนวน 6 คอร์ท</div>
        <div><a href="courtimage_admin.php"><button type="more" class="btn btn-success">ดูเพิ่มเติม</button></a>
          <button class="btn btn-success" name="booking">จองสนาม</button>
        </div>
      </div>
      <div class="block-2"><img src="images/12.jpg" style="height: 600px; width: 100%; margin-left: 20px; margin-right: 20px;"></div>
    </div>


    <div class="row">
      <div class="block-2"><img src="images/32.jpg" style="height: 600px; width: 100%; margin-left: 20px; margin-right: 20px;"></div>

      <div class="block-1">
        <div style="font-size: 40px; color: #000; margin-top: 170px;">สิ่งอำนวยความสะดวก</div>
        <div style="font-size: 24px;  color: #000;">ที่จอดรถ ร้านค้า ห้องน้ำ ที่สูบบุหรี่ </div>
        <div style="font-size: 24px;  color: #000;">........</div>
        <div><a href="facilities_admin.php"><button class="btn btn-success">ดูเพิ่มเติม</button></a></div>
      </div>

      <div class="row">
        <div class="block-1">
          <div style="font-size: 40px; color: #000; margin-top: 170px;">ข่าวสาร ประกาศ</div>
          <div style="font-size: 24px;  color: #000;">ข้อมูลข่าวสาร ประกาศเกี่ยวกับสนามแบดมินตัน</div>
          <div style="font-size: 24px;  color: #000;">Home Sport Club</div>
          <div><a href="advertise_admin.php"><button class="btn btn-success">ดูเพิ่มเติม</button></a></div>
        </div>
        <div class="block-2"><img src="images/17.jpg" style="height: 600px; width: 100%; margin-left: 20px; margin-right: 20px;"></div>
      </div>

      <div class="row">
        <div class="block-2"><img src="images/86.jpg" style="height: 600px; width: 100%; margin-left: 20px; margin-right: 20px;"></div>

        <div class="block-1">
          <div style="font-size: 40px; color: #000; margin-top: 170px;">กฏการใช้สนาม</div>
          <div style="font-size: 24px;  color: #000;">กฏกติกาการใช้สนามแบดมินตัน</div>
          <div style="font-size: 24px;  color: #000;">Home Sport Club</div>
          <div><a href="rules_admin.php"><button class="btn btn-success">ดูเพิ่มเติม</button></a></div>
        </div>

        <div class="row">
          <div class="block-1">
            <div style="font-size: 40px; color: #000; margin-top: 170px;">กิจกรรม</div>
            <div style="font-size: 24px;  color: #000;">กิจกรรมดีๆที่สนามแบดจัดทำขึ้น</div>
            <div style="font-size: 24px;  color: #000;">Home Sport Club</div>
            <div><a href="activity_admin.php"><button class="btn btn-success">ดูเพิ่มเติม</button></a></div>
          </div>
          <div class="block-2"><img src="images/56.jpg" style="height: 600px; width: 100%; margin-left: 20px; margin-right: 20px;"></div>
        </div>



      </div>
</body>

<?php include("footer.php"); ?>
<script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>