<?php
include "common/connect.php";
date_default_timezone_set('Asia/Bangkok');

$style = "";
$style_booking = "style='display:none;'";
$style_booked = "style='display:none;'";
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
if ($_SESSION["type"] != 1)
    $style = "style='display:none;'"; //ซ่อนหน้าจอส่วนที่ไม่ได้เป็น admin
$user_id = $_SESSION["user_id"];
$court_busy = array();
$search_dt = "";
$price = "";

$option0 = date("Y-m-d");
$option1 = date("Y-m-d", strtotime("+1 day", strtotime($option0)));
$option2 = date("Y-m-d", strtotime("+2 day", strtotime($option0)));

if(date("H">20)){
    $option0 = date("Y-m-d", strtotime("+1 day", strtotime($option0)));
    $option1 = date("Y-m-d", strtotime("+1 day", strtotime($option0)));
    $option2 = date("Y-m-d", strtotime("+2 day", strtotime($option0)));
}

// echo date("H:i:s");
// return;

$search_date = $option0;
$search_hour = "12";
$search_minuts = "00";

if (isset($_POST["search"])) {
    $search_date = $_POST["search_date"];
    $search_hour = $_POST["search_hour"];
    $search_minuts = $_POST["search_minuts"];
    $search_dt = $search_date . " " . $search_hour . ":" . $search_minuts . ":00";

    $mytime = date('H:i:s', strtotime($search_hour . ":" . $search_minuts));
    $timecheck = date('H:i:s', strtotime("5 PM"));
    if ($mytime < $timecheck) { //check promotions
        $price = 100;
    } else {
        $price = 150;
    }

    //debug
    // echo $search_dt;

    $sql_court = "SELECT
                        *
                    FROM
                        `court`
                    WHERE
                        court_status = 0
                    ORDER BY
                        court_id ASC";
    $result_court = mysqli_query($conn, $sql_court);

    $sql_search = "SELECT
                        *
                    FROM
                        `booking`
                    WHERE
                        booking_start_time <= '$search_dt' 
                        AND booking_end_time > '$search_dt' 
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
} else if (isset($_POST["search_date"]) || isset($_POST["search_hour"]) || isset($_POST["search_minuts"])) {
    $search_date = $_POST["search_date"];
    $search_hour = $_POST["search_hour"];
    $search_minuts = $_POST["search_minuts"];
}

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
    $v_type_name = "";
    if($v_type==1){
        $v_type_name = "เงินโอน";
    }else{
        $v_type_name = "เงินสด";
    }

    $sql_check_insert = "SELECT
                            booking_id
                        FROM
                            `booking`
                        WHERE
                            booking_start_time < '$end' 
                        AND booking_end_time >= '$end'";
    $result_check_insert = mysqli_query($conn, $sql_check_insert);
    if (mysqli_num_rows($result_check_insert) == 0) {
        $sql = "INSERT INTO `booking`(
            `user_id`,
            `court_id`,
            `booking_start_time`,
            `booking_end_time`,
            `payment_type_id`,
            `payment_type_name`,
            `payment_id`,
            `booking_status`,
            `booking_price`,
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
            '$v_type_name',
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
    } else {
        $style_booked = "";
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
            font-size: 16px;
        }

        .text18 {
            font-size: 18px;
            color: red;
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
                    <select onchange="this.form.submit()" class="input" id="search_date" name="search_date">
                        <?php
                        if ($option0 == $search_date) {
                            echo '<option value="' . $option0 . '" selected>' . $option0 . '</option>';
                        } else {
                            echo '<option value="' . $option0 . '">' . $option0 . '</option>';
                        }

                        if ($option1 == $search_date) {
                            echo '<option value="' . $option1 . '" selected>' . $option1 . '</option>';
                        } else {
                            echo '<option value="' . $option1 . '">' . $option1 . '</option>';
                        }

                        if ($option2 == $search_date) {
                            echo '<option value="' . $option2 . '" selected>' . $option2 . '</option>';
                        } else {
                            echo '<option value="' . $option2 . '">' . $option2 . '</option>';
                        }
                        ?>
                    </select>
                    <i class='bx'></i>
                    <div>
                        <label for="search_hour">เวลา </label>

                        <select onchange="this.form.submit()" class="input2" id="search_hour" name="search_hour">
                            <?php

                            $search_date_check = 0;
                            if ($search_date == date("Y-m-d")) {
                                $search_date_check = date("H");
                            }

                            if ($search_date_check <= 12) {
                                if ($search_hour == "12") {
                                    echo '<option value="12" selected>12</option>';
                                } else {
                                    echo '<option value="12" >12</option>';
                                }
                            }

                            if ($search_date_check <= 13) {
                                if ($search_hour == "13") {
                                    echo '<option value="13" selected>13</option>';
                                } else {
                                    echo '<option value="13" >13</option>';
                                }
                            }

                            if ($search_date_check <= 14) {
                                if ($search_hour == "14") {
                                    echo '<option value="14" selected>14</option>';
                                } else {
                                    echo '<option value="14" >14</option>';
                                }
                            }

                            if ($search_date_check <= 15) {
                                if ($search_hour == "15") {
                                    echo '<option value="15" selected>15</option>';
                                } else {
                                    echo '<option value="15" >15</option>';
                                }
                            }

                            if ($search_date_check <= 16) {
                                if ($search_hour == "16") {
                                    echo '<option value="16" selected>16</option>';
                                } else {
                                    echo '<option value="16" >16</option>';
                                }
                            }

                            if ($search_date_check <= 17) {
                                if ($search_hour == "17") {
                                    echo '<option value="17" selected>17</option>';
                                } else {
                                    echo '<option value="17" >17</option>';
                                }
                            }

                            if ($search_date_check <= 18) {
                                if ($search_hour == "18") {
                                    echo '<option value="18" selected>18</option>';
                                } else {
                                    echo '<option value="18" >18</option>';
                                }
                            }

                            if ($search_date_check <= 19) {
                                if ($search_hour == "19") {
                                    echo '<option value="19" selected>19</option>';
                                } else {
                                    echo '<option value="19" >19</option>';
                                }
                            }

                            if ($search_date_check <= 20) {
                                if ($search_hour == "20") {
                                    echo '<option value="20" selected>20</option>';
                                } else {
                                    echo '<option value="20" >20</option>';
                                }
                            }
                            ?>
                        </select>
                        <label for="search_minuts"> : </label>
                        <select onchange="this.form.submit()" class="input2" id="search_minuts" name="search_minuts">
                            <?php
                            if ($search_minuts == "00") {
                                echo '<option value="00" selected>00</option>';
                            } else {
                                echo '<option value="00">00</option>';
                            }

                            if ($search_minuts == "30") {
                                echo '<option value="30" selected>30</option>';
                            } else {
                                echo '<option value="30">30</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <i class='bx'></i>
                    <!-- SELECT * FROM `booking` WHERE booking_start_time >= '2024-01-22 02:25:00' AND booking_end_time <= '2024-01-22 03:05:00'; -->
                </div>

                <!-- <div align=center><label class="text20">วันเวลาที่เลือก <?php echo $search_dt; ?></label></div> -->
                <div align=center><label class="text20">ราคาชั่วโมงละ 150 บาท / 30 นาที 75 บาท</label></div>
                <div align=center><label class="text20">ถ้าจองก่อน 17:00 น. ราคาชั่วโมงละ 100 บาท / 30 นาที 50 บาท</label></div>
                <br>

                <div <?php echo $style_booked; ?>>
                    <div align=center><label class="text18">***มีการจองไปแล้ว โปรดเช็คตารางการจองอีกรอบ***</label></div>
                    <br>
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
                        $sql_type = "SELECT * FROM `payment_type`";
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