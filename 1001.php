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
<div>
<p align="justified"> <font color="green"><h3>REGIONAL REGISTRAR</h3></font></p>
<?php
include("conn.php");
$qw=mysql_query("select*from staff where status=''");

$rwo=mysql_num_rows($qw);

echo"<font color='PURPLE' size=4>TOTAL NUMBER OF STAFF IN THE REGION==$rwo</FONT>";
?>
</div>
<div id="container" bgcolor="#541925">
<div id="aside">
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="vs"><input type="submit" name="submit" value="View Staff" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="transfer"><input type="submit" name="submit" value="Transfer Staff" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="promote"><input type="submit" name="submit" value="Promote Staff" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="statistics"><input type="submit" name="submit" value="Staff Statistics" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="apraise"><input type="submit" name="submit" value="Appraise Staff" onclick="view"></form>
</div>

<div id="view">
<?php
if(isset($_POST['cat'])){$cat=$_POST['cat'];}

switch($cat){
//View staff
case "vs";
//include("pagination.php");
echo"<form method='POST' action='1004.php'>
<P>VIEW STAFF BY PF No</P><BR>
PF/No:<input type='text' name='pfno' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='Search'>
</form>";
echo"<form method='POST' action='1005.php'>
<P>VIEW STAFF BY NAME</P><BR>
NAME:<input type='text' name='sname' required Placeholder='UPPER CASE ONLY' pattern=[A- Z]+ maxlength='35'>
<input type='submit' name='submit' value='Search'>
</form>";

echo"<form method='POST' action='1006.php'>
<P>VIEW STAFF BY SUB COUNTY</P><BR>
NAME:<select name='scounty' type='text' required >";
include("subcounties.php");
echo"</select>
<input type='submit' name='submit' value='Search'>
</form>";
break;

//TRANSFERS
case "transfer";

echo"
<form method='POST' action='1008.php'>
<P>SEARCH STAFF MEMBER YOU WISH TO TRANSFER</P><BR>
PF/No:<input type='text' name='pfno' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='Search'>
</form>";
break;
// END OF TRANSFERS



//PROMOTE
case "promote";
echo"
<form method='POST' action='1007.php'>
<P>SEARCH STAFF MEMBER YOU WISH TO PROMOTE</P><BR>
PF/No:<input type='text' name='pfno' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='SEARCH'>
</form>";

break;	
//END OF PROMOTION

//REGISTER STAFF
case "statistics";
include("1018.php");

break;
//END OF REGISTER STAFF
//APPRAISE STAFF
case "apraise";
echo"
<form method='POST' action='1010.php'>
<P>SEARCH STAFF MEMBER YOU WISH TO APPRAISE</P><BR>
PF/No:<input type='text' name='pfno' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='SEARCH'>
</form>";


break;
default:
	echo"<img src='images/bb.jpg' width='1140' height='500'>";
}
mysql_close($conn);
?>
</div>
<?php
include("footer.php");
?>
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