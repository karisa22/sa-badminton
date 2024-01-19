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
    <title>ListPayment</title>
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

    table {
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
        <h1>รายการชำระเงิน</h1>
        <!-- <a href="addadmin.php" type="button" class="btn btn-primary">เพิ่มข้อมูล</a> <BR> -->
        <table>
            <BR>
            <thead>
                <tr>
                    <td width="5%">ID</td>
                    <td width="10%">จำนวนเงิน</td>
                    <td width="10%">รูปภาพ slip</td>
                    <td width="10%">วันที่จ่ายเงิน</td>
                    <td width="10%">วันที่สร้างข้อมูล</td>
                    <td width="10%" <?php echo $style; ?>>ผู้สร้างข้อมูล</td>
                    <td width="10%" <?php echo $style; ?>>สถานะข้อมูล</td>
                    <td width="8%">ยืนยันการจอง</td>
                    <td width="8%">ยกเลิก</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "";
                if ($_SESSION["type"] == 1) {
                    $sql = "SELECT * FROM `t_payment`";
                } else {
                    $sql = "SELECT * FROM `t_payment` WHERE create_by = $user_id AND del = 0";
                }
                $result = mysqli_query($conn, $sql);
                if (!mysqli_num_rows($result)) {
                    return;
                }
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<td>" . $row["payment_id"] .  "</td> ";
                    echo "<td>" . $row["payment_amount"] .  "</td> ";
                    if ($row["image_name"] != "") {
                        echo "<td> <img style='width:50%' src='images/" .  $row['image_name']  . "'/>    </td>";
                    } else {
                        echo "<td> ไม่พบรูปภาพ </td> ";
                    }
                    echo "<td>" . $row["paid_date"] .  "</td> ";
                    echo "<td>" . $row["create_date"] .  "</td> ";
                    if ($_SESSION["type"] == 1){
                        echo "<td>" . $row["create_by"] .  "</td> ";
                        if($row["del"]==0){
                            echo "<td>ใช้งาน</td> ";
                        }else{
                            echo "<td>ยกเลิก</td> ";
                        }
                    }
                    //แก้ไขข้อมูลส่่ง member_id ที่จะแก้ไขไปที่ฟอร์ม
                    echo "<td><a href='edit_member.php?id=$row[payment_id]' onclick=\"return confirm('ต้องการแก้ไขข้อมูลใช่ไหม!!!')\">อัพโหลดสลิป</a></td> ";

                    //ลบข้อมูล
                    echo "<td><a href='controllers/cancel_payment.php?id=$row[payment_id]' onclick=\"return confirm('ต้องการลบข้อมูลใช่ไหม!!!')\">ยกเลิกการจอง</a></td> ";
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