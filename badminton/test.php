<?php
include("dbconnect.php") ;
$date=$_GET['date'];
if($_GET['date']=='')
{
	//echo "test";
	    $day1 = date("Y-m-d", time()) ;
	//	echo $day1;

$result = mysql_query("select * from booking where book_date ='$day1'");
while ($data = mysql_fetch_array($result) ) 
	{
echo "สนาม";
echo $data[field_id];
echo "เวลา";
echo $data[book_time];
echo "<br>";
	}

}
else
{

$result = mysql_query("select * from booking where book_date ='$_GET[date]'");
while ($data = mysql_fetch_array($result) ) 
	{
echo "สนาม";
echo $data[field_id];
echo "เวลา";
echo $data[book_time];
echo "<br>";
	}
}
echo '<br>';
$result = mysql_query("select * from time where time_status=1 order by time_id ASC");
while ($data = mysql_fetch_array($result) ) 
	{
echo $data[time_id];
echo "<br>";
	}




?>




<?
$date=$_GET['date']; 
 $day2 = date("Y-m-d", time()) ;
if ( $date =="" or $date==$day2)
	{
    $day1 = date("Y-m-d", time()) ;
	 $hours1 = date("H:i:s", time()) ;
   $hours2 = date("H", time()) ;
	include("dbconnect.php") ;
  $result = mysql_query("select * from time where time_status=1 ORDER BY time_id ASC");
  while ($data = mysql_fetch_array($result) )
	  {
	  if ( $data[time_id] <= $hours2+3)
		  {
	//  echo $data[time_id]; 
	//  echo "จองไม่ได้<br>";
		  }
		  else
			  	  {
	//  echo $data[time_id]; 
	//  echo "จองได้จ้า<br>";
		  }
	}
	}
	else

	{
//echo date("Y-m-d : H:i:s", strtotime("+0 day", strtotime($date)));
//echo "วันอื่นไม่ต้องทำไร";
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874" /><?php
session_start();
$ses_userid =$_SESSION[ses_userid];
$ses_username = $_SESSION[ses_username];
if($ses_userid <> session_id() or  $ses_username ==""){
echo "คุณยังไม่ได้ทำการ Log in";
echo "<meta http-equiv='refresh' content='2;URL=index.php' />";
}	else {
?>

<center><b><?
$date=$_GET['date']; 
if ( $date =="")
	{
	$thai_w=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
    $thai_n=array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $w=$thai_w[date("w")];
    $d=date("d");
    $n=$thai_n[date("n") -1];
     $y=date("Y") +543;
	//echo "วัน$w ที่ $d $n $y";
	  echo "จองสนาม ";
		echo "วันที่ $d $n พ.ศ. $y";
	}

else
	{
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
       $strMonthCut1 = Array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
		$strMonthThai=$strMonthCut[$strMonth];
		return "จองสนาม วันที่ $strMonthThai1$strDay $strMonthThai พ.ศ. $strYear";
	}
		$strDate = $date;
	echo DateThai($strDate);

	}
?></center></b>
<center><form id="form1" name="form1" method="post" action="booking-add.php">


<?
$objConnect = mysql_connect("localhost","root","mi43eu2t") or die("Error Connect to Database");
$objDB = mysql_select_db("football");
mysql_query("SET NAMES TIS620");
$strSQL = "SELECT * FROM footballfield";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
$objQuery  = mysql_query($strSQL);
//echo $Num_Rows;
?>
<center><a href="booking1.php?date=<?php 
$date=$_GET['date']; 
if ( $date =="")
	{
	echo date('Y-m-d', strtotime('+1 day'));
	}
else
	{
	echo date("Y-m-d", strtotime("+1 day", strtotime($date)));
	}

?>">วันถัดไป</a></center>
<table border="0" cellpadding="2" cellspacing="1" width="25%">
  <tbody>
    <tr bgcolor="#073603">
      <td rowspan="2" width="20%"><div align="center"><font color="FFFFFF">เวลา<br>
        (นาฬิกา)<font></div></td><td colspan="<?echo $Num_Rows;?>" height="30"><div align="center">
        <div align="center" ><font color="FFFFFF">สนาม</font></div>
      </div></td>
    </tr>
    <tr>
<?php
include("dbconnect.php") ;
$result = mysql_query("select * from footballfield");
while ($data = mysql_fetch_array($result) ) 	
	{
echo '<td bgcolor="#085b00">
	  <div align="center"><font color="FFFFFF">';
       echo $data[f_name];
 echo '</font></div></div></td>';
    	}
?>

<?
$date=$_GET['date']; 
 $day2 = date("Y-m-d", time()) ;
 include("dbconnect.php") ;

$objConnect = mysql_connect("localhost","root","mi43eu2t") or die("Error Connect to Database");
$objDB = mysql_select_db("football");
mysql_query("SET NAMES TIS620");
$strSQL = "SELECT * FROM time where time_status=1";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
$objQuery  = mysql_query($strSQL);
//echo $Num_Rows;
$objConnect1 = mysql_connect("localhost","root","mi43eu2t") or die("Error Connect to Database");
$objDB1 = mysql_select_db("football");
mysql_query("SET NAMES TIS620");
$strSQL1 = "SELECT * FROM footballfield";
$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysql_num_rows($objQuery1);
$objQuery1  = mysql_query($strSQL1);
//echo $Num_Rows1;
$Num_Rows1 = $Num_Rows1+1;
$result = mysql_query("select * from time where time_status=1 order by time_id ASC ");
while ($data = mysql_fetch_array($result) ) 
	{
   echo '</tr>
    <tr><td bgcolor="#acacac"><div align="center"><font color="FFFFFF">';
   echo $data[time_name];
      echo '</font></div></td>';

   for ($a = 1 ; $a <$Num_Rows1 ;$a++)
{
	   if ( $date =="" or $date==$day2)
	{
	    if ( $data[time_id] <= $hours2+3)
		{
        echo '<td bgcolor="#78b516"><div align="center"><input  type="checkbox" name="';
        echo 'time[]';
        echo '" disabled="disabled"><br><font color="FFFFFF">ว่าง</font></div></td>';
		}
		else
		{
     echo '<td bgcolor="#78b516"><div align="center"><input  type="checkbox" name="';
        echo 'time[]';
        echo '" value="';
        echo $a;
         echo '_';
         echo $data[time_id];
		echo	'"><br><font color="FFFFFF">ว่าง</font></div></td>';
		}
	}
	else 
	{
	     echo '<td bgcolor="#78b516"><div align="center"><input type="checkbox" name="';
           echo 'time[]';
        echo '" value="';
		 echo $a;
		 echo '_';
         echo $data[time_id];
		echo '"><br><font color="FFFFFF">ว่าง</font></div></td>';
	}
}

    	}

?>  
    </tr>
  <?php	
	include("dbconnect.php") ;
  $result = mysql_query("select * from customer where cus_username ='$_SESSION[ses_username]' ");
  while ($data = mysql_fetch_array($result) )
	  {
	  echo '</tbody></table></center><center><input name="cus_id" type="hidden" id="cus_id"  value="';
	  echo $data[cus_id];     echo '">';}?> <input name="date" type="hidden" id="date"  value="<?php 
$date=$_GET['date']; 
if ( $date =="")
	{
	echo date('Y-m-d') ;
	}
else
	{
	echo date("Y-m-d", strtotime("+0 day", strtotime($date)));
	}

?>"><input type="submit" name="Submit" value="Submit"></center>
</form>

<?php
}
?>