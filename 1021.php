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
echo"<h3><p align='right'><font color='orange'>You are logged in as $username &nbsp&nbsp&nbsp&nbsp <a href='logout.php'>click here to logout</a> </font></p></h3>";
}
?>
<link rel="stylesheet" type="text/css" a href="records.css">
</head>
<body bgcolor="#000000">
<P ALIGN="center"><a href="1003.php">Home</A>&nbsp&nbsp</p>
<?php
if(isset($_POST['pfno'])){(int)$pfno=mysql_escape_string($_POST['pfno']);}

include("conn.php");


$qry=mysql_query("update staff set status='RETIRED' where pfno='$pfno'");
$row=mysql_fetch_array($qry);

if($row>0){
	$name=$row['sname'];
	
	

  echo"$name has been successfully retired from the System following attainment of 60 years";
  
  
}
else if($row==0){
	echo"<font color='red' size=10>YOU DO NOT HAVE A STAFF BY THE PF/NO:$pfno</font>";	
}
mysql_close($conn);
 include("footer.php");
?>
</body>