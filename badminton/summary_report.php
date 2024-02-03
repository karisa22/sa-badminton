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
// $cur_date = date('Y-m');

$start_date = date('2024-01-01');
$end_date = date('2024-12-31');
$status = '%';

if (isset($_POST["submit"])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
}

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

    .box {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
    }

    .container2 {
        width: 300px;
        display: flex;
        flex-direction: column;
        padding: 10px 15px 0 15px;
        border-radius: 25px;
        background-color: skyblue;
        align-items: center;
        margin-left: auto;
        margin-right: auto;
    }

    /*span {
        color: #fff;
        display: center;
        justify-content: center;
        padding: 10px 0 10px 0;
    }*/

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
        /* padding: 0 0 0 0px; */
        background: rgba(255, 255, 255, 0.1);
        outline: none;
        padding: 0 35px 0;
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

    .right{
        width: 100%;
        text-align: right;
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

<body>

    <div class="container">
        <br>
        <h1>ข้อมูลรายรับ</h1>
        <div class="container2">
            <!-- <a href="#" type="button" class="btn btn-primary">เพิ่มกิจกรรม</a>
            <a href="add_image.php" type="button" class="btn btn-primary">เพิ่มรูปภาพกิจกรรม</a> -->
            <form action="summary_report.php" method="POST" enctype="multipart/form-data">
                <div>
                <div class="input-field">
                    <label for="date" style="display: block; margin-bottom: 10px;">
                        วันที่เริ่มต้น (MM/DD/YYYY):
                    </label>
                    <input class="input" type="date" name="start_date" value="2024-01-01" required style="padding: 5px; border-radius: 5px; 
            border: 1px solid #ccc; margin-bottom: 10px;">
                </div>

                <div class="input-field">
                    <label for="date" style="display: block; margin-bottom: 10px;">
                        วันที่สิ้นสุด (MM/DD/YYYY):
                    </label>
                    <input class="input" type="date" name="end_date" value="2024-12-31" required style="padding: 5px; border-radius: 5px; 
            border: 1px solid #ccc; margin-bottom: 10px;">
                </div>
                </div>

                <div class="input-field">
                    <!-- <input type="text" class="input" name="name" placeholder="ชื่อ" maxlength="100" required>
                    <i class='bx bx-user'></i> -->
                    <label for="status">เลือกสถานะการชำระเงิน:</label>
                    <select class="input" id="status" name="status">
                        <option value="%">ทั้งหมด</option>;
                        <option value="1">รอการชำระเงิน</option>;
                        <option value="2">ชำระเงินสำเร็จ</option>;
                        <option value="3">ยกเลิกการจอง</option>;
                    </select>
                    <i class='bx'></i>
                </div>

                <div class="input-field">
                    <div align=center>
                        <button type="submit" class="btn btn-success" value="submit" name="submit">ค้นหา</button>

                        <!-- <a href="courtlist.php" class="btn btn-danger">ยกเลิก</a> -->
                    </div>
                    <div><br></div>
                </div>

            </form>
        </div>
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
                    <td width="10%">สถานะการจอง</td>
                    <td width="10%">จำนวนเงิน</td>
                </tr>
            </thead>
            <tbody>

                <?php
                // WHERE tb.booking_status = '1' and tb.create_date like '%$cur_date%'
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
                        WHERE tb.booking_status LIKE '$status' and ( tb.create_date BETWEEN '$start_date' AND '$end_date' )
                        ORDER BY tb.create_date DESC;";
                // echo $sql ;
                $result = mysqli_query($conn, $sql);
                if (!mysqli_num_rows($result)) {
                    return;
                }
                while ($row = mysqli_fetch_assoc($result)) {

                    if ($row["booking_status"] == 2) {
                        $sum_amt = $sum_amt + $row["booking_amount"];
                    }

                    echo "<td>" . $row["create_date"] .  "</td> ";
                    echo "<td>" . $row["payment_type_name"] .  "</td> ";
                    if ($row["booking_status"] == 1) {
                        echo "<td>รอการชำระเงิน</td> ";
                    } else if ($row["booking_status"] == 2) {
                        echo "<td>ชำระเงินสำเร็จ</td> ";
                    } else {
                        echo "<td>ยกเลิการจอง</td> ";
                    }
                    echo "<td>" . $row["booking_amount"] .  "</td> ";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<label class='right'>รายรับทั้งหมด " . $sum_amt . " บาท</label>";
                //5. close connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>

    </div>

    <?php include "footer.php" ?>

    <!-- <script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script> -->
</body>

</html>