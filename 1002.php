<html>
<head>
<title>PROFILE</title>
<link rel="stylesheet" type="text/css" a href="profstyle.css">
<link rel="stylesheet" type="text/css" a href="records.css">
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
}?>
</head>
<body bgcolor="#CCDEDC">
<div>
<p align="justified"> <font color="green"><h3>REGISTRY</h3></font></p>
<?php
include("conn.php");
$qw=mysql_query("select*from staff where status=''");
$rwo=mysql_num_rows($qw);

echo"<font color='PURPLE' size=4>TOTAL NUMBER OF STAFF IN THE REGION==$rwo</FONT>";
?>
</div>

<p align="center"></p>
<div id="container" bgcolor="#541925">
<div id="aside">
<!--<a href="1002.php?cat=vstaff" title="vstaff"> &nbsp;View Staff</a>&nbsp <br /><br />
<a href="1002.php?cat=register" title="register"> &nbsp;Register Staff</a>&nbsp <br /><br />
<a href="1002.php?cat=leave" title="leave"> &nbsp;Apply Leave</a>&nbsp <br /><br />-->
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="vs"><input type="submit" name="submit" value="View Staff" onclick="view"></form>

<form id="side" method="POST" action=""><input type="hidden" name="cat" value="register"><input type="submit" name="submit" value="Register Staff" onclick="view"></form>

<form id="side" method="POST" action=""><input type="hidden" name="cat" value="leave"><input type="submit" name="submit" value="Leave Application" onclick="view"></form>
</div>
<div id="view">
<?php
if(isset($_POST['cat'])){$cat=$_POST['cat'];}

switch($cat){

case "vs";
//include("pagination.php");
echo"<form method='POST' action='1011.php'>
<P>VIEW STAFF BY PF No</P><BR>
PF/No:<input type='text' name='pfno' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='Search'>
</form>";
echo"<form method='POST' action='1012.php'>
<P>VIEW STAFF BY NAME</P><BR>
NAME:<input type='text' name='sname' required Placeholder='UPPER CASE ONLY' pattern=[A-Z ]+ >
<input type='submit' name='submit' value='Search'>
</form>";

echo"<form method='POST' action='1013.php'>
<P>VIEW STAFF BY SUB COUNTY</P><BR>
NAME:<select name='scounty' type='text' required >";
include("subcounties.php");
echo"</select>
<input type='submit' name='submit' value='Search'>
</form>";
break;

//LEAVE APPLICATION
case "leave";

echo"<form method='POST' action='9098.php'>
<p align='center'>GET OFFICER FOR WHICH LEAVE IS APPLIED</P><HR>
PF/No:<input type='text' name='pf' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='Search'>
</FORM>";


break;
// END OF PRINT RECORDS


//REGISTER STAFF
case "register";
?>
<form  method='POST' action='insertrec.php'>
<p align='center'>STAFF REGISTRATION</P><HR>
PF NUMBER:<input type='text' name='pfno' pattern='[0-9]+' placeholder='Pf no only' min='10' maxlength='10' required size='20'>&nbsp&nbsp
ID NO:<input type='text' name='idno'  placeholder='ID No only' pattern='[0-9]+' maxlength='8' min='8'required size='25'><br><br><HR>
NAME:<input type='text' name='apname'  pattern='[ A-Z ]+' placeholder='use uppercase'  maxlength='35' required size='25'><br><br><HR>
SEX:
<select name='sex'type='text' required >
<option value=''></option>
<option value='MALE'>MALE</option>
<option value='FEMALE'>FEMALE</option></select>
DESIGNATION:<select name='design' type='text'required >
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
<option value='SCH'>OAAA I</option>
<option value='OAAA I'>OAAA I</option>
<option value='OAA II'>OAAA II</option>
<option value='OAA III'>OAAA III</option>
<option value='SSS'>SSS</option>
<option value='SS'>SS</option>
<option value='F.O.III'>F.O.III</option>
<option value='F.O.II'>F.O.II</option>
<option value='F.O.I'>F.O.I</option>
<option value='CSIIB'>CSIIB</option>
<option value='CS1'>CS1</option>
<option value='SNR SEC'>SNR SEC</option>
<option value='SEC ASST I'>SEC ASST I</option>
<option value='CSIIA'>CSIIA</option>
<option value='PSI'>PSI</option>
<option value='CSIA'>CSIA</option>

</select>
JOB GROUP:<select name='jgroup' type='text' required >
<option value=''></option>
<?php include("jgroup.php");?>
</select><br><br><HR>
HIGHEST ACADEMIC QUALIFICATION:
<select name='academic' type='text' required >
<option value=''></option>
<option value='PHD'>PHD</option>
<option value='DOCTORATE'>DOCTORATE</option>
<option value='MASTERS'>MASTERS</option>
<option value='UNDERGRADUATE'>UNDERGRADUATE</option>
<option value='DIPLOMA'>DIPLOMA</option>
<option value='HIGHERDIPLOMA'>HIGHER DIPLOMA</option>
<option value='CERTIFICATE'>CERTIFICATE</option>
<option value='A-LEVEL'>A-LEVEL</option>
<option value='O-LEVEL'>O-LEVEL</option>
<option value='KCSE'>KCSE</option>
<option value='KCPE'>KCPE</option>
</select><br><hr>
TOS:<select name='tos' type='text' required >
<option value=''></option>
<?php include("tos.php");?>
</select>
DOB:<input type='date' name='dob' required>
DOFA:<input type='date' name='dofa' required><br><br><HR>
DOCA:<input type='date' name='doca' required >
STATION:<input type='text' name='st' maxlength='20' pattern='[A-Z ]+' placeholder='use uppercase' required size='25'><br><br><HR>
SUB COUNTY:<select name='scounty' type='text' required >
<?php
include('subcounties.php');?>

</select><br><hr>
HOME COUNTY:<select name='hcounty' type='text' required >
<?php
include("counties.php");
?>
</select>
MOBILE #:<input type='text' name='phone'  maxlength='10'pattern='[0-9]+' required><br><hr>
DATE RECORDED:<input type='date' name='drec'  required size='30'><br><HR>
<P align='center'><input type='submit' name='submit' value='SAVE'>
<input type='reset' name='cancel' value='CANCEL'></p>

</form>
<?php

break;
//END OF REGISTER STAFF


default:
	echo"<img src='images/ccc.jpg' width='1140' height='500'>";
}
?>
</div>
<div id="foot">
<p align="center">ALL RIGHTS RESERVED &copy<?php $Today = date('m:d:y'); $new = date('Y', strtotime($Today));
								echo $new;?> <br>
<p align="center">THE SSMS SYSTEM HAS BEEN DESIGNED AND DEVELOPED BY ALEX KAIRA</p>
</div>
</div>
</body>
<script type="text/javascript">
function view()
{
	document.getElementById("view");
}
function resview(){
	document.getElementById("resview");
}
</script>
</html>