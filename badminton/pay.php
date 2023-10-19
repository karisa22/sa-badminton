<?php include"header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
.h3{
    position: center;
    margin-top: 20px;
}
</style>
<body>
    <br>
    <div align = center><h2>การชำระเงิน</h2></div>
    <div align = center><h5>เลขที่การจอง</h5></div>
    <br>
    <div align = center><img src="images/95.jpg" style="height: 500px; width: 600px; "></div>

    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <form action="upload_rules.php" method="POST" enctype="multipart/form-data">
                    <div class="text-center justify-content-center align-items-center p-4 border-2 border-dashed rounded-3">
                        <h6 class="my-2">แนบสลิปการโอนเงิน</h6>
                        <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png">
                        <br>
                         <input type="submit" name="submit_rules" value="อัพโหลด" class="btn btn-sm btn-primary" style = "float:right;">
                    </div>
                    <div class="d-sm-flex justify-content-end">
                       
                        
                    </div>
                    <br>
                </form>
            </div>
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



</body>
<?php include"footer.php"; ?>
</html>