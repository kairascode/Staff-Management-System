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
echo"<p align='right'><h3><font color='#665743'>You are logged in as $username  </h3></font></p>";
}?>
</head>
<body bgcolor="#CCDEDC">
<P ALIGN="center"><a href="1002.php">Home</A>&nbsp&nbsp</p>
<?php
if(isset($_POST['pfno'])){(int)$pfno=mysql_escape_string($_POST['pfno']);}
if(isset($_POST['tfrom'])){$tfrom=mysql_escape_string($_POST['tfrom']);}
if(isset($_POST['leato'])){$leato=mysql_escape_string($_POST['leato']);}
if(isset($_POST['appdate'])){$appdate=mysql_escape_string($_POST['appdate']);}
if(isset($_POST['leavetyp'])){$leavetyp=mysql_escape_string($_POST['leavetyp']);}


$date1=abs(strtotime($tfrom));
$date2=abs(strtotime($leato));

$entitled=30;


$nodays=($date2-$date1)/86400;

$bal=$entitled-$nodays;

 include("conn.php");
 
 $q=mysql_query("select sname from staff where pfno=$pfno");
 
 $res=mysql_fetch_array($q);
 
 $sname=$res['sname'];
 
 if(!$res==0){
	 
 
	switch($bal){
		
		case $bal<0:
		echo"<font color='green' size=5>$sname has exhausted the entitled leave days</font>";
		
		break;
	
	case $bal>=0:
 $qry=mysql_query("INSERT INTO leaver(appdate,pfno,typ,daystaken,takenfrom,upto,entitled,bal)VALUES('$appdate','$pfno','$leavetyp','$nodays','$tfrom','$leato','$entitled','$bal')") or die(mysql_error($conn));
 

	 echo"<font color='green' size=5>$sname 's application for $leavetyp leave of $nodays days has been recorded </font>";

 
break;
 }
 }else {
	echo"<font color='red' size=10><big>$pfno is invalid</big></font>";
	 
 }
 
   ?>
   </body>
   </html>