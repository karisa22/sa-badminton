<?php 

    session_start();
    include_once 'dbConfig.php';
?>
<?php include"header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Upload Image System</title>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<style>
	 /* Googlefont Poppins CDN Link */
	 @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box; 
  font-family: 'M PLUS Rounded 1c', sans-serif;
  font-family: 'Noto Sans Thai', sans-serif;
}

</style>
<body>
    
    <div class="container">
        <div class="row mt-2">
           
        </div>
        <div class="row">
            <?php  if (!empty($_SESSION['statusMsg'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['statusMsg']; 
                        unset($_SESSION['statusMsg']);
                    ?>
                </div>
            <?php } ?>
        </div>

        <div class="row g-2">
            <?php 
                $query = $db->query("SELECT * FROM facilities ORDER BY uploaded_on DESC");
                if ($query->num_rows > 0) {
                    while($row = $query->fetch_assoc()) {
                        $imageURL = 'uploads/'.$row['facilities_name'];
                    ?>
                    <div class="col-sm-4">
                        <div>
                            <img src="<?php echo $imageURL ?>" alt="center" width="430px" height="250px" margin="5px" >
                        </div>
                    </div>
                <?php 
                    }
                } else { ?>
                <p>No image found...</p>
            <?php } ?>
        </div>
    </div>
    
</body>
<?php include"footer.php"; ?>
</html>