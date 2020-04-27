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
<P ALIGN="center"><a href="1003.php">Home</A></p>
<?php
if(isset($_POST['pfno'])){(int)$pfno=mysql_escape_string($_POST['pfno']);}

include("conn.php");


$qry=mysql_query("select*from staff where pfno='$pfno' and status=''");


if($row=mysql_fetch_array($qry)){
	$pf=$row['pfno'];
	$name=$row['sname'];
	$dofa=$row['dofa'];
	$doca=$row['doca'];
	$idno=$row['id_no'];
	$des=$row['designation'];
	$jg=$row['jgroup'];
	$st=$row['station'];
	$dofa=$row['dofa'];
	$doca=$row['doca'];
	$scounty=$row['scounty'];
	$hcounty=$row['hcounty'];
	$contact=$row['contact'];
	$hacademic=$row['hacademic'];
	$tos=$row['tos'];
	$sex=$row['sex'];
	$pq=$row['pq'];
	

  echo"<form method='POST' action='1017.php'>
  <P align='center'>STAFF RECORD</P>
  PF/No:<input type='text' name='pf' size=8  pattern=[A- Z]+  value='$pf'>
  Staff Name:<input type='text' name='ssname' size=30  value='$name'><br><br>
  ID No:<input type='text' name='idno' value='$idno'><hr><br>
  DESIGNATION:<select name='design' required>
  <option value=''>$des</option>";
  include("design2.php");
  echo"
  Job Group:<select name='jgroup' required>
  <option value=''>$jg</option>";
  include("jgroup.php");
  echo"</select>
  Station:<input type='text' name='station' readonly value='$st'><hr><br>
  Sub-County:<input type='text' name='scounty' readonly value='$scounty'>
  Home County:<input type='text' name='hcounty' size=8 value='$hcounty'>
  Contact:<input type='text' name='contact' value='$contact'><hr><br>
  Highest Academic Level:<select name='hacademic' required>
  <option value=''>$hacademic</option>";
  include("hacad.php");
  echo"
  Terms of Service:<select name='tos' required>
  <option value=''>$tos</option>";
		include("tos.php");
		echo"</select>&nbsp<br><br>
		Professional Qualification::<input type='text' name='pq' pattern=[A- Z]+ value='$pq'>
  Gender<input type='text' name='sex' size=6 value='$sex'><hr><br>
  New Sub-County:<select name='nscounty' type='text' required >";
include("subcounties.php");
echo"</select><br><hr>
New Station:<input type='text' name='nstation' required pattern=[A- Z ]+><br><hr>
<input type='submit' name='submit' value='UPDATE'>
  </form>";
  
  
}
else{
	//echo"<font color='red' size=10>YOU DO NOT HAVE A STAFF BY THE PF/NO:$pfno</font>";
//break;	
}
mysql_close($conn);
 include("footer.php");
?>
</body>
</html>