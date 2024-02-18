<?php
include 'common/connect.php';
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Manage</title>
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

    /* table {
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
        <h1>จัดการหน้าเว็บไซต์</h1>
        <div>
            <a href="add_activity.php" type="button" class="btn btn-primary">เพิ่มกิจกรรม</a>
            <a href="add_image.php" type="button" class="btn btn-primary">เพิ่มรูปภาพกิจกรรม</a>
        </div>
        <BR>
        <table id="customers">
            <BR>
            <thead>
                <tr>
                    <th width="25%">รูปภาพ</th>
                    <th width="10%">ชื่อกิจกรรม</th>
                    <th width="20%">ข้อมูลกิจกรรม</th>
                    <th width="10%">หน้าจอที่แสดง</th>
                    <th width="10%">วันที่สร้าง</th>
                    <th width="10%">สถานะ</th>
                    <th width="10%">ลบ</th>
                </tr>
            </thead>
            <tbody>

                <?php

                // $sql = "SELECT * FROM `image`";
                $sql = "SELECT
                            mi.image_id,
                            mi.image_name,
                            mi.create_date,
                            ta.activity_name,
                            ta.activity_desc,
                            ta.activity_type_name,
                            -- ta.create_date,
                            ta.del
                        FROM
                            image mi
                        LEFT JOIN activity ta ON
                            mi.activity_id = ta.activity_id
                        ORDER BY ta.activity_name ASC;";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["image_name"] != "") {
                        echo "<td style='text-align-last: center;'> <img style='padding: 5px; width:50%' src='uploads/" .  $row['image_name']  . "'/>    </td>";
                    } else {
                        echo "<td> ไม่พบรูปภาพ </td> ";
                    }
                    echo "<td>" . $row["activity_name"] .  "</td> ";
                    echo "<td>" . $row["activity_desc"] .  "</td> ";
                    echo "<td>" . $row["activity_type_name"] .  "</td> ";
                    echo "<td>" . $row["create_date"] .  "</td> ";
                    if ($row["del"] == 0) {
                        echo "<td>" . "ใช้งาน" .  "</td> ";
                    } else {
                        echo "<td>" . "ไม่ใช้งาน" .  "</td> ";
                    }
                    //ลบข้อมูล
                    echo "<td><a href='controllers/delete_image.php?id=$row[image_id]' onclick=\"return confirm('ต้องการลบรูปภาพใช่หรือไม่!!!')\">ลบ</a></td> ";
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