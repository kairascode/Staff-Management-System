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
<P ALIGN="center"><a href="1001.php">Home</A>&nbsp&nbsp|||&nbsp&nbsp<a href="logout.php">Logout</A></p>
<?PHP
if(isset($_POST['pf'])){$pfno=mysql_escape_string($_POST['pf']);}
if(isset($_POST['ssname'])){$ssname=mysql_escape_string($_POST['ssname']);}
//if(isset($_POST[''])){$name=mysql_escape_string($_POST['sname']);}
if(isset($_POST['nstation'])){$nst=mysql_escape_string($_POST['nstation']);}
if(isset($_POST['nscounty'])){$nscounty=mysql_escape_string($_POST['nscounty']);}

  include("conn.php");
  $qry2=mysql_query("update staff set station='$nst',scounty='$nscounty' where pfno='$pfno'");
  $row=mysql_num_rows($qry2);
  if($row==1){
	   echo"Challenge in transferring the officer.Please try again";
  }
  else{
	  echo"$sname";
	echo"<font color='green' size=5>$ssname has successfully been transfered to $nst station in $nscounty Sub county</FONT>"; 
  }
  mysql_close($conn);
   include("footer.php");
  ?>
</body>
</html>