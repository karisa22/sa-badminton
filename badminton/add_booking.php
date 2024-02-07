<?php
include "common/connect.php";

$style = "";
$style_booking = "style='display:none;'";
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
if ($_SESSION["type"] != 1)
    $style = "style='display:none;'"; //ซ่อนหน้าจอส่วนที่ไม่ได้เป็น admin
$user_id = $_SESSION["user_id"];
$court_busy = array();
$search_dt = "";

if (isset($_POST["search"])) {
    $search_date = $_POST["search_date"];
    $search_hour = $_POST["search_hour"];
    $search_minuts = $_POST["search_minuts"];
    $search_dt = $search_date . " " . $search_hour . ":" . $search_minuts . ":00";

    //debug
    // echo $search_dt;

    $sql_court = "SELECT
                        *
                    FROM
                        `m_court`
                    WHERE
                        court_status = 0
                    ORDER BY
                        court_id ASC";
    $result_court = mysqli_query($conn, $sql_court);

    $sql_search = "SELECT
                        *
                    FROM
                        `t_booking`
                    WHERE
                        booking_start_time <= '$search_dt' 
                        AND booking_end_time >= '$search_dt' 
                        AND NOT booking_status = '3'
                    ORDER BY
                        court_id ASC;";
    $result_search = mysqli_query($conn, $sql_search);
    while ($row_search = mysqli_fetch_assoc($result_search)) {
        array_push($court_busy, $row_search["court_id"]);
    }
    if (mysqli_num_rows($result_search) != mysqli_num_rows($result_court)) {
        $style_booking = "";
    }
}

date_default_timezone_set('Asia/Bangkok');
$option0 = date("Y-m-d");
$option1 = date("Y-m-d", strtotime("+1 day", strtotime($option0)));
$option2 = date("Y-m-d", strtotime("+2 day", strtotime($option0)));

