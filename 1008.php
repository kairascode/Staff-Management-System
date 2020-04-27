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
<?php
if(isset($_POST['pfno'])){(int)$pfno=mysql_escape_string($_POST['pfno']);}

include("conn.php");


$qry=mysql_query("select*from staff where pfno='$pfno'");


if($row=mysql_fetch_array($qry)){
	$pf=$row['pfno'];
	$name=$row['sname'];
	$idno=$row['id_no'];
	$des=$row['designation'];
	$jg=$row['jgroup'];
	$st=$row['station'];
	$scounty=$row['scounty'];
	$hcounty=$row['hcounty'];
	$contact=$row['contact'];
	$hacademic=$row['hacademic'];
	$tos=$row['tos'];
	$sex=$row['sex'];
	

  echo"<form method='POST' action='1009.php'>
  <P align='center'>STAFF RECORD</P>
  PF/No:<input type='text' name='pf' size=8 readonly value='$pf'>
  Staff Name:<input type='text' name='ssname' size=30 readonly value='$name'>
  ID No:<input type='text' name='idno' readonly value='$idno'><hr><br>
  Designation:<input type='text' name='designation' readonly value='$des'>
  Job Group:<input type='text' name='jgroup' size=5 readonly value='$jg'>
  Station:<input type='text' name='station' readonly value='$st'><hr><br>
  Sub-County:<input type='text' name='scounty' readonly value='$scounty'>
  Home County:<input type='text' name='hcounty' size=8 readonly value='$hcounty'>
  Contact:<input type='text' name='contact' readonly value='$contact'><hr><br>
  Highest Academic Level:<input type='text' name='hacademic' size=12 readonly value='$hacademic'>
  Terms of Service:<input type='text' name='tos' size=8 readonly value='$tos'>
  Gender<input type='text' name='sex' size=6 readonly value='$sex'><hr><br>
  Select the Sub-County which you wish transfer $name:<select name='nscounty' type='text' required >
";
include('subcounties.php');
echo"</select><hr>
New Station:<input type='text' name='nstation' required pattern=[A-Z ]+><br><hr>
<input type='submit' name='submit' value='Transfer'>
  </form>";
  
}
else{
	echo"<font color='red' size=10>YOU DO NOT HAVE A STAFF BY THE PF/NO:$pfno</font>";
//break;	
}
mysql_close($conn);
 include("footer.php");
?>
</body>
</html>