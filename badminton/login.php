<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Login</title>
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800&display=swap');
*{
    box-sizing: border-box;
    font-family: 'M PLUS Rounded 1c', sans-serif;
    font-family: 'Noto Sans Thai', sans-serif;
}
body
{
    background-image: url("images/94.jpg");
    -webkit-background-size: cover;
    background-size: cover;
    
    background-position: center;
    background-attachment: flex;
    background-repeat: no-repeat;
    
}
.box
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 90vh;
}
.container
{
    width: 500px;
    display: flex;
    flex-direction: column;
    padding: 0 15px 0 15px;
    background: rgba(255, 255, 255, 0.1);
    /*backdrop-filter: blur(10px);*/
    border-radius: 25px;
    background-color: skyblue;
}
span
{
    color: #fff;
    display: center;
    justify-content: center;
    padding: 10px 0 10px 0;
}
header
{
    color: #fff;
    font-size: 50px;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}

.input-field .input
{
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
i{
    position: relative;
    top: -38px;
    left: 17px;
    color: #fff;
}
::-webkit-input-placeholder{
    color: #fff;
}
.submit{
    border: none;
    border-radius: 30px;
    font-size: 20px;
    height: 50px;
    outline: none;
    width: 100%;
    color: black;
    background: rgba(255,255,255,0.7);
    cursor: pointer;
    transition: .3s ;
    margin-top: 20px;
}
.submit:hover{
    color: rgb(255, 255, 255);
    background-color: rgb(39, 115, 255);
    box-shadow: 2px 5px 7px 2px rgba(18, 33, 255, 0.2);
}



</style>   

    <div class="box">
    <div class="container">
        <form method="POST" action="login_check.php">
        <div class="top">
            <header>เข้าสู่ระบบ</header>
        </div>
        
        <div class="input-field">
            <input type="text" class="input" required placeholder="Username" name="username" maxlength="50" >
            <i class='bx bx-user' ></i>
        </div>
        <div class="input-field">
            <input type="Password" class="input" required placeholder="Password" name="password" maxlength="10" >
            <i class='bx bx-lock-alt'></i>
        </div>
        <?php
            if(isset($_SESSION["Error"])){
               echo "<div class='p-3 mb-2 bg-danger text-white text-center'>";
                echo $_SESSION["Error"];
                echo "</div>";
            }
        ?>
        <div class="input-field">
            <input type="submit" class="submit" value="เข้าสู่ระบบ">
        </div>
        <br>
        <div class="regis">
            <div align = "center"> 
                <span center>ยังไม่มีบัญชีผู้ใช้? &nbsp;
                <label><a href= "register.php">สมัครสมาชิก</link></label></span>
            </div>
            <div><br></div>
        </div>
    </div>
    </form> 
    </div>
</div>  
</body>
</html>