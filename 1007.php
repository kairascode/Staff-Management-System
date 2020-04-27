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
	

  echo"<form method='POST' action='1010.php'>
  <P align='center'>PROMOTION DASHBOARD</P><HR>
  PF/No:<input type='text' name='pf' size=10 readonly value='$pf'>
  Staff Name:<input type='text' name='sname'  readonly value='$name'>
  ID No:<input type='text' name='idno' readonly value='$idno'><hr><br>
  Designation:<input type='text' name='designation' readonly value='$des'>
  Job Group:<input type='text' name='jgroup' size=5 readonly value='$jg'>
  Station:<input type='text' name='station' readonly value='$st'><hr><br>
  Sub-County:<input type='text' name='scounty' readonly value='$scounty'>
  Home County:<input type='text' name='hcounty' size=10 readonly value='$hcounty'>
  Contact:<input type='text' name='contact' size=7 readonly value='$contact'><hr><br>
  Highest Academic Level:<input type='text' name='hacademic' size=12 readonly value='$hacademic'>
  Terms of Service:<input type='text' name='tos' size=8 readonly value='$tos'>
  Gender<input type='text' name='sex' size=6 readonly value='$sex'><hr><br>
  Select Job Group::<select name='jgroup' type='text' required >
<option value=''></option>
<option value='N'>N</option>
<option value='M'>M</option>
<option value='L'>L</option>
<option value='K'>K</option>
<option value='J'>J</option>
<option value='H'>H</option>
<option value='G'>G</option>
<option value='F'>F</option>
<option value='E'>E</option>
<option value='D'>D</option>
</select> and Designation::<select name='design' type='text'required >
<option value=''></option>
<option value='PRO'>PRO</option>
<option value='CRO'>CRO</option>
<option value='SRO'>SRO</option>
<option value='ROI'>ROI</option>
<option value='ROII'>ROII</option>
<option value='ROIII'>ROIII</option>
<option value='SCO'>SCO</option>
<option value='COI'>COI</option>
<option value='COII'>COII</option>
<option value='DRIVER I'>DRIVER I</option>
<option value='DRIVER II'>DRIVER II</option>
<option value='DRIVER III'>DRIVER III</option>
<option value='OAAA I'>OAAA I</option>
<option value='OAAA II'>OAAA II</option>
<option value='OAAA III'>OAAA III</option>
<option value='SSS'>SSS</option>
<option value='SS'>SS</option>
<option value='F.O.III'>F.O.III</option>
<option value='F.O.II'>F.O.II</option>
<option value='F.O.I'>F.O.I</option>
<option value='CSII'>CSII</option>
<option value='CS1'>CS1</option>
<option value='SNR SEC'>SNR SEC</option>
<option value='SEC ASST I'>SEC ASST I</option>
<option value='CSIIA'>CSIIA</option>
<option value='PSI'>PSI</option>
<option value='CSIA'>CSIA</option>
<option value=''></option>
</select> you wish to promote $name to<br><hr>
<input type='submit' name='submit' value='Promote' onclick='verify'>
  </form>";
}
else{
	echo"<font color='red' size=10>YOU DO NOT HAVE A STAFF BY THE PF/NO:$pfno</font>";
//break;	
}
mysql_close($conn);
 include("footer.php");
?>
<script>
</script>
</body>
</html>