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
<body bgcolor="#000000">
<p align="justified"> <font color="green"><h3>SYSTEM ADMIN</h3></font></p>
<p align="center"></p>
<div id="container" bgcolor="#541925">
<div id="aside">
<a href="1003.php?cat=activate" title="activate"> &nbsp;Activate User</a>&nbsp <br /><br />
<a href="1003.php?cat=deactivate" title="deactivate"> &nbsp;Deactivate User</a>&nbsp <br /><br />
<a href="1003.php?cat=deleteUser" title="deleteUser"> &nbsp;Delete Staff</a>&nbsp <br /><br />
<a href="1003.php?cat=retireStaff" title="retireStaff"> &nbsp;Retire Staff</a>&nbsp <br /><br />
<a href="1003.php?cat=update" title="update"> &nbsp;Update Records</a>&nbsp <br /><br />
<a href="1003.php?cat=1078" title="1078"> &nbsp;Add Subcounty</a>&nbsp <br /><br />
<a href="1003.php?cat=returns" title="returns"> &nbsp;Returns</a>&nbsp <br /><br />
<!--<a href="1003.php?cat=pq" title="pq"> &nbsp;Professional Q update</a>&nbsp <br /><br />
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="activate"><input type="submit" name="submit" value="Activate User" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="deactivate"><input type="submit" name="submit" value="Deactivate User" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="deleteUser"><input type="submit" name="submit" value="Delete Staff" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="retireStaff"><input type="submit" name="submit" value="Retire Staff" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="update"><input type="submit" name="submit" value="UpdateRecords" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="1078"><input type="submit" name="submit" value="AddSubcounty" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="returns"><input type="submit" name="submit" value="Returns" onclick="view"></form>-->
</div>
<div id="view">
<?php
if(isset($_GET['cat'])){$cat=$_GET['cat'];}

switch($cat){
//ACTIVATE USER
case "activate";
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
//END OF ACTIVATE USER

//DEACTIVATE USER
case "deactivate";


break;
// END OF DEACTIVATE USER


//DELETE USER
case "deleteUser";
echo"<form method='POST' action='1020.php'>
<P>DELETE STAFF </P><BR>

PF/No:<input type='text' name='pfno' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='Search'>
</form>";

break;
//END OF DELETE USER
//UPDATE STAFF RECORD
case "update";
echo"<form method='POST' action='1015.php'>
<P>UPDATE STAFF BY PF No</P><BR>
PF/No:<input type='text' name='pfno' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='Search'>
</form>";

echo"<form method='POST' action='1016.php'>
<P>UPDATE STAFF BY SUB COUNTY</P><BR>
NAME:<select name='scounty' type='text' required >";
include("subcounties.php");
echo"</select>
<input type='submit' name='submit' value='Search'>
</form>";

break;
// END OF UPDATE STAFF RECORD

case"retireStaff";
echo"<form method='POST' action='1021.php'>
<P>RETIRE STAFF </P><BR>

PF/No:<input type='text' name='pfno' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='Search'>
</form>";
break;

case"1078";
include("1078.php");
break;
case"returns";
include("rets.php");
break;

/*case"";
//include("pqupdate.php");
echo"<form method='POST' action='pqupdate.php'>
<P>SELECT STAFF USING PF No</P><BR>
PF/No:<input type='text' name='pfno' required Placeholder='PF/No only' pattern=[0-9]+ maxlength='10'>
<input type='submit' name='submit' value='SELECT'>
</form>";
break;*/
default:
	echo"<img src='images/add.jpg' width='1140' height='500'>";
}
?>
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