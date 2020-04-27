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
<body bgcolor="#000000">
<P ALIGN="center"><a href="1003.php">Home</A></p>

<?php
if(isset($_POST['pf'])){(int)$pfno=mysql_escape_string($_POST['pf']);}
if(isset($_POST['ssname'])){$name=mysql_escape_string($_POST['ssname']);}
if(isset($_POST['idno'])){(int)$idno=mysql_escape_string($_POST['idno']);}
if(isset($_POST['design'])){$des=mysql_escape_string($_POST['design']);}
if(isset($_POST['jgroup'])){$jg=mysql_escape_string($_POST['jgroup']);}
if(isset($_POST['nstation'])){$st=mysql_escape_string($_POST['nstation']);}
//if(isset($_POST['dof'])){$dofa=mysql_escape_string($_POST['dof']);}
//if(isset($_POST['doca'])){$doca=mysql_escape_string($_POST['doca']);}
if(isset($_POST['nscounty'])){$nscounty=mysql_escape_string($_POST['nscounty']);}
if(isset($_POST['hcounty'])){$hcounty=mysql_escape_string($_POST['hcounty']);}
if(isset($_POST['contact'])){$contact=mysql_escape_string($_POST['contact']);}
if(isset($_POST['hacademic'])){$hacademic=mysql_escape_string($_POST['hacademic']);}
if(isset($_POST['tos'])){$tos=mysql_escape_string($_POST['tos']);}
if(isset($_POST['pq'])){$pq=mysql_escape_string($_POST['pq']);}
if(isset($_POST['sex'])){$sex=mysql_escape_string($_POST['sex']);}


	
include("conn.php");
$updater=mysql_query("update staff set pfno='$pfno',id_no='$idno',sname='$name',sex='$sex',designation='$des',jgroup='$jg',hacademic='$hacademic',pq='$pq',tos='$tos',station='$st',scounty='$nscounty',hcounty='$hcounty',contact='$contact' where pfno='$pfno'");
  
  $rows=mysql_fetch_assoc($updater);
 if($rows=0){
	  echo"<font color='yellow'>".mysql_errno();"</font>";
  }
  else{
	echo"<font color='yellow'>Record for $name has been successfully updated</font>";  
  }
  