///////ยังใช้ไม่ได้////////
<--?php
function connectDB()
{
    $serverName = "127.0.0.1";
    $userName = "root";
    $userPassword = "";
    $dbName = "badminton";

    
    $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
    mysqli_set_charset($objCon, "utf8");
    return $objCon;
}
    $objCon = insert($admin_firstname, $admin_lastname, $admin_tel, $admin_name,	$admin_pass) {
        $result = mysqli_query($this->dbcon, "INSERT INTO admin(firstname, lastname,  tel, username, password) VALUES('$admin_firstname', '$admin_lastname', '$admin_tel', '$admin_name',	'$admin_pass')");
        return $result;
}-->
