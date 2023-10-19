<?php
// Create connection
$condb = new mysqli('localhost', 'root', '', 'badminton');

// Check Connection


$sql = "SELECT * FROM court";
$result = $condb->query($sql);
include "headeradmin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
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
        <h1>ข้อมูลสนาม</h1> <a href="addcourt.php" type="button" class="btn btn-primary">เพิ่มข้อมูล สนาม</a> <BR>
        <table>
            <BR>
            <thead>
                <tr>
                    <td width="5%">ID</td>
                    <td width="16%">Court Name</td>
                    <td width="16%">Court Image</td>
                    <td width="14%">Court Status</td>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM `court`";
                $result = mysqli_query($condb, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<td>" . $row["court_id"] .  "</td> ";
                    echo "<td>" . $row["court_name"] .  "</td> ";
                    // echo "<td>" . $row["court_image"] .  "</td> ";
                    echo "<td> <img src='../badminton/uploads/" .  $row['court_image']  . ".jpg'/>   </td>";
                    // echo "<td>" . $row["court_status"] .  "</td> ";
                    echo "<td>" . ($row['court_status'] == "1" ? 'ไม่ว่าง' :  'ว่าง') .  "</td> ";

                    //แก้ไขข้อมูลส่่ง member_id ที่จะแก้ไขไปที่ฟอร์ม
                    // echo "<td><a href='edit.php?id=$row[id]' onclick=\"return confirm('ต้องการแก้ไขข้อมูลใช่ไหม!!!')\">แก้ไข</a></td> ";

                    //ลบข้อมูล
                    // echo "<td><a href='deletemember.php?id=$row[id]' onclick=\"return confirm('ต้องการลบข้อมูลใช่ไหม!!!')\">ลบ</a></td> ";
                    echo "</tr>";
                }
                echo "</table>";
                //5. close connection
                mysqli_close($condb);
                ?>
            </tbody>
        </table>

    </div>

    <?php include "footer.php" ?>

    <script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>