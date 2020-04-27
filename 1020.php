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

$Q=mysql_query("select* from staff where pfno='$pfno' ");

//$rt=mysql_num_rows($Q);




if($rt=mysql_num_rows($Q)>=1){
	
	$qry=mysql_query("delete from staff where pfno='$pfno'");
	
	$pf=$row['pfno'];
	$name=$row['sname'];
	
	

  echo"The staff with PF/No $pfno has been deleted....";
  
  
}
else{
	echo"<font color='red' size=10>YOU DO NOT HAVE A STAFF BY THE PF/NO:$pfno</font>";	
}
mysql_close($conn);
 include("footer.php");
?>
</body>
</html>