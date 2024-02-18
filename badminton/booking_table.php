<?php
include 'common/connect.php';
$style = "";
$style_booking = "style='display:none;'";
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");//ส่งกลับไปหน้า login
if ($_SESSION["type"] != 1)
    $style = "style='display:none;'"; //ซ่อนหน้าจอส่วนที่ไม่ได้เป็น admin
include "header.php";
$user_id = $_SESSION["user_id"];
date_default_timezone_set('Asia/Bangkok');

$sql_court = "SELECT
                    *
                FROM
                    `court`
                WHERE
                    court_status = 0
                ORDER BY
                    court_id ASC";
// $sql_court = "SELECT
//                     *
//                 FROM
//                     `court`
//                 ORDER BY
//                     court_id ASC";
$result_court = mysqli_query($conn, $sql_court);
$result_query = mysqli_query($conn, $sql_court);

//== time setup
$time = date('H:i', strtotime("12 PM"));
$endtime = date('H:i', strtotime("+ 30 minutes", strtotime($time)));
$times = date('H:i:s', strtotime("12 PM"));
$endtimes = date('H:i:s', strtotime("+ 30 minutes", strtotime($times)));
$date_time_sarr = array();
$date_time_earr = array();

$date1 = date("Y-m-d"); // วันเวลาปัจจุบัน
if(date("H")>20){
    $date1 = date('Y-m-d', strtotime("+ 1 day", strtotime($date1)));
}
$date2 = date('Y-m-d', strtotime("+ 1 day", strtotime($date1)));
$date3 = date('Y-m-d', strtotime("+ 2 day", strtotime($date1)));
$date4 = date('Y-m-d', strtotime("+ 3 day", strtotime($date1)));
//== time setup

$result = "";
$court_name = "";

