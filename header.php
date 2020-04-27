<html>
<p align="lleft" bgcolor="blue"><font color="blue" type="bold" size="10">SRVR STAFF MANAGEMENT SYSTEM </font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/sss.jpg" align="right" width="100" height="100"></p>
<p align="left"> <font color="orange" type="bold" size="4">SSMS Version 1.0.0 <?php $Today = date('m:d:y'); $new = date('Y', strtotime($Today));
								echo $new;?></p></font><hr>
<?php
$today=date('y:m:d');
$new= date('l,F d,Y',strtotime($today));
//$time= new time('h:m:s');
echo"<p align='right'><font color='orange' style='bold' size='6'>$new</font></p>";
?>

