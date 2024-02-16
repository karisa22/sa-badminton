<?php
include 'common/connect.php';
$style = "";
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
if ($_SESSION["type"] != 1)
    $style = "style='display:none;'"; //ซ่อนหน้าจอส่วนที่ไม่ได้เป็น admin
include "header.php";
$user_id = $_SESSION["user_id"];
date_default_timezone_set('Asia/Bangkok');
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
        <h1>รายการการจอง</h1>
        <a href="add_booking.php" type="button" class="btn btn-primary" >จองสนาม</a> <BR>

        <table id="customers">
            <BR>
            <thead>
                <tr>
                    <th width="9%">หมายเลขการจอง</th>
                    <th width="9%">ชื่อสนาม</th>
                    <th width="9%">ผู้จองสนาม</th>
                    <th width="9%">เวลาเริ่มจอง</th>
                    <th width="9%">เวลาสิ้นสุดการจอง</th>
                    <th width="9%">ประเภทการจ่ายเงิน</th>
                    <th width="9%">สถานะการจอง</th>
                    <th width="9%">จำนวนเงิน</th>
                    <th width="9%">ยืนยันการชำระเงิน</th>
                    <th width="9%" <?php echo $style; ?>>ยืนยันการจอง</th>
                    <th width="9%">ยกเลิกการจอง</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $date_now = date("Y-m-d");

                $sql = "";
                if ($_SESSION["type"] == 1) {
                    $sql = "SELECT
                                tb.booking_id,
                                tb.user_id,
                                tu.user_name,
                                tb.court_id,
                                mc.court_name,
                                tb.booking_start_time,
                                tb.booking_end_time,
                                tb.booking_status,
                                tb.booking_price,
                                tb.payment_id,
                                mpt.payment_type_id,
                                mpt.payment_type_name,
                                tb.create_date
                            FROM
                                `booking` tb
                            LEFT JOIN `payment_type` mpt ON
                                mpt.payment_type_id = tb.payment_type_id
                            LEFT JOIN `user` tu ON
                                tu.user_id = tb.user_id
                            LEFT JOIN `court` mc ON
                                mc.court_id = tb.court_id
                            WHERE tb.booking_start_time > '$date_now'
                            ORDER BY tb.create_date DESC;";
                } else {
                    $sql = "SELECT
                            tb.booking_id,
                            tb.user_id,
                            tu.user_name,
                            tb.court_id,
                            mc.court_name,
                            tb.booking_start_time,
                            tb.booking_end_time,
                            tb.booking_status,
                            tb.booking_price,
                            tb.payment_id,
                            mpt.payment_type_id,
                            mpt.payment_type_name,
                            tb.create_date
                        FROM
                            `booking` tb
                        LEFT JOIN `payment_type` mpt ON
                            mpt.payment_type_id = tb.payment_type_id
                        LEFT JOIN `user` tu ON
                            tu.user_id = tb.user_id
                        LEFT JOIN `court` mc ON
                            mc.court_id = tb.court_id
                        WHERE tb.create_by = $user_id AND tb.booking_start_time > '$date_now'
                        ORDER BY tb.create_date DESC;";
                }
                $result = mysqli_query($conn, $sql);
                if (!mysqli_num_rows($result)) {
                    return;
                }
                while ($row = mysqli_fetch_assoc($result)) {

                    $booking_start_time = date("Y-m-d H:i", strtotime($row["booking_start_time"]));
                    $booking_end_time = date("Y-m-d H:i", strtotime($row["booking_end_time"]));

                    echo "<td>" . $row["booking_id"] .  "</td> ";
                    echo "<td>" . $row["court_name"] .  "</td> ";
                    echo "<td>" . $row["user_name"] .  "</td> ";
                    // echo "<td>" . $row["booking_start_time"] .  "</td> ";
                    // echo "<td>" . $row["booking_end_time"] .  "</td> ";
                    echo "<td>" . $booking_start_time .  "</td> ";
                    echo "<td>" . $booking_end_time .  "</td> ";
                    echo "<td>" . $row["payment_type_name"] .  "</td> ";
                    if ($row["booking_status"] == 1) {
                        if(!isset($row["payment_id"])){
                            echo "<td> รอชำระเงิน </td> ";
                        }else{
                            echo "<td> รอยืนยัน </td> ";
                        }
                    } else if($row["booking_status"] == 2){
                        echo "<td> ชำระเงินแล้ว </td> ";
                    } else {
                        echo "<td> ยกเลิก </td> ";
                    }
                    echo "<td style='text-align: right;'>" . $row["booking_price"] .  "</td> ";

                    

                    if ($row["booking_status"] == 1) { //รายการยกเลิกไปแล้ว
                        if(!isset($row["payment_id"])){
                            echo "<td><a href='submit_payment.php?id=$row[booking_id]'>ยืนยันการชำระเงิน</a></td> ";
                        }else{
                            echo "<td>  </td> ";
                        }

                        if($_SESSION["type"]==1 && isset($row["payment_id"])){ // check admin or member
                            echo "<td><a href='controllers/update_booking.php?id=$row[booking_id]' onclick=\"return confirm('ยืนยันการจองใช่หรือไม่')\">ยืนยัน</a></td> ";
                        }else if($_SESSION["type"]==1){
                            echo "<td>  </td> ";
                        }
                        
                        //ลบข้อมูล
                        echo "<td><a href='controllers/cancel_booking.php?id=$row[booking_id]' onclick=\"return confirm('ยกเลิกการจองใช่หรือไม่')\">ยกเลิกการจอง</a></td> ";
                    }else{
                        echo "<td>  </td> ";
                        if($_SESSION["type"]==1){ // check admin or member
                            echo "<td>  </td> ";
                        }
                        echo "<td>  </td> ";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                //5. close connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>

    </div>

    <?php include "footer.php" ?>

    <script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>