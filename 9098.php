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
<body bgcolor="#CCDEDC">
<P ALIGN="center"><a href="1002.php">Home</A>&nbsp&nbsp</p>
<div id="cert" bgcolor="667585">

<?php
if(isset($_POST['pf'])){$pf=mysql_escape_string($_POST['pf']);}
echo"<form method='POST' action='9099.php'>

<p align='center'>LEAVE APPLICATION FORM</p><hr>
PF NUMBER::<input type='text' name='pfno' readonly value=$pf>
SUB-COUNTY::<select name='scounty' type='text' required >";
 
 include("subcounties.php");
 
 
echo"</select><br><br>
LEAVE TYPE::<select name='leavetyp' type='text'required>
<option value=''></option>
<option value='annual'>ANNUAL</option>
<option value='paternity'>PATERNITY</option>
<option value='maternity'>MATERNITY</option>
</select>
APPLICATION DATE::<input type='date' name='appdate' required><br><br><hr>
LEAVE TAKEN FROM::<input type='date' name='tfrom' required>
TO::<input type='date' name='leato' required><br><br><hr>
<input type='submit' name='submit' value='RECORD APPLICATION'>
</form>";


?>

</div>

</body>
</html>