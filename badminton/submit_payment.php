<?php
include "common/connect.php";

session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
$user_id = $_SESSION["user_id"];
$targetDir = "uploads/";
$last_id = "";

if (isset($_POST["submit"])) {
    $booking_id = $_POST['booking_id'];
    $booking_amount = $_POST['booking_amount'];

    // echo "failed: 1";
    // return;


    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {

                $sql_insert = "INSERT INTO `t_payment`(
                    `payment_amount`,
                    `image_name`,
                    `paid_date`,
                    `create_date`,
                    `create_by`,
                    `del`
                )
                VALUES(
                    '$booking_amount',
                    '$fileName',
                    NOW(),
                    NOW(),
                    '$user_id',
                    '0'
                );";
                if ($conn->query($sql_insert) === TRUE) {
                    $last_id = $conn->insert_id;
                    // echo "New record created successfully. Last inserted ID is: " . $last_id;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $sql_update = "UPDATE
                                `t_booking`
                            SET
                                `payment_id` = '$last_id' , edit_date = NOW()
                            WHERE
                                `booking_id` = $booking_id;";
                // echo $sql_update;
                // return;
                $result_update = mysqli_query($conn, $sql_update);
                if ($result_update) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                    header("location: booking_list.php");
                    // echo "successfully: ";
                    // return;
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: booking_list.php");
                    // echo "Failed: " . mysqli_error($conn);
                    // return;
                    // echo "failed: 1";
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: booking_list.php");
                // echo "failed: 2";
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: booking_list.php");
            // echo "failed: 3";
        }
    } else {
        $sql_insert = "INSERT INTO `t_payment`(
            `payment_amount`,
            `paid_date`,
            `create_date`,
            `create_by`,
            `del`
        )
        VALUES(
            '$booking_amount',
            NOW(),
            NOW(),
            '$user_id',
            '0'
        );";
        if ($conn->query($sql_insert) === TRUE) {
            $last_id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql_update = "UPDATE
                        `t_booking`
                    SET
                        `payment_id` = '$last_id' , edit_date = NOW()
                    WHERE
                        `booking_id` = $booking_id;";
        $result_update = mysqli_query($conn, $sql_update);
        header("location: booking_list.php");
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("location: booking_list.php");
}

$sql_query_booking = "SELECT
            tb.booking_id,
            tb.user_id,
            tu.user_name,
            tb.court_id,
            tb.booking_start_time,
            tb.booking_end_time,
            tb.booking_status,
            tb.booking_amount,
            mpt.payment_type_id,
            mpt.payment_type_name,
            tb.create_date
        FROM
            `t_booking` tb
        LEFT JOIN `m_payment_type` mpt ON
            mpt.payment_type_id = tb.payment_type_id
        LEFT JOIN `t_user` tu ON
            tu.user_id = tb.user_id
        WHERE tb.booking_id = $id
        ORDER BY tb.create_date DESC;";
$result_query_booking = mysqli_query($conn, $sql_query_booking);
$row = mysqli_fetch_array($result_query_booking);
if (!mysqli_num_rows($result_query_booking)) {
    header("location: booking_list.php");
    return;
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

    <title>Submit Booking</title>
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
            min-height: 100vh;
            background-image: linear-gradient(rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.6)), url("img_sys/badminton-bg3.jpg");
            background-size: 100%;
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

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
        }
    </style>
    <div class="box">
        <div class="container">
            <div class="top">
                <header>ยืนยันการจ่ายเงิน</header>
            </div>
            <div><img class="center" src='img_sys/transfer.jpg' /></div>
            <form action="submit_payment.php" method="POST" enctype="multipart/form-data">
                <div class="input-field">
                    <label>หมายเลขการจอง</label>
                    <input type="text" value="<?php echo $row["booking_id"]; ?>" class="input" name="booking_id" placeholder="หมายเลขการจอง" maxlength="100" readonly="readonly">
                    <i class='bx'></i>
                </div>
                <div class="input-field">
                    <label>จำนวนเงิน</label>
                    <input type="number" step=".01" value="<?php echo $row["booking_amount"]; ?>" class="input" name="booking_amount" placeholder="จำนวนเงิน" maxlength="100" required>
                    <!-- <i class='bx'></i> -->
                </div>
                <div class="input-field">
                    <div class="text-center justify-content-center align-items-center p-4 border-2 border-dashed rounded-3">
                        <h6 class="my-2">เลือกรูปเพื่ออัพโหลด</h6>
                        <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png ">
                    </div>
                </div>
                <div class="input-field">
                    <div align=center>
                        <button type="submit" onclick="return confirm('ยืนยันการจองใช่หรือไม่')" class="btn btn-success" value="Upload" name="submit">ยืนยัน</button>

                        <a href="booking_list.php" class="btn btn-danger">ยกเลิก</a>
                    </div>
                    <div><br></div>
                </div>

            </form>
        </div>

    </div>
</body>

</html>