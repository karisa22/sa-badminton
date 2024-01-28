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
    <title>Profile User</title>
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
        <h1>ข้อมูลสนาม</h1>
        <a href="add_court.php" type="button" class="btn btn-primary" <?php echo $style; ?>>เพิ่มข้อมูล สนาม</a> <BR>
        <table>
            <BR>
            <thead>
                <tr>
                    <td width="5%">ID</td>
                    <td width="16%">ชื่อสนาม</td>
                    <td width="16%">รูปภาพสนาม</td>
                    <td width="14%" <?php echo $style; ?>>สถานะของสนาม</td>
                    <td width="5%" <?php echo $style; ?>>ปรับเปลี่ยนสถานะ</td>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM `m_court`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    if ($_SESSION["type"] != 1 && $row['court_status'] == "1") {
                        continue;
                    }

                    echo "<td>" . $row["court_id"] .  "</td> ";
                    echo "<td>" . $row["court_name"] .  "</td> ";
                    // echo "<td>" . $row["court_image"] .  "</td> ";
                    echo "<td> <img src='uploads/" .  $row['court_image']  . "'/>   </td>";
                    // echo "<td>" . $row["court_status"] .  "</td> ";
                    // echo "<td>" . ($row['court_status'] == "1" ? 'ปิดปรับปรุง' :  'พร้อมใช้งาน') .  "</td> ";

                    if ($_SESSION["type"] == 1) {
                        echo "<td>" . ($row['court_status'] == "1" ? 'ปิดปรับปรุง' :  'พร้อมใช้งาน') .  "</td> ";
                        echo "<td><a href='controllers/update_court.php?id=$row[court_id]&court_status=$row[court_status]' onclick=\"return confirm('ต้องการเปลี่ยนสถานะใช่หรือไม่?')\">" . ($row['court_status'] == "1" ? 'เปิดใช้งาน' :  'ปิดใช้งาน') . "</a></td> ";
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