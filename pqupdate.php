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
if(isset($_POST['pfno'])){(int)$pfno=mysql_escape_string($_POST['pfno']);}

include("conn.php");


$qry=mysql_query("select*from staff where pfno='$pfno' and status=''");

$res=mysql_fetch_array($qry);

switch($res){
	
	case $res>=1;
	$pfn=$res['pfno'];
	$hq=$res['hacademic'];
	$pf=$res['pq'];

  echo"<form method='POST' action=''>
	PERSONAL NO:<input type='text' name='pfno' value='$pfn' required ><br><br>
	HIGHEST ACADEMIC QUALIFICATION:<select type='text' name='haq' required><br><br>
	<option value=''>$hq</option><br><br>";
	include("hacad.php");
	echo"<br><br>
	PROFESSIONAL QUALIFICATION:<input type='text' name='pq' value='$pq' maxlength='20' pattern='[A-Z ]+'  required><br><br>
	<input type='submit' name='submit' value='update'>
	</form>";
	
	if(isset($_POST['submit'])){
  
	if(isset($_POST['pfno'])){$pfno=$_POST['pfno'];}
	if(isset($_POST['haq'])){$haq=$_POST['haq'];}
	if(isset($_POST['pq'])){$pq=$_POST['pq'];}

	
	$update=mysql_query("update staff set pq='$pq',hacademic='$haq' where pfno='$pfno'")or die(mysql_error($conn));

		$rows=mysql_num_rows($update);
		if($rows!=0){
	  
	  echo"<font color='yellow'>Record for $name has been successfully updated</font>";
				}
			else{
	//echo"<font color='yellow'>Record for $name has been successfully updated</font>";  
				echo"<font color='yellow'>WRONG</font>";
				}
		}
	break;
	
	case $res==0;
	
	echo"YOU DO NOT HAVE STAFF WITH PF NO:$pfno";
	break;
}
				mysql_close($conn);
			include("footer.php");
?>
</body>
</html>