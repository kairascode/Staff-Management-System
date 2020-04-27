<html>
<head>
<?php 
session_start();
include("header.php");
if(!isset($_SESSION['loggedin']))
{
	//$_SESSION['username']=$username;
header("location:index.php");
exit;
}
else{
	$username=$_SESSION['username'];
echo"<p align='right'><h3><font color='#665743'>You are logged in as $username  </h3></font></p>";
}?>
</head>
<body bgcolor="#CCDEDC">
<a href="1002.php">HOME</a>&nbsp&nbsp|||&nbsp&nbsp<a href="logout.php">LOGOUT</a><BR>
<?php
if(isset($_POST['pfno'])){(int)$pfno=mysql_escape_string($_POST['pfno']);}
if(isset($_POST['idno'])){(int)$idno=mysql_escape_string($_POST['idno']);}
if(isset($_POST['jgroup'])){$jgroup=mysql_escape_string($_POST['jgroup']);}
if(isset($_POST['apname'])){$apname=mysql_escape_string($_POST['apname']);}
if(isset($_POST['sex'])){$sex=mysql_escape_string($_POST['sex']);}
if(isset($_POST['dob'])){$dob=mysql_escape_string($_POST['dob']);}
if(isset($_POST['dofa'])){$dofa=mysql_escape_string($_POST['dofa']);}
if(isset($_POST['phone'])){(int)$phone=mysql_escape_string($_POST['phone']);}
if(isset($_POST['drec'])){$drec=mysql_escape_string($_POST['drec']);}
/////////A.K.K////////
if(isset($_POST['st'])){$station=mysql_escape_string($_POST['st']);}
if(isset($_POST['design'])){$designation=mysql_escape_string($_POST['design']);}
if(isset($_POST['academic'])){$academic=mysql_escape_string($_POST['academic']);}
if(isset($_POST['doca'])){$doca=mysql_escape_string($_POST['doca']);}
if(isset($_POST['tos'])){$tos=mysql_escape_string($_POST['tos']);}
if(isset($_POST['scounty'])){$scounty=mysql_escape_string($_POST['scounty']);}
if(isset($_POST['hcounty'])){$hcounty=mysql_escape_string($_POST['hcounty']);}

//echo"$hcounty";
include("conn.php");

$sql=mysql_query("select* from staff where pfno='$pfno'");
$row=mysql_num_rows($sql);
if($row==0){
$qry=mysql_query("INSERT INTO staff(pfno,id_no,sname,sex,designation,jgroup,hacademic,tos,dob,dofa,doca,station,scounty,hcounty,contact,drecorded,recordedBy,remarks)VALUES
('$pfno','$idno','$apname','$sex','$designation','$jgroup','$academic','$tos','$dob','$dofa','$doca','$station','$scounty','$hcounty','$phone','$drec','$username','')");

echo"<p><font color='BLUE' size='8'type='bold'>$apname has been recorded</font></p>";
}
else if($row!==0){
	echo"<font color='RED' size='8'type='bold'>$apname IS ALREADY IN THE SYSTEM</font></p>";
}


mysql_close($conn);
 include("footer.php");
?>
</body>
</html>