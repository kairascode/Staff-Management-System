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
<P ALIGN="center"><a href="1001.php">Home</A></p>
<?PHP
if(isset($_POST['pf'])){$pfno=mysql_escape_string($_POST['pf']);}
if(isset($_POST['jgroup'])){$jgroup=mysql_escape_string($_POST['jgroup']);}
if(isset($_POST['design'])){$designation=mysql_escape_string($_POST['design']);}
if(isset($_POST['sname'])){$ssname=mysql_escape_string($_POST['sname']);}

  include("conn.php");
  $qry2=mysql_query("update staff set jgroup='$jgroup',designation='$designation' where pfno='$pfno'");
  $row=mysql_num_rows($qry2);
  if($row==1){
	   echo"Challenge in promoting the officer.Please try again";
  }
  else{
	  echo"$sname";
	echo"<font color='green' size=5>$ssname has successfully been promoted to Job group $jgroup . New designation is $designation</FONT>"; 
  }
  mysql_close($conn);
   include("footer.php");
  ?> 
                                       
</body>
</html>