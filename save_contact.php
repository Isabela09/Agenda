<?php
session_start();

if ( !empty ($_POST['FirstName']) && !empty($_POST['LastName']) && !empty($_POST['Email']) && !empty($_POST['PhoneNumber'])
     && !empty($_POST['NoStreet']) && !empty($_POST['Street']) && !empty($_POST['City']) && !empty($_POST['State']))
	 {
		$fname = $_POST['FirstName'];
		$lname = $_POST['LastName'];
		$email = $_POST['Email'];
		$pnumber = $_POST['PhoneNumber'];
		$pstreet = $_POST['NoStreet'];
		$street = $_POST['Street'];
		$zcode = $_POST['ZipCode'];
		$city = $_POST['City'];
		$state = $_POST['State'];
		

		$mysqli = new mysqli ("localhost" , "root" , "" , "phonebook");
			  $mysqli->query (
		"INSERT INTO contactdetails (firstname, lastname, email)
		VALUES ('$fname', '$lname', '$email')"
		);
			 $last_id = $mysqli->insert_id;
		
		$mysqli->query (
		"INSERT INTO homeaddress (ContactDetails_ContactDetailsId, NoStreet, Street, ZipCode, City, State)
		VALUES ('$last_id','$pstreet', '$street','$zcode', '$city','$state')"
		);
		
		$mysqli->query (
		"INSERT INTO phonenumber (ContactDetails_ContactDetailsId, NumberPhone)
		VALUES ('$last_id','$pnumber')"
		);
		
		$_SESSION['messages'][] = 'Added '.$fname.' '.$lname.' into the phone book.';
		$redirect = 'afterlogin.php';

		$mysqli->close();
	 } else {
		 $redirect = 'formular1.php';
		 $_SESSION['messages'][] = 'Please fill in all the fields';
	 }
	header("Location: $redirect");		
?>