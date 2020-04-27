<form method="POST" action="1078.php">
COUNTY::<select type="text" name="county" required>
<?php include("counties.php");?>
</select>
SUB COUNTY::<select type="text" name="scounty" required>
<?php include("subcounties.php");?>
</select><br><BR><HR>
CODE::<input type="text" name="scno" required PLACEHOLDER="E.g 123"><br><BR><HR>
<input type="submit" name="submit" value="ADD SUBCOUNTY">
</form>
<?php
include("conn.php");
if(isset($_POST['county'])){$county=mysql_escape_string($_POST['county']);}
if(isset($_POST['scno'])){(int)$scno=mysql_escape_string($_POST['scno']);}
if(isset($_POST['scounty'])){$scounty=mysql_escape_string($_POST['scounty']);}

echo $county;
switch($county){

case"BARINGO";

$bar=mysql_query("insert into baringo (no,scounty) values('$scno','$scounty')") or die (mysql_error($conn));
echo"$scounty added successfully in $county County";
break;
case"NAKURU";
$nak=mysql_query("insert into nakuru (no,scounty) values('$scno','$scounty')") or die (mysql_error($conn));
echo"$scounty added successfully in $county County";
break;
case"BOMET";
$bom=mysql_query("insert into bomet (no,scounty) values('$scno','$scounty')") or die (mysql_error($conn));
echo"$scounty added successfully in $county County";
break;
case"NAROK";
$nar=mysql_query("insert into narok (no,scounty) values('$scno','$scounty')") or die (mysql_error($conn));
echo"$scounty added successfully in $county County";
break;
case"SAMBURU";
$sam=mysql_query("insert into samburu (no,scounty) values('$scno','$scounty')") or die (mysql_error($conn));
echo"$scounty added successfully in $county County";
break;
case"KERICHO";
$ker=mysql_query("insert into kericho (no,scounty) values('$scno','$scounty')") or die (mysql_error($conn));
echo"$scounty added successfully in $county County";
break;
case"LAIKIPIA";
$lai=mysql_query("insert into laikipia (no,scounty) values('$scno','$scounty')") or die (mysql_error($conn));
echo"$scounty added successfully in $county County";
break;

}
//echo"$scounty added successfully in $county County";
mysql_close($conn);
?>
