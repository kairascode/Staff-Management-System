<?php
include("conn.php");

$today=date('y:m:d');

$newd=date('F d,Y',strtotime($today));

$dobquery=mysql_query("select*from staff");

echo"<table border=1 bgcolor=#FFCDCD align='center' cellspacing=1 cellpadding=6>";

echo"<TR><TH colspan=6>REGIONAL STAFF WHO HAVE ATTAINED RETIREMENT AGE AS AT $newd</TH></TR>";

echo"<tr><th>NO<th>PF/NO<th>STAFF NAME<TH>DOB<TH>AGE<th>STATUS</TH></TR>";



while($res=mysql_fetch_array($dobquery)){
	
$dob=$res['dob'];
$stat=$res['status'];
$pf=$res['pfno'];

$name=$res['sname'];
$today=date('y:m:d');
$newdd=date('F d,Y',strtotime($today));
$diff=abs(strtotime($dob)-strtotime($newdd));

$retire=floor($diff/(60*60*24*365));

if($retire>=60){
	
	$total[]=array($pf);
	
	$no=count($total);
	
	
	echo"<tr><td>$no<td><font type=bold>$pf</font><td>$name<td align='centre'>$dob<td>$retire<td>$stat</td></tr>";
}

}
mysql_close($conn);
?>
