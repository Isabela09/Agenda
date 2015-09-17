<?php
session_start();
$mysqli = new mysqli ("localhost" , "root" , "" , "phonebook");
if (!empty ($_POST['UserName']) && !empty ($_POST['Password'])){
 
    // preiau datele din formular
    $username = $_POST['UserName'];
    $password = $_POST['Password'];
	$crypt = md5($password);
 

	$result=$mysqli->query("SELECT Username, Password FROM account WHERE UserName = '$username' AND Password = '$crypt' ");
	if  ( $result->num_rows) { 
		$_SESSION['messages'][] = 'Welcome '.$username.'  into your account';
		$redirect = 'afterlogin.php';
		$mysqli->close();
		$_SESSION['messages']['wrong'] = '';
		header("Location: $redirect");
	}else{
		//$redirect = 'login.php';
	 echo 'UserName and Password wrong';
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link type='text/css' rel='stylesheet' href='agenda.css'/>
    <title>Phone Book Log in</title>
  </head>
 <body>

<form name="login_form" action="login.php" method="post">
    <table>
        <tr>
            <td width="40%">Username</td>
            <td><input type="text" name="UserName" id="UserName" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="Password" id="Password" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="login_btn" value="Login" /></td>
        </tr>
    </table>
	<p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
</form> 