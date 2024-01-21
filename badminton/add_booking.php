<?php
include "common/connect.php";

$style = "";
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
if ($_SESSION["type"] != 1)
    $style = "style='display:none;'"; //ซ่อนหน้าจอส่วนที่ไม่ได้เป็น admin
$user_id = $_SESSION["user_id"];

$mindate = date("Y-m-d");
$mintime = date("h:i");
$min = $mindate . "T" . $mintime;
$maxdate = date("Y-m-d", strtotime("+3 Days"));
$maxtime = date("h:i");
$max = $maxdate . "T" . $maxtime;

// $sql_court = "SELECT * FROM `m_court`";
// $result_court = mysqli_query($conn, $sql_court);

// $sql_user = "SELECT * FROM `t_user` WHERE user_type = '2'";
// $result_user = mysqli_query($conn, $sql_user);

if (isset($_POST["submit"])) {
    $court = $_POST['court'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $type = $_POST['type'];
    $v_type = "";
    $amount = 0;

    $user = $user_id;
    if (!isset($_POST['user'])){
        $user = $_POST['user'];
    }

    if ("30 นาที" == $hour) {
        $amount = 75;
        $endtime = date('h:i', strtotime($date . ' + 30 minutes'));
    } else if ("1 ชั่วโมง" ==$hour) {
        $amount = 150;
        $endtime = date('h:i', strtotime($date . ' +1 hours'));
    } else if ("1 ชั่วโมง 30 นาที" == $hour) {
        $amount = 225;
        $endtime = date('h:i', strtotime($date . ' + 90 minutes'));
    } else if ("2 ชั่วโมง" == $hour) {
        $amount = 300;
        $endtime = date('h:i', strtotime($date . ' +2 hours'));
    }
    $enddate = date("Y-m-d");
    $end = $enddate . "T" . $endtime;

    if ("เงินโอน" == $type) {
        $v_type = 1;
    } else if ("เงินสด" ==$type) {
        $v_type = 2;
    } else if ("qrcode" == $type) {
        $v_type = 3;
    } else if ("บัตรเครดิต" == $type) {
        $v_type = 4;
    }

    $sql = "INSERT INTO `t_booking`(
        `user_id`,
        `court_id`,
        `booking_start_time`,
        `booking_end_time`,
        `payment_type_id`,
        `payment_id`,
        `booking_status`,
        `booking_amount`,
        `promotion_id`,
        `create_date`,
        `edit_date`,
        `create_by`,
        `edit_by`,
        `del`
    )
    VALUES(
        $user,
        $court,
        '$date',
        '$end',
        $v_type,
        NULL,
        '1',
        $amount,
        NULL,
        NOW(),
        NULL,
        $user_id,
        $user_id,
        '0'
    );";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: booking_list.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/boostrap/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <title>Add Booking</title>
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800&display=swap');

        * {
            box-sizing: border-box;
            font-family: 'M PLUS Rounded 1c', sans-serif;
            font-family: 'Noto Sans Thai', sans-serif;
        }

        body {
            /* background-image: url("images/7.jpg"); */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        .container {
            width: 500px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px;
            border-radius: 25px;
            background-color: skyblue;

        }

        span {
            color: #fff;
            display: center;
            justify-content: center;
            padding: 10px 0 10px 0;
        }

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
            color: #fff;
            font-size: 20px;
            padding: 0 0 0 45px;
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
    <div class="box">
        <div class="container">
            <div class="top">
                <header>จองสนาม</header>
            </div>
            <form method="POST" action="add_booking.php">
                <div class="input-field">
                    <input type="number" class="input" placeholder="ชื่อคอร์ท" type="search" list="court" name="court" required>
                    <datalist id="court">
                        <?php
                        $sql_court = "SELECT * FROM `m_court`";
                        $result_court = mysqli_query($conn, $sql_court);
                        while ($row_court = mysqli_fetch_assoc($result_court)) {
                            echo '<option value="' . $row_court["court_id"] . '">';
                        }
                        ?>
                    </datalist>
                    <i class='bx'></i>
                </div>
                <div class="input-field" <?php echo $style; ?>>
                    <input type="text" class="input" placeholder="หมายเลขผู้ใช้" type="search" list="user" name="user">
                    <datalist id="user">
                        <?php
                        $sql_user = "SELECT * FROM `t_user` WHERE user_type = '2'";
                        $result_user = mysqli_query($conn, $sql_user);
                        while ($row_user = mysqli_fetch_assoc($result_user)) {
                            echo '<option value="' . $row_user["user_id"] . '">';
                        }
                        ?>
                    </datalist>
                    <i class='bx'></i>
                </div>
                <div class="input-field">
                    <input class="input" name="date" type="datetime-local" min="<?php echo $min ?>" max="<?php echo $max ?>" required>
                    <!-- <input type="number" class="input" name="tel" placeholder="เบอร์โทรศัพท์" maxlength="10" required> -->
                    <i class='bx'></i>
                </div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="จำนวนชั่วโมง" list="hour" name="hour" required>
                    <datalist id="hour">
                        <option value="30 นาที"></option>
                        <option value="1 ชั่วโมง"></option>
                        <option value="1 ชั่วโมง 30 นาที"></option>
                        <option value="2 ชั่วโมง"></option>
                    </datalist>
                    <i class='bx'></i>
                </div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="วิธีการจ่ายเงิน" type="search" list="type" name="type" required>
                    <datalist id="type">
                        <?php
                        $sql_type = "SELECT * FROM `m_payment_type`";
                        $result_type = mysqli_query($conn, $sql_type);
                        while ($row_type = mysqli_fetch_assoc($result_type)) {
                            echo '<option value="' . $row_type["payment_type_name"] . '">';
                        }
                        ?>
                    </datalist>
                    <i class='bx'></i>
                </div>
                <!-- <div class="input-field">
                    <input type="number" name="amount" placeholder="จำนวนเงิน" READONLY>
                    <i class='bx '></i>
                </div> -->
                <div class="input-field">
                    <div align=center>
                        <button type="submit" class="btn btn-success" name="submit">บันทึก</button>

                        <a href="booking_list.php" class="btn btn-danger">ยกเลิก</a>
                    </div>
                    <div><br></div>
                </div>
        </div>
        </form>
    </div>
</body>

</html>