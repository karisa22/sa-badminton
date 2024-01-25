<?php
include "common/connect.php";

session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
$user_id = $_SESSION["user_id"];

// $sql_activity = "SELECT * FROM t_activity";
// $result_activity = mysqli_query($conn, $sql_activity);

if (isset($_POST["submit"])) {
    $activity_id = $_POST['activity_id'];
    $file = $_POST['file'];

    // $sql = "INSERT INTO t_user(user_name, user_tel, user_username, user_password, user_type , image_name , create_date , edit_date , create_by , edit_by , del ) 
    // Values('$name', '$tel', '$username' , '$password' , 1 , NULL , now() , now() , 1 , 1 , 0)";
    // $result = mysqli_query($conn, $sql);

    if (isset($_POST['file'])) {
        if (!empty($_FILES["file"]["name"])) {
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                    $insert = $db->query("INSERT INTO `m_image`(
                        `image_name`,
                        `activity_id`,
                        `create_date`,
                        `edit_date`,
                        `create_by`,
                        `edit_by`
                    )
                    VALUES(
                        $fileName,
                        $activity_id,
                        NOW(),
                        NOW(),
                        $user_id,
                        $user_id
                    );");
                    if ($insert) {
                        // $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                        // header("location: web_manage.php");
                        echo "successfully: ";
                    } else {
                        // $_SESSION['statusMsg'] = "File upload failed, please try again.";
                        // header("location: web_manage.php");
                        echo "failed: 1";
                    }
                } else {
                    // $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                    // header("location: web_manage.php");
                    echo "failed: 2";
                }
            } else {
                // $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
                // header("location: web_manage.php");
                echo "failed: 3";
            }
        } else {
            // $_SESSION['statusMsg'] = "Please select a file to upload.";
            // header("location: web_manage.php");
            echo "failed: 4";
        }
    }

    echo "failed: 5";

    // if ($result) {
    //     header("Location: web_manage.php?msg=New record created successfully");
    // } else {
    //     echo "Failed: " . mysqli_error($conn);
    // }
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

    <title>Add Image</title>
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
                <header>เพิ่มข้อมูลรูปภาพ</header>
            </div>
            <form method="POST" action="add_image.php">
                <div class="input-field">
                    <!-- <input type="text" class="input" name="name" placeholder="ชื่อ" maxlength="100" required>
                    <i class='bx bx-user'></i> -->
                    <label for="activity">เลือกกิจกรรม:</label>
                    <select class="input" id="activity" name="activity_id">
                        <?php
                        $sql_activity = "SELECT * FROM `t_activity`";
                        $result_activity = mysqli_query($conn, $sql_activity);
                        while ($row_court = mysqli_fetch_assoc($result_activity)) {
                            echo '<option value="' . $row_court["activity_id"] . '">' . $row_court["activity_name"] . '</option>';
                        }
                        ?>
                    </select>
                    <i class='bx'></i>
                </div>
                <div class="input-field">
                    <div class="text-center justify-content-center align-items-center p-4 border-2 border-dashed rounded-3">
                        <h6 class="my-2">เลือกรูปเพื่ออัพโหลด</h6>
                        <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png ">
                    </div>
                </div>
                <!-- <div class="input-field">
                    <input type="text" class="input" name="username" placeholder="Username" maxlength="50" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="Password" class="input" name="password" placeholder="Password" maxlength="10" required>
                    <i class='bx bx-lock-alt'></i>
                </div> -->
                <div class="input-field">
                    <div align=center>
                        <button type="submit" class="btn btn-success" name="submit">บันทึก</button>

                        <a href="web_manage.php" class="btn btn-danger">ยกเลิก</a>
                    </div>
                    <div><br></div>
                </div>
        </div>
        </form>
    </div>

    </div>
    </div>
</body>

</html>