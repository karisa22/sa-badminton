<?php
include 'common/connect.php';
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
  header("location:login.php");
if ($_SESSION["type"] != 1) //admin only
  header("location:home.php");
if (!isset($_GET['id'])) //1 = admin , 2 = member
  header("location:profile_list.php");
$id = $_GET['id'];
$sql = "SELECT * FROM t_user WHERE user_id='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$status = $row['user_type'];

$name = $row['user_name'];
$tel = $row['user_tel'];
$type = $row['user_type'];
$username = $row['user_username'];
$image = $row['image_name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800&display=swap');

    * {
      box-sizing: border-box;
      font-family: 'M PLUS Rounded 1c', sans-serif;
      font-family: 'Noto Sans Thai', sans-serif;
    }

    body {
      /* background-image: url("images/7.jpg"); */
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      background-repeat: no-repeat;
    }

    .box {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-image: linear-gradient(rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.6)), url("img_sys/badminton-bg2.jpg");
      background-size: 100%;
    }

    .container {
      width: 500px;
      display: flex;
      flex-direction: column;
      padding: 0 15px 0 15px;
      border-radius: 25px;
      background-color: #25A4FF;

    }

    span {
      color: #fff;
      display: center;
      justify-content: center;
      padding: 10px 0 10px 0;
    }

    header {
      color: #fff;
      font-size: 50px;
      display: flex;
      justify-content: center;
      padding: 10px 0 10px 0;
    }

    .input-field .input {
      height: 55px;
      width: 100%;
      border: none;
      border-radius: 30px;
      /* color: #fff; */
      font-size: 20px;
      padding: 0 0 0 45px;
      background: rgba(255, 255, 255, 0.1);
      outline: none;
      padding: 0 35px 0;
    }

    .input2 {
      height: 55px;
      width: 30%;
      border: none;
      border-radius: 30px;
      /* color: #fff; */
      font-size: 20px;
      padding: 0 0 0 45px;
      background: rgba(255, 255, 255, 0.1);
      outline: none;
      padding: 0 35px 0;
    }

    .text20 {
      font-size: 20px;
    }

    i {
      position: relative;
      top: -38px;
      left: 17px;
      color: #fff;
    }

    ::-webkit-input-placeholder {
      color: #fff;
    }

    .submit {
      border: none;
      border-radius: 30px;
      font-size: 20px;
      height: 50px;
      outline: none;
      width: 100%;
      color: black;
      background: rgba(255, 255, 255, 0.7);
      cursor: pointer;
      transition: .3s;
    }

    .submit:hover {
      color: rgb(255, 255, 255);
      background-color: rgb(39, 115, 255);
      box-shadow: 2px 5px 7px 2px rgba(18, 33, 255, 0.2);
    }
  </style>
  <?php if ($result) { ?>
    <div class="box">
      <div class="container">
        <div class="top">
          <header>แก้ไขข้อมูลผู้ใช้</header>
        </div>
        <form method="POST" action="add_booking.php">

          <div class="mb-3" style='display:none;'>
            <label class="form-label">id</label>
            <input type="text" class="form-control" name="id" value="<?php echo $id ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">ชื่อ</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control" name="tel" value="<?php echo $tel ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" class="form-control" name="password" value="">
          </div>

          <div class="input-field">
            <div align=center>
              <button type="submit" class="btn btn-success">ตกลง</button>
              <a href="profile_list.php" class="btn btn-danger">ยกเลิก</a>
            </div>
            <div><br></div>
          </div>

        </form>
      </div>
    </div>
  <?php } ?>
</body>

</html>