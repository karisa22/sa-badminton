<?php
// // Create connection
// $condb = new mysqli('localhost', 'root', '', 'badminton');

// // Check Connection


// $sql = "SELECT * FROM member";
// $result = $condb->query($sql);
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
    <title>ListProfile</title>
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
        <h1>ข้อมูลผู้ใช้</h1> <a href="addadmin.php" type="button" class="btn btn-primary">เพิ่มข้อมูลผู้ดูแล</a> <BR>
        <table>
            <BR>
            <thead>
                <tr>
                    <td width="5%">ID</td>
                    <td width="16%">ชื่อ</td>
                    <td width="16%">เบอร์โทร</td>
                    <td width="14%">ประเภท</td>
                    <td width="15%">Username</td>
                    <td width="15%">วันที่สร้าง</td>
                    <td width="5%">สถานะ</td>
                    <td width="10%">แก้ไข</td>
                    <td width="10%">ลบ</td>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM `t_user`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<td>" . $row["user_id"] .  "</td> ";
                    echo "<td>" . $row["user_name"] .  "</td> ";
                    echo "<td>" . $row["user_tel"] .  "</td> ";
                    if($row["user_type"]==1){
                        echo "<td>" . "Admin" .  "</td> ";
                    }else{
                        echo "<td>" . "Member" .  "</td> ";
                    }
                    echo "<td>" . $row["user_username"] .  "</td> ";
                    echo "<td>" . $row["create_date"] .  "</td> ";
                    if($row["del"]==0){
                        echo "<td>" . "ใช้งาน" .  "</td> ";
                    }else{
                        echo "<td>" . "ไม่ใช้งาน" .  "</td> ";
                    }
                    //แก้ไขข้อมูลส่่ง member_id ที่จะแก้ไขไปที่ฟอร์ม
                    echo "<td><a href='edit_member.php?id=$row[user_id]' onclick=\"return confirm('ต้องการแก้ไขข้อมูลใช่ไหม!!!')\">แก้ไข</a></td> ";

                    //ลบข้อมูล
                    echo "<td><a href='controllers/delete_member.php?id=$row[user_id]' onclick=\"return confirm('ต้องการลบข้อมูลใช่ไหม!!!')\">ลบ</a></td> ";
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