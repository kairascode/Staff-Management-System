<?php
session_start();
$username=$_POST['username'];
$pass=md5($_POST['pass']);
$utyp=$_POST['utype'];


switch($utyp){
case"10";
include("conn.php");
$qry=mysql_query("SELECT* FROM atumiri where member='$username' and loginKey='$pass' and memtyp=10");
$rows=mysql_num_rows($qry);

if($rows!==0){
	while($row=mysql_fetch_assoc($qry))
	{
	$dbuser=$row['member'];
	$dbpass=$row['loginKey'];
	}
	if($username==$dbuser&&$pass==$dbpass){
	header('location:1001.php');
	$_SESSION['loggedin']=true;
	$_SESSION['username']=$username;
	}
	
}
else
{
echo"<html><head><title>ERROR</TITLE></head>
	<body bgcolor='#131089' ><font color='red' size='14'type='bold'>
	INVALID LOGIN CREDENTIALS... ACCESS DENIED!!</font><br>
	<p align='center'><img src='images/user2.jpg' width=500 height=500><br><br>
	<a href='index.php'><font color='white'>Click here to login again</font></a></p></body></html>";
	}
	break;
	
///////////////////////////////////END OF 10/////////////START OF 20/////////////////////////////////////////////////////////////
	
case"20";
	include("conn.php");
$qry1=mysql_query("SELECT* FROM atumiri where member='$username' and loginKey='$pass' and memtyp=20");
$rows=mysql_num_rows($qry1);
if($rows!==0){
	while($row=mysql_fetch_assoc($qry1))
	{
	$dbuser=$row['member'];
	$dbpass=$row['loginKey'];
	}
	if($username==$dbuser&&$pass==$dbpass){
	header('location:1002.php');
	$_SESSION['loggedin']=true;
	$_SESSION['username']=$username;
	
	}
}
else
{
	
	echo"<html><head><title>ERROR</TITLE></head>
	<body bgcolor='#131089'><font color='orange' size='14'type='bold'>
	INVALID LOGIN CREDENTIALS... ACCESS DENIED!!</font><br>
	<p align='center'><img src='images/user2.jpg' width=500 height=500><br><br>
	<a href='index.php'><font color='white'>Click here to login again</font></a></p></body></html>";
	}
	break;
	
///////////////////////////////////END OF 20/////////////START OF 30/////////////////////////////////////////////////////////////
case"30";

include("conn.php");
$qry=mysql_query("SELECT* FROM atumiri where member='$username' and loginKey='$pass' and memtyp=30");
$rows=mysql_num_rows($qry);

if($rows!==0){
	while($row=mysql_fetch_assoc($qry))
	{
	$dbuser=$row['member'];
	$dbpass=$row['loginKey'];
	}
	if($username==$dbuser&&$pass==$dbpass){
	header('location:1003.php');
	$_SESSION['loggedin']=true;
	$_SESSION['username']=$username;
	}
	
}
else
{
echo"<html><head><title>ERROR</TITLE></head>
	<body bgcolor='#131089'><font color='red' size='14'type='bold'>
	INVALID LOGIN CREDENTIALS... ACCESS DENIED!!</font><br>
	<p align='center'><img src='images/user2.jpg' width=500 height=500><br><br>
	<a href='index.php'><font color='white'>Click here to login again</font></a></p></body></html>";
	}
	break;
	
default:
	echo"";
	
}

?>
