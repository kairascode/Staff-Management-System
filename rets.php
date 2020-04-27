<?php

include("conn.php");

$td=date("y:m");
$month= date('F,Y',strtotime($td));


$rts=mysql_query("select * from staff where status=''");

echo"<table border=1 >

<tr><th colspan=13>NATIONAL REGISTRATION BUREAU</TH></TR>
<TR><TH colspan=13>SOUTH RIFT REGION</TH></TR>
<TR><th colspan=13>STAFF RETURNS FOR $month</th></tr>
<tr><th>No<th>Staff Name<th>PF/NO<th>Designation<th>Job Group<th>Station<th>Gender<th>Highest Academic <br>Qualification<th>Professional<br>Qualification
<th>D.O.B<TH>D.O.F.A<TH>D.O.C.A<TH>T.O.S</TH></TR>";

while($row=mysql_fetch_array($rts)){
	
	$name=$row["sname"];
	$pfno=$row["pfno"];
	$desig=$row["designation"];
	$jg=$row["jgroup"];
	$station=$row["station"];
	$gender=$row["sex"];
	$hacademic=$row["hacademic"];
	$pq=$row["pq"];
	$dob=$row["dob"];
	$dofa=$row["dofa"];
	$doca=$row["doca"];
	$tos=$row["tos"];
	
	
$total[]=array($pfno);
	$no=count($total);
	
	echo"<tr><td>$no<TD>$name<td>$pfno<td>$desig<td>$jg<td>$station<td>$gender<td>$hacademic<td>$pq<td>$dob<td>$dofa<td>$doca<td>$tos</td></tr>";
	
	
}
echo"</table>";
?>