if (isset($_POST["booking"])) {
    $court = $_POST['court'];
    $date = $_POST['date'];
    // $date = $search_dt;
    $hour = $_POST['hour'];
    $type = $_POST['type'];
    $v_type = "";
    $amount = 0;

    $user = $user_id;
    // if (!isset($_POST['user'])) {
    //     $user = $_POST['user'];
    // }

    $startdate = date("Y-m-d", strtotime($date));
    $starttime = date("H:i", strtotime($date));

    $start = $startdate . "T" . $starttime;

    $time = date('H:i:s', strtotime("5 PM"));
    if ($starttime < $time) { //check promotions
        if (0 == $hour) {
            $amount = 50;
            $endtime = date('H:i', strtotime($date . ' + 30 minutes'));
        } else if (1 == $hour) {
            $amount = 100;
            $endtime = date('H:i', strtotime($date . ' +1 hours'));
        } else if (2 == $hour) {
            $amount = 150;
            $endtime = date('H:i', strtotime($date . ' + 90 minutes'));
        } else if (3 == $hour) {
            $amount = 200;
            $endtime = date('H:i', strtotime($date . ' +2 hours'));
        }
    } else {
        if (0 == $hour) {
            $amount = 75;
            $endtime = date('H:i', strtotime($date . ' + 30 minutes'));
        } else if (1 == $hour) {
            $amount = 150;
            $endtime = date('H:i', strtotime($date . ' +1 hours'));
        } else if (2 == $hour) {
            $amount = 225;
            $endtime = date('H:i', strtotime($date . ' + 90 minutes'));
        } else if (3 == $hour) {
            $amount = 300;
            $endtime = date('H:i', strtotime($date . ' +2 hours'));
        }
    }

    // $enddate = date($date);
    $end = $startdate . "T" . $endtime;

    $v_type = $type;

    $sql = "INSERT INTO `t_booking`(
        `user_id`,
        `court_id`,
        `booking_start_time`,
        `booking_end_time`,
        `payment_type_id`,
        `payment_id`,
        `booking_status`,
        `booking_amount`,
        `promotion_id`,
        `create_date`,
        `edit_date`,
        `create_by`,
        `edit_by`,
        `del`
    )
    VALUES(
        $user,
        $court,
        '$start',
        '$end',
        $v_type,
        NULL,
        '1',
        $amount,
        NULL,
        NOW(),
        NULL,
        $user_id,
        $user_id,
        '0'
    );";
    // echo $sql;
    // return;
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: booking_list.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
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

    <title>Add Booking</title>
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
    <div class="box">
        <div class="container">
            <div class="top">
                <header>จองสนาม</header>
            </div>
            <form method="POST" action="add_booking.php">

                <div class="input-field">
                    <!-- <input type="text" class="input" name="name" placeholder="ชื่อ" maxlength="100" required>
                    <i class='bx bx-user'></i> -->
                    <label for="search_date">วันที่ต้องการจอง:</label>
                    <select class="input" id="search_date" name="search_date">
                        <?php
                        echo '<option value="' . $option0 . '">' . $option0 . '</option>';
                        echo '<option value="' . $option1 . '">' . $option1 . '</option>';
                        echo '<option value="' . $option2 . '">' . $option2 . '</option>';
                        ?>
                    </select>
                    <i class='bx'></i>
                    <div>
                        <label for="search_hour">เวลา </label>

                        <select class="input2" id="search_hour" name="search_hour">
                            <option value="12">12</option>;
                            <option value="13">13</option>;
                            <option value="14">14</option>;
                            <option value="15">15</option>;
                            <option value="16">16</option>;
                            <option value="17">17</option>;
                            <option value="18">18</option>;
                            <option value="19">19</option>;
                            <option value="20">20</option>;
                            <!-- <option value="21">21</option>;
                            <option value="22">22</option>; -->
                        </select>
                        <label for="search_minuts"> : </label>
                        <select class="input2" id="search_minuts" name="search_minuts">
                            <option value="00">00</option>;
                            <!-- <option value="15">15</option>; -->
                            <option value="30">30</option>;
                            <!-- <option value="45">45</option>; -->
                        </select>
                    </div>
                    <i class='bx'></i>
                    <!-- SELECT * FROM `t_booking` WHERE booking_start_time >= '2024-01-22 02:25:00' AND booking_end_time <= '2024-01-22 03:05:00'; -->
                </div>

                <div class="input-field">
                    <div align=center>
                        <button type="submit" class="btn btn-success" name="search">ค้นหาสนาม</button>

                        <a href="booking_list.php" class="btn btn-danger">ยกเลิก</a>
                    </div>
                    <div><br></div>
                </div>

            </form>
            <form method="POST" action="add_booking.php" <?php echo $style_booking; ?>>

                <div class="input-field">
                    <!-- <input type="text" class="input" name="name" placeholder="ชื่อ" maxlength="100" required>
                    <i class='bx bx-user'></i> -->
                    <input style='display:none;' value="<?php echo $search_dt; ?>" type="text" class="input" name="date">
                    <div align=center><label class="text20">วันเวลาที่เลือก <?php echo $search_dt; ?></label></div>
                    <br>
                    <label for="court">สนามที่ว่าง:</label>
                    <select class="input" id="court" name="court">
                        <?php

                        while ($row_court = mysqli_fetch_assoc($result_court)) {
                            if (in_array($row_court["court_id"], $court_busy)) {
                                continue;
                            } else {
                                echo '<option value="' . $row_court["court_id"] . '">' . $row_court["court_name"] . '</option>';
                            }
                        }

                        ?>
                    </select>
                    <i class='bx'></i>
                </div>

                <div class="input-field">
                    <label for="hour">จำนวนชั่วโมงที่ต้องการจอง:</label>
                    <select class="input" id="search_date" name="hour">
                        <option value="0">30 นาที</option>
                        <option value="1">1 ชั่วโมง</option>
                        <option value="2">1 ชั่วโมง 30 นาที</option>
                        <option value="3">2 ชั่วโมง</option>
                    </select>
                    <i class='bx'></i>
                </div>

                <div class="input-field">
                    <label for="type">วิธีการจ่ายเงิน:</label>
                    <select class="input" id="type" name="type">
                        <?php
                        $sql_type = "SELECT * FROM `m_payment_type`";
                        $result_type = mysqli_query($conn, $sql_type);
                        while ($row_type = mysqli_fetch_assoc($result_type)) {
                            echo '<option value="' . $row_type["payment_type_id"] . '">' . $row_type["payment_type_name"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="input-field">
                    <div><br></div>
                    <div align=center>
                        <button type="submit" class="btn btn-success" name="booking">จองสนาม</button>
                        <br>
                        <div>*การจองจะถูกยกเลิกทุกๆ 30 นาที ถ้าไม่ได้จ่ายเงิน</div>
                        <!-- <a href="booking_list.php" class="btn btn-danger">ยกเลิก</a> -->
                    </div>
                    <div><br></div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>