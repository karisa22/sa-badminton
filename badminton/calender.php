<?php 
    // Create connection
    $condb = new mysqli('localhost', 'root', '', 'badminton');

    // Check Connection


    $sql = "SELECT * FROM member";
    $result = $condb->query($sql);
    include"headeradmin.php";
?>


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
body{
  min-height: 100vh;
}

</style>
<body>
    <div class="col-md-6 form-group">
                <label>เลือกคอร์ท</label>
                <select class="form-control" name="zoneid" id="zoneid">
        <option value="1">คอร์ทที่ 1</option>
        <option value="2" selected="selected">คอร์ทที่ 2</option>
        <option value="3">คอร์ทที่ 3</option>
        <option value="4">คอร์ทที่ 4</option>
        <option value="5">คอร์ทที่ 5</option>
        <option value="6">คอร์ทที่ 6</option>
    </select>
</div>
       <div class="col-md-4 form-group">
                <label>เลือกวันที่</label>
                <input type="date" class="form-control" id="date" name="date" min="2023-08-29" max="2023-09-05" value="2022-12-27" />
                **สามารถจองล่วงหน้าได้ไม่เกิน 7 วัน
            </div>
            <div class="col-md-2 form-group"> <br>
                <button type="submit" class="btn btn-success btn-block"> ตกลง</button>
            </div>
        </div>
        <div class="col-md-12">

<a class="btn btn-secondary">&nbsp;&nbsp;</a> ว่าง <a class="btn btn-warning">&nbsp;&nbsp;</a> อยู่ระหว่างรอเจ้าหน้าที่ตรวจสอบ <a class="btn btn-success">&nbsp;&nbsp;</a> มีการจอง <br>
<font color="red">** จองได้ครั้งละ 1 ช่วงเวลา</font>
<hr>
                                    
         <h3>คอร์ทที่ 1</h3>
            <div class="row">
             <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
             <a href="#" class="btn btn-success btn-block">18:00-18:30<br>
                 </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">18:30-19:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:00-19:30<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:30-20:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">20:00-20:30<br>
            </a>
            </div>
            </div>
            <h3>คอร์ทที่ 2</h3>
            <div class="row">
             <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
             <a href="#" class="btn btn-success btn-block">18:00-18:30<br>
                 </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">18:30-19:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:00-19:30<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:30-20:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">20:00-20:30<br>
            </a>
            </div>
            </div>
            <h3>คอร์ทที่ 3</h3>
            <div class="row">
             <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
             <a href="#" class="btn btn-success btn-block">18:00-18:30<br>
                 </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">18:30-19:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:00-19:30<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:30-20:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">20:00-20:30<br>
            </a>
            </div>
            </div>
            <h3>คอร์ทที่ 4</h3>
            <div class="row">
             <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
             <a href="#" class="btn btn-success btn-block">18:00-18:30<br>
                 </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">18:30-19:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:00-19:30<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:30-20:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">20:00-20:30<br>
            </a>
            </div>
            </div>
            <h3>คอร์ทที่ 5</h3>
            <div class="row">
             <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
             <a href="#" class="btn btn-success btn-block">18:00-18:30<br>
                 </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">18:30-19:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:00-19:30<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:30-20:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">20:00-20:30<br>
            </a>
            </div>
            </div>
            <h3>คอร์ทที่ 6</h3>
            <div class="row">
             <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
             <a href="#" class="btn btn-success btn-block">18:00-18:30<br>
                 </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">18:30-19:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:00-19:30<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">19:30-20:00<br>
            </a>
            </div>
            <div class="col-md-2 col-sm-6" style="padding: 0.1cm;">
            <a href="#" class="btn btn-success btn-block">20:00-20:30<br>
            </a>
            </div>
            </div>


            <?php
                if(isset($_POST['submit']))
                {
                     $deli_name=$_POST['deli_name'];
                     $deli_detail=$_POST['deli_detail'];
		     $deli_wan=$_POST['deli_wan'];
                     $deli_datejob = $_POST['deli_datejob'];
                     $deli_datein=date('Y-m-d H:i:s');
                                    {
                    $sql=" insert into tb_delivery(deli_name,deli_detail,deli_wan,deli_datejob,deli_datein)";
					
                    $sql.=" values ('$deli_name','$deli_detail','$deli_wan','$deli_datejob','$deli_datein')";

                    if($cls_con->write_base($sql))
                    {
                     echo $cls_con->show_message('บันทึกข้อมูลสำเร็จ');
                     
                     echo $cls_con->goto_page(1,'index2.php');
                   
                  }
                  else{
                    echo $cls_con->show_message('บันทึกข้อมูลไม่สำเร็จ');

                  }

                }
                }

                ?>
</body>
<?php include"footer.php"; ?>
</html>