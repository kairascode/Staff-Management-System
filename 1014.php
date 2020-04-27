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
}?>
</head>
<body bgcolor="#FFDEDC">
<P ALIGN="center"><a href="1001.php">Home</A>&nbsp&nbsp|||&nbsp&nbsp<a href="1018.php">Retired Staff&nbsp&nbsp</A>|||&nbsp&nbsp<input type='button' value='print Record' onClick='printDiv(cadre);'/></p>
<div id="cadre">


<?php

include("conn.php");
if(isset($_POST['design'])){$typa=mysql_escape_string($_POST['design']);}

$nostaff=mysql_query('SELECT count(*) FROM staff WHERE designation like %$typa% and status=''');

$totalNo=mysql_fetch_array($nostaff);

?>

<form method="POST" action="1014.php">

<?php include("desig.php");?>

NO OF STAFF<input type='text' value='$totalNo'>
</form>

</div>
<script type="text/javascript">
function printDiv(cadre){
var printContents=document.getElementById("cadre").innerHTML;
var originalContent=document.body.innerHTML=printContents;
window.print();
document.body.innerHTML=originalContents;
}
</script>
</body>
</html>