<?php //signup form for the teacher ?>
<!doctype html>

<html>

<head>
<title>Sign Up</title>
</head>

<body>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="signupck.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Sign Up</strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="username" type="text" id="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="password"></td>
</tr>
<tr>
<td>Confirm Password</td>
<td>:</td>
<td><input name="password2" type="password" id="password2"></td>
</tr>
<tr>
<td>email</td>
<td>:</td>
<td><input name="email" type="text" id="email"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="signup"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

</body>

</html>
