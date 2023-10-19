<?php
    session_start();
    if(!isset($_SESSION["username"]))
    header("locatiomn:login.php");
?>

<?php include "headeradmin.php" ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href = "bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div>
        Welcome
    </div>
    <?php
    if(isset($_SESSION["firstname"])){
        echo "<div class='text-success'";
        echo $_SESSION["firstname"]." ".$_SESSION["lastname"];
        echo "</div>";
    }

    ?>
    
</body>
</html>

<?php include "footer.php"?> 