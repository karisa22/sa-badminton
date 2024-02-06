<?php
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
?>


<?php include "header.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
</head>

<body>
    <!-- <div>
        Welcome
    </div> -->
    <div style='margin-top: 40px; margin-bottom: 35px;' class="card">
        <img src="images/85.png" alt="John" style="width:100%">
        <h1><?php echo $_SESSION["user_id"]; ?></h1>
        <p class="title">Name : <?php echo $_SESSION["name"]; ?></p>
        <p>Tel : <?php echo $_SESSION["tel"]; ?></p>
        <p>Type : <?php echo $_SESSION["type"]==1?"Admin":"Member"; ?></p>
        <p>Create Date : <?php echo $_SESSION["create_date"]; ?></p>
        <!-- <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a> -->
        <!-- <p><button>Contact</button></p> -->
    </div>

</body>

</html>

<?php include "footer.php" ?>