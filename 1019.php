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
<P ALIGN="center"><a href="1001.php">Home</A>&nbsp&nbsp|||&nbsp&nbsp<input type='button' value='print Record' onClick='printDiv(cert);'/></p>
<div id="cert">
<?php
include("conn.php");

$today=date('y:m:d');

$newd=date('F d,Y',strtotime($today));

$dobquery=mysql_query("select*from staff");

echo"<table border=1 bgcolor=#FFCDCD align='center' cellspacing=1 cellpadding=6>";

echo"<TR><TH colspan=5>REGIONAL STAFF WHO HAVE ATTAINED RETIREMENT AGE AS AT $newd</TH></TR>";

echo"<tr><th>NO<th>PF/NO<th>STAFF NAME<TH>DOB<TH>AGE</TH></TR>";



while($res=mysql_fetch_array($dobquery)){
	
$dob=$res['dob'];

$pf=$res['pfno'];

$name=$res['sname'];

$diff=abs(strtotime($dob)-strtotime($newd));

$retire=floor($diff/(60*60*24*365));

if($retire>=60){
	
	$total[]=array($pf);
	
	$no=count($total);
	
	
	echo"<tr><td>$no<td><font type=bold>$pf</font><td>$name<td align='centre'>$dob<td>$retire</td></tr>";
}

}
mysql_close($conn);
?>
</div>

</DIV>
<script type="text/javascript">
function printDiv(cert){
var printContents=document.getElementById("cert").innerHTML;
var originalContent=document.body.innerHTML=printContents;
window.print();
document.body.innerHTML=originalContents;
}
</script
</body>

</html>