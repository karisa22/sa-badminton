///////ยังใช้ไม่ได้////////
<?php
$servername = "localhost";
$username = "root";
$password = ""; //ถ้าไม่ได้ตั้งรหัสผ่านให้ลบ yourpassword ออก
$dbname = "badminton";

$conn = mysqli_connect($servername,$username ,$password,$dbname);

if (!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
  }

class DB_con {
    function __construct() {
            $conn = mysqli_connect($servername,$username ,$password,$dbname);
            $this->dbcon = $conn;
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($user_firstname, $user_lastname, $user_tel, $user_name,	$user_pass) {
            $result = mysqli_query($this->dbcon, "INSERT INTO users(user_firstname, user_lastname, user_tel, user_name,	user_pass) VALUES('$user_firstname', '$user_lastname', '$user_tel', '$user_name',	'$user_pass')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM user");
            return $result;
        }

        public function fetchonerecord($user_id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM user WHERE user_id = '$user_id'");
            return $result;
        }

        public function update($user_firstname, $user_lastname, $user_tel, $user_name,	$user_pass) {
            $result = mysqli_query($this->dbcon, "UPDATE user SET 
                user_firstname = '$user_firstname',
                user_lastname = '$user_lastname',
                user_tel = '$user_tel',
                user_name = '$$user_name',
                user_pass = '$$user_pass'
                WHERE user_id = '$user_id'
            ");
            return $result;
        }

        public function delete($user_id) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM user WHERE user_id = '$user_id'");
            return $deleterecord;
        }
    }
    
?>