<?php
	session_start();
	include 'register.php';
	require_once('common.php');
	displayMessages();
?>
<!DOCTYPE html>
<html>
  <head>
    <link type='text/css' rel='stylesheet' href='agenda.css'/>
    <title>Phone Book</title>
  </head>
 <body>
		<div>
			<p>	
				<u> Register
				</u>
			</p>
	
		<form action="registerfile.php" method="post">
			First Name:
		<br>
			<input type="text" name="FirstName" />
		<br/>
			Last Name:
		<br>
			<input type="text" name="LastName" />
		<br/>
		Email:
		<br>
			<input type="text" name="Email" />
		<br>
		User Name:
		<br>
			<input type="text" name="UserName" />
		<br>
		Password:
		<br>
			<input type="password" name="Password"  />
		<br>
		Re-type your password:
		<br>
			<input type="password" name="PasswordVerify" />
		<br>

		<input type="submit" name="submit" value="Register" />
		
		</form>
	</div>
</body>
</html>
