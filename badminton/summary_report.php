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
$sum_amt = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Report</title>
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
        <h1>ข้อมูลรายรับ</h1>
        
        <table>
            <BR>
            <thead>
                <tr>
                    <!-- <td width="10%">ชื่อผู้จอง</td>
                    <td width="10%">เบอร์โทร</td>
                    <td width="10%">สนามที่จอง</td> -->
                    <!-- <td width="10%">สถานะการจอง</td> -->
                    <td width="10%">วันที่จอง</td>
                    <td width="10%">วิธีการจ่ายเงิน</td>
                    <td width="10%">จำนวนเงิน</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT
                            tu.user_name,
                            tu.user_tel,
                            tb.court_id,
                            tb.booking_status,
                            tb.booking_amount,
                            mpt.payment_type_name,
                            tb.create_date
                        FROM
                            `t_booking` tb
                        LEFT JOIN `t_user` tu ON
                            tb.user_id = tu.user_id
                        LEFT JOIN `m_payment_type` mpt ON
                            mpt.payment_type_id = tb.payment_type_id
                        WHERE tb.booking_status = '1' and tb.create_date like '%2024-01%'
                        ORDER BY tb.create_date DESC;";
                $result = mysqli_query($conn, $sql);
                if (!mysqli_num_rows($result)) {
                    return;
                }
                while ($row = mysqli_fetch_assoc($result)) {

                    $sum_amt = $sum_amt + $row["booking_amount"];

                    // echo "<td>" . $row["user_name"] .  "</td> ";
                    // echo "<td>" . $row["user_tel"] .  "</td> ";
                    // echo "<td>" . $row["court_id"] .  "</td> ";
                    // if ($row["booking_status"] == 1) {
                    //     echo "<td>รอการชำระเงิน</td> ";
                    // } else if ($row["booking_status"] == 2){
                    //     echo "<td>ชำระแล้ว</td> ";
                    // } else {
                    //     echo "<td>ยกเลิการจอง</td> ";
                    // }
                    echo "<td>" . $row["create_date"] .  "</td> ";
                    echo "<td>" . $row["payment_type_name"] .  "</td> ";
                    echo "<td>" . $row["booking_amount"] .  "</td> ";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<label>รายรับทั้งหมด " . $sum_amt ." บาท</label>";
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