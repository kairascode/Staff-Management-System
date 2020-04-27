<html>
<head>
<title>SRVR-NRB-HOME</TITLE>
<link rel="stylesheet" type="text/css" a href="form.css">
<link rel="stylesheet" type="text/css" a href="profstyle.css">
<link rel="stylesheet" type="text/css" a href="whole.css">
</head>

<body bgcolor="#859250" id="bdy">
<div>
<?php include("header.php");?><hr></div>
<form method="POST" action="login.php" align="center">
USER TYPE:&nbsp&nbsp<select name="utype" type="text" required>
<option value=""></option>
<option value="10">Coordinator</option>
<option value="20">Registry</option>
<option value="30">Sys-Admin</option>
</select><br><br><br><br></hr>
USERNAME:<input type="text" name="username" pattern=[a-z]+ required maxlength="10"><br><br>
PASSWORD:<input type="password" name="pass"  pattern=[a-z,1-9]+ required maxlength="8"><br><br><br><br>
<input type="submit" name="submit" value="ACCESS SYSTEM"></p>

<p>Want to reset your password? <a href="resetpass.php">Click here</a></p>
</form></p>
</DIV>
<div>
<?php include("footer2.php")?>
</div>
</body>
</html>