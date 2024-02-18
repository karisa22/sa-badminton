<?php
include "common/connect.php";

session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
$user_id = $_SESSION["user_id"];

if ($_SESSION["type"] != 1) //1 = admin , 2 = member
    header("location:home.php");

if (isset($_POST['submit'])) {

    $activity_name = $_POST['activity_name'];
    $activity_desc = $_POST['activity_desc'];
    $activity_type_id = $_POST['activity_type_id'];
    $activity_type_name = "";
    $activity_start_time = $_POST['activity_start_time'];
    $activity_end_time = $_POST['activity_end_time'];

    if ($activity_type_id == 2) {
        $activity_type_name = "advertise";
    } else if ($activity_type_id == 3) {
        $activity_type_name = "activity";
    } else if ($activity_type_id == 4) {
        $activity_type_name = "facilities";
    } else if ($activity_type_id == 5) {
        $activity_type_name = "rules";
    }

    $sql = "INSERT INTO `activity`(
        `activity_name`,
        `activity_desc`,
        `activity_type_id`,
        `activity_type_name`,
        `activity_start_time`,
        `activity_end_time`,
        `create_date`,
        `edit_date`,
        `create_by`,
        `edit_by`,
        `del`
    )
    VALUES(
        '$activity_name',
        '$activity_desc',
        $activity_type_id,
        '$activity_type_name',
        '$activity_start_time',
        '$activity_end_time',
        NOW(),
        NOW(),
        $user_id,
        $user_id,
        0
    );";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
        header("location: add_activity.php");
        // echo "successfully: ";
    } else {
        // $_SESSION['statusMsg'] = "File upload failed, please try again.";
        // header("location: web_manage.php");
        echo "Failed: " . mysqli_error($conn);
        echo "failed: 1";
        return;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/boostrap/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/boostrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/mytable.css">
    <title>Add Activity</title>
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
            background-image: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)), url("img_sys/badminton-bg.jpg");
            background-size: 100%;
        }

        .container {
            width: 1000px;
            display: flex;
            flex-direction: column;
            padding: 0 20px 30px 20px;
            align-items: center;
            justify-content: center;
            border-radius: 25px;
            /* background-color: skyblue; */
            /* background-color: #337ab7; */
            /* background-color: #6495ED; */
            /* background-color: #1E90FF; */
            /* background-color: #87CEFA; */
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
            color: black;
            font-size: 20px;
            padding: 0 45px 0 45px;
            background: rgba(255, 255, 255, 0.1);
            outline: none;
            padding: 0 35px 0;
        }

        .mydiv {
            width: 100%;
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

        .bg_clear {
            background: rgba(255, 255, 255, 0.7);
        }
    </style>
    <div class="box">
        <div class="container">
            <div class="top">
                <header>เพิ่มกิจกรรม</header>
            </div>
            <!-- <form method="POST" action="add_image.php"> -->
            <form action="add_activity.php" method="POST" enctype="multipart/form-data">

                <div class="mydiv">
                    <div class="input-field">
                        <label>ชื่อกิจกรรม</label>
                        <input type="text" class="input" name="activity_name" placeholder="ชื่อกิจกรรม" maxlength="100" required>
                        <i class='bx'></i>
                    </div>

                    <div class="input-field">
                        <label>รายละเอียดกิจกรรม</label>
                        <input type="text" class="input" name="activity_desc" placeholder="รายละเอียดกิจกรรม" maxlength="100" required>
                        <i class='bx'></i>
                    </div>
                </div>

                <!-- <label for="birthday">Birthday:</label>
<input type="date" id="birthday" name="birthday"> -->

                <div class="input-field">
                    <label for="activity">เลือกหน้าแสดงผล</label>
                    <select class="input" id="activity" name="activity_type_id">
                        <option value="2">ข่าวสาร, advertise</option>
                        <option value="3">กิจกรรม, activity</option>
                        <option value="5">กฎการใช้สนาม, rules</option>
                        <option value="4">สิ่งอำนวยความสะดวก, facilities</option>
                    </select>
                    <i class='bx'></i>
                </div>

                <div class="input-field">
                    <label>วันที่เริ่ม</label>
                    <input class="input" type="datetime-local" id="activity_start_time" name="activity_start_time">
                    <i class='bx'></i>
                </div>

                <div class="input-field">
                    <label>วันที่สิ้นสุด</label>
                    <input class="input" type="datetime-local" id="activity_end_time" name="activity_end_time">
                </div>

                <br>
                <div class="input-field">
                    <div align=center>
                        <button type="submit" class="btn btn-success" value="Upload" name="submit">เพิ่มกิจกรรม</button>

                        <a href="web_manage.php" class="btn btn-danger">ย้อนกลับ</a>
                    </div>
                    <div><br></div>
                </div>

            </form>
            <div class="bg_clear">
                <table id="customers">
                    <thead>
                        <tr>
                            <th width="10%">ชื่อกิจกรรม</th>
                            <th width="20%">รายละเอียดกิจกรรม</th>
                            <th width="10%">หน้าจอที่แสดง</th>
                            <th width="15%">วันที่เริ่ม</th>
                            <th width="15%">วันที่สิ้นสุด</th>
                            <th width="15%">วันที่สร้าง</th>
                            <th width="5%">สถานะ</th>
                            <th width="5%">แก้ไข</th>
                            <th width="5%">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        // $sql = "SELECT * FROM `image`";
                        $sql = "SELECT
                                    *
                                FROM
                                    `activity`
                                WHERE del = 0;";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>" . $row["activity_name"] .  "</td> ";
                            echo "<td>" . $row["activity_desc"] .  "</td> ";
                            echo "<td>" . $row["activity_type_name"] .  "</td> ";
                            echo "<td>" . $row["activity_start_time"] .  "</td> ";
                            echo "<td>" . $row["activity_end_time"] .  "</td> ";
                            echo "<td>" . $row["create_date"] .  "</td> ";
                            if ($row["del"] == 0) {
                                echo "<td>" . "ใช้งาน" .  "</td> ";
                            } else {
                                echo "<td>" . "ไม่ใช้งาน" .  "</td> ";
                            }
                            // echo "<td></td>";
                            echo "<td><a href='edit_activity.php?id=$row[activity_id]' onclick=\"return confirm('ต้องการแก้ไขกิจกรรมใช่หรือไม่!!!')\">แก้ไข</a></td> ";
                            echo "<td><a href='controllers/delete_activity.php?id=$row[activity_id]' onclick=\"return confirm('ต้องการลบกิจกรรมใช่หรือไม่!!!')\">ลบ</a></td> ";
                            echo "</tr>";
                        }
                        echo "</table>";
                        //5. close connection
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>