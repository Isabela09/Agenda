<?php
if(!empty($_POST)) {
	if ( !empty ($_POST['FirstName']) && 
		!empty($_POST['LastName']) && 
		!empty($_POST['Email'])  && 
		!empty($_POST['UserName']) && 
		!empty($_POST['Password']) && 
		!empty($_POST['PasswordVerify']))
	 {
		$fname = $_POST['FirstName'];
		$lname = $_POST['LastName'];
		$email = $_POST['Email'];
		$username = $_POST['UserName'];
		$password = $_POST['Password'];
		$passwordv = $_POST['PasswordVerify'];
		$crypt = md5(trim($password));
		$crypt2 = md5(trim($passwordv));
		
		$mysqli = new mysqli ("localhost" , "root" , "" , "phonebook");
		$sqlString = "SELECT Email FROM contactdetails WHERE Email = '{$email}'";
		$emaill = $mysqli->query($sqlString);
		
		if($emaill->num_rows > 0) {
			$_SESSION['messages'][] = "Email already exists!";
		} else if ($crypt != $crypt2) {
			$_SESSION['messages'][] = 'Password doesn\'t match';
		} else { 
			$mysqli = new mysqli ("localhost" , "root" , "" , "phonebook");
			$mysqli->query ("INSERT INTO contactdetails (FirstName, LastName, Email) VALUES ('$fname', '$lname', '$email')");
			$id = $mysqli->insert_id;
			var_dump($id);
			$mysqli->query ("INSERT INTO account (ContactDetailsId, UserName, Password) VALUES ('$id', '$username', '$crypt')");
			$_SESSION['messages'][] = 'Account '.$username.'  created';
			header('Location: login.php');
		}
		$mysqli->close();
	} else {
		if(!empty($_SESSION['messages'])) {
			$_SESSION['messages'] = null;
		}
		$_SESSION['messages'][] = 'Please fill in all the fields';
	}
}