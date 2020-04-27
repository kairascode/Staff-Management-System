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
<body bgcolor="#FFDEDC">
<P ALIGN="center"><a href="1001.php">Home</A>&nbsp&nbsp|||&nbsp&nbsp<input type='button' value='print Record' onClick='printDiv(cert);'/></p>
<div id="cert">
<?php
<form method='POST' action=''>
include('desig.php');

NO OF STAFF<input type='text'value=''>
</form>
include("conn.php");
if(isset($_POST['typa'])){$typa=mysql_escape_string($_POST['typa']);}

$nostaff=mysql_query('SELECT count(*) FROM `staff` WHERE `designation` like '%$typa%' and `status`=''');

?>
</body>
</html>