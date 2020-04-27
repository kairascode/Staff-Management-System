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
<P ALIGN="center"><a href="1002.php">Home</A>&nbsp&nbsp|||&nbsp&nbsp<input type='button' value='print Record' onClick='printDiv(cert);'/></p>
<div id="cert">
<?php
 //$Today = date('y:m:d');
//$new = date('l, F d, Y', strtotime($Today));
if(isset($_POST['scounty'])){$scounty=mysql_escape_string($_POST['scounty']);}

include("conn.php");


$qry=mysql_query("select*from staff where scounty='$scounty' and status=''");
$res=mysql_num_rows($qry);

echo"<table border=1 align=''>";
echo"<font color='blue'type='bold' size=5>SOUTH RIFT REGION:$scounty::TOTAL NUMBER OF STAFF::$res DATED::$new</font>";
echo"<tr bgcolor='#759068' height='50'><th><font color='#562570'type='bold'>PF/NO.<th>
<font color='#562570'type='bold'>ID NO<th><font color='#562570'type='bold' width='10'>NAME<th>
<font color='#562570'type='bold'>GENDER<th><font color='#562570'type='bold'>DESIGNATION<th>
<font color='#562570'type='bold'>JGROUP<th><font color='#562570'type='bold'>EDU LEVEL<th><font color='#562570'type='bold'>T.O.S<th>
<font color='#562570'type='bold'>D.O.B<th size=12><font color='#562570'type='bold'>D.O.F.A<Th>
<font color='#562570'type='bold'>D.O.C.A<Th><font color='#562570'type='bold'>STATION<Th>
<font color='#562570'type='bold'>HOME COUNTY<Th>
<font color='#562570'type='bold'>CONTACT<Th><font color='#562570'type='bold'>REMARKS</Th></TR>";
//echo"<tr><td>DATE PRINTED:$new</td></tr>
 while($row=mysql_fetch_assoc($qry))
 {
	
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
	$dob=$row['dob'];
	$dofa=$row['dofa'];
	$doca=$row['doca'];
	$remarks=$row['remarks'];
	
echo"<tr bgcolor='white' height='50'><td>".$pf."<td>".$idno."<td>".$name."<td>".$sex."<td>".$des."<td>".$jg."<td>".$hacademic."<td>".$tos."<td>".$dob.
"<td>".$dofa."<td>".$doca."<td>".$st."<td>".$hcounty."<td>".$contact."<td>".$remarks."</td></tr>"; 
 }
echo"</table>"; 

/*else{
	echo"<font color='red' size=10>$sname is not recognized as a staff member</font>";
//break;	
}*/
mysql_close($conn);
 //include("footer.php");
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