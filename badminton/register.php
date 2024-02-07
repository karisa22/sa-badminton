<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/boostrap/css/bootstrap.min.css">
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
            background-image: url("images/94.jpg");
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

        /* .container {
            width: 400px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px;

        } */

        .container {
            width: 500px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px;
            background: rgba(255, 255, 255, 0.1);
            /*backdrop-filter: blur(10px);*/
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

        .two-col {
            display: center;
            width: 100%;
            flex-direction: row;
            /* justify-content: space-between; */
            justify-content: center;
            color: #fff;
            font-size: 18px;
            margin-top: 20px;

        }

        .two-col label a:hover {
            color: #ffff
        }
    </style>
    <div class="box">
        <div class="container">

            <!-- <div class="top">
                <header>สมัครสมาชิก</header>
            </div> -->
            <form method="POST" action="controllers/insert_register.php">
                <div class="top">
                    <header>สมัครสมาชิก</header>
                </div>
                <div class="input-field">
                    <input type="text" class="input" name="name" placeholder="ชื่อ" maxlength="15" required>
                    <i class='bx bx-user'></i>
                </div>
                <!-- <div class="input-field">
                    <input type="text" class="input" name="lastname" placeholder="นามสกุล" maxlength="100" required>
                    <i class='bx bx-user'></i>
                </div> -->
                <div class="input-field">
                    <input type="tel" class="input" name="telephone" placeholder="เบอร์โทรศัพท์" maxlength="10" required>
                    <i class='bx bx-phone'></i>
                </div>
                <div class="input-field">
                    <input type="text" class="input" name="username" placeholder="Username" maxlength="10" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="Password" class="input" name="password" placeholder="Password" maxlength="10" required>
                    <i class='bx bx-lock-alt'></i>
                </div>
                <div class="input-field">
                    <label><a href="login.php"></a></label>
                    <input type="submit" class="submit" value="บันทึก">

                </div>
                <div class="regis">
                    <div><br></div>
                    <div align="center">
                        <span center>มีบัญชีผู้ใช้อยู่แล้ว? &nbsp;
                            <label><a href="login.php">เข้าสู่ระบบ</a></label></span>
                    </div>
                    <div><br></div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>