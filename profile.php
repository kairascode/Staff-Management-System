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
<body bgcolor="#FFDEDC">
<p align="center"></p>
<div id="container" bgcolor="#541925">
<div id="aside">
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="vs"><input type="submit" name="submit" value="View Staff" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="transfer"><input type="submit" name="submit" value="Transfer Staff" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="promote"><input type="submit" name="submit" value="Promote Staff" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="register"><input type="submit" name="submit" value="Register Staff" onclick="view"></form>
</div>
<div id="view">
<?php
if(isset($_POST['cat'])){$cat=$_POST['cat'];}

switch($cat){

case "vs";
echo"<form method='post' action='search2.php'>
VIEW CRITERIA:<select name='criteria' required>
<option value=''></option>
<option value='pfno'>By PF Number</option>
<option value='name'>By Name</option>
<option value='serialno'>ID CARD NO</option>
<option value='name'>By name</option>
<option value='station'>Station</option>
<option value='county'>By name</option>
<option value='jbgroup'>By Job Group</option>
<option value='design'>By Designation</option>
</select>
<input type='text' name='search' maxlength='35' pattern='[0-9]+' required>
<input type='submit' name='chooser' value='View' onclick='resview'>
</form>";
break;

//TRANSFERS
case "transfer";


break;
// END OF TRANSFERS



//PROMOTE
case "promote";


break;	
//END OF PROMOTION

//REGISTER STAFF
case "register";


break;
//END OF REGISTER STAFF
default:
	echo"<img src='images/bb.jpg' width='1140' height='500'>";
}
mysql_close($conn);
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