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

    table {
        margin: 5px;
        width: 100%;
        border-collapse: collapse;
    }

    table,
    td {
        border: 1px solid #5D6D7E;
        text-align: center;
    }

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
        <h1>จัดการการจอง</h1>
        <a href="add_booking.php" type="button" class="btn btn-primary" >จองสนาม</a> <BR>

        <table>
            <BR>
            <thead>
                <tr>
                    <td width="10%">ชื่อสนาม</td>
                    <td width="10%">เวลาเริ่มจอง</td>
                    <td width="10%">เวลาสิ้นสุดการจอง</td>
                    <td width="10%">ประเภทการจ่ายเงิน</td>
                    <td width="10%">สถานะการจอง</td>
                    <td width="10%">จำนวนเงิน</td>
                    <td width="10%">ยืนยันการจอง</td>
                    <td width="10%">ยกเลิกการจอง</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "";
                if ($_SESSION["type"] == 1) {
                    $sql = "SELECT
                            tb.booking_id,
                            tb.court_id,
                            tb.booking_start_time,
                            tb.booking_end_time,
                            tb.booking_status,
                            tb.booking_amount,
                            mpt.payment_type_name,
                            tb.create_date
                        FROM
                            `t_booking` tb
                        LEFT JOIN `m_payment_type` mpt ON
                            mpt.payment_type_id = tb.payment_type_id
                        ORDER BY tb.create_date DESC;";
                } else {
                    $sql = "SELECT
                            tb.booking_id,
                            tb.court_id,
                            tb.booking_start_time,
                            tb.booking_end_time,
                            tb.booking_status,
                            tb.booking_amount,
                            mpt.payment_type_name,
                            tb.create_date
                        FROM
                            `t_booking` tb
                        LEFT JOIN `m_payment_type` mpt ON
                            mpt.payment_type_id = tb.payment_type_id
                        WHERE tb.create_by = $user_id
                        ORDER BY tb.create_date DESC;";
                }
                $result = mysqli_query($conn, $sql);
                if (!mysqli_num_rows($result)) {
                    return;
                }
                while ($row = mysqli_fetch_assoc($result)) {

                    $booking_start_time = date("Y-m-d h:i", strtotime($row["booking_start_time"]));
                    $booking_end_time = date("Y-m-d h:i", strtotime($row["booking_end_time"]));

                    echo "<td>" . $row["court_id"] .  "</td> ";
                    // echo "<td>" . $row["booking_start_time"] .  "</td> ";
                    // echo "<td>" . $row["booking_end_time"] .  "</td> ";
                    echo "<td>" . $booking_start_time .  "</td> ";
                    echo "<td>" . $booking_end_time .  "</td> ";
                    echo "<td>" . $row["payment_type_name"] .  "</td> ";
                    if ($row["booking_status"] == 1) {
                        echo "<td> รอชำระเงิน </td> ";
                    } else if($row["booking_status"] == 2){
                        echo "<td> ชำระเงินแล้ว </td> ";
                    } else {
                        echo "<td> ยกเลิก </td> ";
                    }
                    echo "<td>" . $row["booking_amount"] .  "</td> ";
                    //ยินยัน
                    echo "<td><a href='controllers/submit_booking.php?id=$row[booking_id]' onclick=\"return confirm('ต้องการยืนยันการชำรเงินใช่ไหม!!!')\">ยืนยันการชำระเงิน</a></td> ";
                    //ลบข้อมูล
                    echo "<td><a href='controllers/cancel_booking.php?id=$row[booking_id]' onclick=\"return confirm('ต้องการลบข้อมูลใช่ไหม!!!')\">ยกเลิกการจอง</a></td> ";
                    echo "</tr>";
                }
                echo "</table>";
                //5. close connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <table>
            <BR>
            <thead>
                <tr>
                    <td width="10%">Date</td>

                    <td width="5%">12:00-12:30</td>
                    <td width="5%">12:30-13:00</td>
                    <td width="5%">13:00-13:30</td>
                    <td width="5%">13:30-14:00</td>

                    <td width="5%">14:00-14:30</td>
                    <td width="5%">14:30-15:00</td>
                    <td width="5%">15:00-15:30</td>
                    <td width="5%">15:30-16:00</td>

                    <td width="5%">16:00-16:30</td>
                    <td width="5%">16:30-17:00</td>
                    <td width="5%">17:00-17:30</td>
                    <td width="5%">17:30-18:00</td>

                    <td width="5%">18:00-18:30</td>
                    <td width="5%">18:30-19:00</td>
                    <td width="5%">19:00-19:30</td>
                    <td width="5%">19:30-20:00</td>

                    <td width="5%">20:00-20:30</td>
                    <td width="5%">20:30-21:00</td>
                    <td width="5%">21:00-21:30</td>
                    <td width="5%">21:30-22:00</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $date = date("Y-m-d");

                $i = 0;
                while ($i < 3) {
                    echo "<td>" . $date . "</td> ";

                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";

                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";

                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";

                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";

                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";
                    echo "<td>ว่าง</td> ";

                    echo "</tr>";
                    $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
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