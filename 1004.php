<html>
<head><title>STAFF RECORD</title>
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
<P ALIGN="center"><a href="1001.php">Home</A>&nbsp&nbsp|||&nbsp&nbsp<input type='button' value='print Record' onClick='printDiv(cert);'/></p>
<div id="cert">
<?php

if(isset($_POST['pfno'])){(int)$pfno=mysql_escape_string($_POST['pfno']);}

include("conn.php");

$qry=mysql_query("select*from staff where pfno='$pfno'");

while($row=mysql_fetch_array($qry))
{
$Today = date('y:m:d');
$new = date('l, F d, Y', strtotime($Today));
								
echo"<table border=1 height=600 width=800 cellpadding=0 cellspacing=0 align='center'>"; 
echo "<tr><th colspan=3><img src='kseal.jpg' width='80' height='40'><br>NATIONAL REGISTRATION BUREAU</TH></TR>";
echo"<tr><th colspan=3>SOUTH RIFT REGION</TH></TR>";
echo"<tr><th colspan=3>STAFF RECORD</TH></TR>";
echo"<tr><td><b><font color='red'>PF/No:</b></font>:&nbsp".$row['pfno']."<td colspan=1><b><font color='red'>ID No:</b></font>:&nbsp". $row['id_no']."<td><b><font color='red'>DESIGNATION</b></font>:&nbsp".$row['designation']."</td></tr>";
echo"<tr><td colspan=3><b><font color='red'>NAME</b></font>:&nbsp".$row['sname']."</td></tr>";
echo"<tr><td><b><font color='red'>JOB GROUP</b></font>:&nbsp".$row['jgroup']."<td><b><font color='red'>STATION</b></font>:&nbsp".$row['station']."<td><b><font color='red'>SEX</b></font>:&nbsp".$row['sex']."</td></tr>";
echo"<tr><td><b><font color='red'>SUB-COUNTY</b></font>:&nbsp".$row['scounty']."<td><b><font color='red'>HOME COUNTY</b></font>:&nbsp".$row['hcounty']."<td><b><font color='red'>CONTACT</b></font>:&nbsp".$row['contact']."</td></tr>";
echo"<tr><td><b><font color='red'>HIGHEST ACADEMIC QUALIFICATION</b></font>:&nbsp".$row['hacademic']."<td colspan=1><b><font color='red'>TERMS OF SERVICE:</b></font>:&nbsp". $row['tos']."<td colspan=2><b><font color='red'>DATE RETRIEVED</b></font>:$new</d></TR>";
//echo"<tr><td></td></tr>";

//echo"tr><td>";echo $row['approved'];echo"</td></tr>";
echo "</table>";
}

mysql_close($conn);
?>
</div>

<script type="text/javascript">
function printDiv(cert){
var printContents=document.getElementById("cert").innerHTML;
var originalContent=document.body.innerHTML=printContents;
window.print();
document.body.innerHTML=originalContents;
}
</script>
</body>
</html>

