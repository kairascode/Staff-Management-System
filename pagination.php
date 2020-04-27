<html>
<head>
<title>RECORDS</title>
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
<P ALIGN="center"><a href="1002.php">Home</A>&nbsp&nbsp|||&nbsp&nbsp<a href="logout.php">Logout</A></p>
<?php
include("conn.php");
$perPage=10;
$qry=mysql_query("select * FROM staff");
$pagesQuery=mysql_num_rows($qry);
$pages=ceil($pagesQuery/$perPage);

if(!isset($_GET['page'])){

header("location:pagination.php?page=1");
}
else{
$page=$_GET['page'];
}

$start=(($page-1)*$perPage);

$prev=$page-1;
$next=$page+1;
if($num>1){
echo"<a href='?page=$prev'>prev</a>";
}
else if($num<1){
	echo"$num";
}
for($num=1;$num<=$pages;$num+=1)
{
	
echo"<a href='?page=$num'>&nbsp$num&nbsp</a>";

}
if($next<=$pages)
	
echo"<a href='?page=$next'>next</a>";

echo"<p align=''>current page <font color='blue' size='8'>$page</font> of<font color='blue' size='8'> $pages </font>";
echo"Total number of Staff in the Region<font color='blue' size='8'>$pagesQuery</font></p>";
$qry=mysql_query("select* from staff LIMIT $start,$perPage ");
echo"<table border=1 align=''>";
echo"<tr bgcolor='#759068' height='50'><th><font color='#562570'type='bold'>PF/NO.<th>
<font color='#562570'type='bold'>ID NO<th><font color='#562570'type='bold' width='10'>NAME<th><font color='#562570'type='bold'>GENDER<th><font color='#562570'type='bold'>DESIGNATION<th><font color='#562570'type='bold'>JGROUP<th><font color='#562570'type='bold'>EDU LEVEL<th><font color='#562570'type='bold'>T.O.S<th>
<font color='#562570'type='bold'>D.O.B<th><font color='#562570'type='bold'>D.O.F.A<Th><font color='#562570'type='bold'>D.O.C.A<Th><font color='#562570'type='bold'>STATION<Th><font color='#562570'type='bold'>SUB COUNTY<th><font color='#562570'type='bold'>HOME COUNTY<Th><font color='#562570'type='bold'>CONTACT<Th><font color='#562570'type='bold'>REMARKS</Th></TR>";

while($row=mysql_fetch_assoc($qry))
{
$pfno=$row['pfno'];
$idno=$row['id_no'];
$sname=$row['sname'];
$des=$row['designation'];
$sex=$row['sex'];
$jg=$row['jgroup'];
$acad=$row['hacademic'];
$tos=$row['tos'];
$dob=$row['dob'];
$dofa=$row['dofa'];
$doca=$row['doca'];
$st=$row['station'];
$scounty=$row['scounty'];
$hcounty=$row['hcounty'];
$contact=$row['contact'];
$remarks=$row['remarks'];

echo"<tr bgcolor='#FFCDCD' height='50'><td>".$pfno."<td>".$idno."<td>".$sname."<td>".$sex."<td>".$des."<td>".$jg."<td>".$acad."<td>".$tos."<td>".$dob."<td>".$dofa."<td>".$doca."<td>".$st."<td>".$scounty."<td>".$hcounty."<td>".$contact."<td>".$remarks."</td></tr>";

//echo"</table>";
}
echo"</table>";
if(!isset($_GET['page'])){

header("location:pagination.php?page=1");
}
else{
$page=$_GET['page'];
}

$start=(($page-1)*$perPage);

$prev=$page-1;
$next=$page+1;
if($num>1){
//echo"<a href='?page=$prev'>prev</a>";
}
else if($num<1){
	echo"$num";
}
for($num=1;$num<=$pages;$num+=1)
{
	
echo"<a href='?page=$num'>&nbsp$num&nbsp</a>";

}
if($next<=$pages)
	
echo"<a href='?page=$next'>next</a>";
//$num=1;

mysql_close($conn);
 include("footer.php");
?>
</body>
</html>