if (isset($_POST["search"])) { // select dropdown (เลือก court)
    $style_booking = "";
    $search = $_POST["search"];
    $court_r = explode(",",$search);
    $court_r = array_values($court_r);
    $court_id = $court_r[0];
    $court_name = $court_r[1];
    $sql = "SELECT
                tb.booking_id,
                tb.user_id,
                tu.user_name,
                tb.court_id,
                tb.booking_start_time,
                tb.booking_end_time,
                tb.booking_status,
                tb.booking_price,
                mpt.payment_type_id,
                mpt.payment_type_name,
                tb.create_date
            FROM
                `booking` tb
            LEFT JOIN `payment_type` mpt ON
                mpt.payment_type_id = tb.payment_type_id
            LEFT JOIN `user` tu ON
                tu.user_id = tb.user_id
            WHERE tb.booking_status LIKE '%' 
                AND ( tb.booking_start_time BETWEEN '$date1' AND '$date4' )
                AND tb.court_id = '$court_id'
                AND NOT booking_status = 3
            ORDER BY tb.create_date ASC;";
    $result = mysqli_query($conn, $sql);
} else { //เข้าหน้าจอครั้งแรก
    $row_obj = $result_query->fetch_assoc();
    $default_court_id =  array_values($row_obj)[0];
    $default_court_name =  array_values($row_obj)[1];
    $court_name = $default_court_name;
    $sql = "SELECT
        tb.booking_id,
        tb.user_id,
        tu.user_name,
        tb.court_id,
        tb.booking_start_time,
        tb.booking_end_time,
        tb.booking_status,
        tb.booking_price,
        mpt.payment_type_id,
        mpt.payment_type_name,
        tb.create_date
    FROM
        `booking` tb
    LEFT JOIN `payment_type` mpt ON
        mpt.payment_type_id = tb.payment_type_id
    LEFT JOIN `user` tu ON
        tu.user_id = tb.user_id
    WHERE tb.booking_status LIKE '%' 
        AND ( tb.booking_start_time BETWEEN '$date1' AND '$date4' ) 
        AND tb.court_id = '$default_court_id'
        AND NOT booking_status = 3
    ORDER BY tb.create_date ASC;";
    $result = mysqli_query($conn, $sql);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mytable.css">
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

    img {
        width: 200px;
        height: 150px;
        margin: 5px;
    }

    /* table {
        margin: 5px;
        width: 100%;
        border-collapse: collapse;
    }

    table,
    td {
        border: 1px solid #5D6D7E;
        text-align: center;
    } */

    thead {
        background-color: #64C5D7;
        color: #000;
    }

    .h1 a {
        padding-top: 10px;
    }
</style>

<body>

    <div class="container">
        <br>
        <h1>ตารางการจอง</h1>

        <form method="POST" action="booking_table.php">
            <div class="input-field">
                <label for="search_date">เลือกสนาม:</label>
                <select onchange="this.form.submit()" class="input" id="search" name="search">
                    <?php
                    echo '<option value="">-</option>';
                    while ($row = mysqli_fetch_assoc($result_court)) {
                        echo '<option value="' . $row['court_id'].",".$row['court_name'] . '">' . $row['court_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </form>

        <div>
        <BR>
            <label>กำลังแสดง <?php echo $court_name; ?></label>
        </div>

        <table id="customers">
            <BR>
            <thead>
                <tr>
                    <th width="10%">Date</th>
                    <?php

                    $date = date("Y-m-d");
                    if(date("H")>20){
                        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                    }

                    $i = 0;
                    while ($i < 3) {
                        echo "<th>" . $date . "</th> ";
                        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                        $i++;
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($date_time_sarr, strval($row["booking_start_time"]));
                    array_push($date_time_earr, strval($row["booking_end_time"]));
                }

                // debug
                // for ($x = 0; $x < sizeof($date_time_sarr); $x++) {
                //     echo "$date_time_sarr[$x] $date_time_earr[$x] <br>";
                // }

                // debug
                // foreach($date_time_sarr as $myresult) {
                //     echo $myresult, '<br>';
                // }

                $i = 0;
                $bool_day1 = false;
                $bool_day2 = false;
                $bool_day3 = false;
                while ($i < 20) {
                    echo "<td>" . $time . "-" . $endtime . "</td> ";

                    $check_sday1 = $date1 . " " . $times;
                    $check_eday1 = $date1 . " " . $endtimes;

                    $check_sday2 = $date2 . " " . $times;
                    $check_eday2 = $date2 . " " . $endtimes;

                    $check_sday3 = $date3 . " " . $times;
                    $check_eday3 = $date3 . " " . $endtimes;

                    if (in_array($check_sday1, $date_time_sarr)) {
                        $bool_day1 = true;
                    }
                    if ($bool_day1) {//ใส่สีแดง
                        echo "<td style='background-color: #FFB6C1;'>ติดจอง</td> ";
                    } else {//ใส่สีเขียว
                        echo "<td style='background-color: #90EE90;'>ว่าง</td> ";
                    }
                    if (in_array($check_eday1, $date_time_earr)) {
                        $bool_day1 = false;
                    }

                    if (in_array($check_sday2, $date_time_sarr)) {
                        $bool_day2 = true;
                    }
                    if ($bool_day2) {//ใส่สีแดง
                        echo "<td style='background-color: #FFB6C1;'>ติดจอง</td> ";
                    } else {//ใส่สีเขียว
                        echo "<td style='background-color: #90EE90;'>ว่าง</td> ";
                    }
                    if (in_array($check_eday2, $date_time_earr)) {
                        $bool_day2 = false;
                    }

                    if (in_array($check_sday3, $date_time_sarr)) {//เช็คเวลาเริ่ม
                        $bool_day3 = true;
                    }
                    if ($bool_day3) {//ใส่สีแดง
                        echo "<td style='background-color: #FFB6C1;'>ติดจอง</td> ";
                    } else {//ใส่สีเขียว
                        echo "<td style='background-color: #90EE90;'>ว่าง</td> ";
                    }
                    if (in_array($check_eday3, $date_time_earr)) {//เช็คเวลาสิ้นสุด
                        $bool_day3 = false;
                    }

                    echo "</tr>";
                    $time = date('H:i', strtotime("+ 30 minutes", strtotime($time)));
                    $endtime = date('H:i', strtotime("+ 30 minutes", strtotime($time)));
                    $times = date('H:i:s', strtotime("+ 30 minutes", strtotime($times)));
                    $endtimes = date('H:i:s', strtotime("+ 30 minutes", strtotime($times)));
                    $i++;
                }
                echo "</table>";
                // mysqli_close($conn);
                ?>
            </tbody>
        </table>

    </div>

    <?php include "footer.php" ?>

    <script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>