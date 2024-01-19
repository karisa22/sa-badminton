<?php
include "common/connect.php";

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $sql = "INSERT INTO t_user(user_name, user_tel, user_username, user_password, user_type , image_name , create_date , edit_date , create_by , edit_by , del ) 
    Values('$name', '$tel', '$username' , '$password' , 1 , NULL , now() , now() , 1 , 1 , 0)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: showprofile.php?msg=New record created successfully");
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

    <title>Register</title>
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
            background-image: url("images/7.jpg");
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
                <header>เพิ่มข้อมูล Admin</header>
            </div>
            <form method="POST" action="addadmin.php">
                <div class="input-field">
                    <input type="text" class="input" name="name" placeholder="ชื่อ" maxlength="100" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="number" class="input" name="tel" placeholder="เบอร์โทรศัพท์" maxlength="10" required>
                    <i class='bx bx-phone'></i>
                </div>
                <div class="input-field">
                    <input type="text" class="input" name="username" placeholder="Username" maxlength="50" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="Password" class="input" name="password" placeholder="Password" maxlength="10" required>
                    <i class='bx bx-lock-alt'></i>
                </div>
                <div class="input-field">
                    <div align=center>
                        <button type="submit" class="btn btn-success" name="submit">บันทึก</button>

                        <a href="showprofile.php" class="btn btn-danger">ยกเลิก</a>
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