<?php
session_start();
if (isset($_GET['id'])) {
    require_once '../common/connect.php';
    $user_id = $_SESSION["user_id"];
    $id = $_GET['id'];
    // $sql = "DELETE FROM t_user WHERE user_id='$id'";
    $sql_update = "UPDATE
                                `t_booking`
                            SET
                                `booking_status` = '2' , edit_date = NOW() , edit_by = '$user_id'
                            WHERE
                                `booking_id` = $id;";

    $result = mysqli_query($conn, $sql);

    //  sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($result) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เปลี่ยนสถานะสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "../booking_list.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    } else {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "../booking_list.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    mysqli_close($conn);
    $conn = null;
} //isset
