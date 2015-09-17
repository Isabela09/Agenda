<!DOCTYPE html>
<html>
  <head>
    <link type='text/css' rel='stylesheet' href='agenda.css'/>
    <title>Phone Book</title>
  </head>
 <body>
		<div>
			<p> Introduce new data in our database.
			</p>
		<form action="AgendaTelefonica.php" method="post">
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
			Phone Number:
		<br>
			<input type="text" name="PhoneNumber" />
		<br>
			Address:
		<br>
			No:
		<br>
			<input type="text" name="NoStreet" />
		<br>
			Street:
		<br>
			<input type="text" name="Street" />
		<br>
			Zip Code:
		<br>
			<input type="text" name="ZipCode" />
		<br>
			City:
		<br>
			<input type="text" name="City" />
		<br>
			State:
		<br>
			<input type="text" name="State" />
		<br>

		<input type="submit" name="submit" value="Send formulair" />
		
		</form>
	</div>
<?php
$mysqli = new mysqli ("localhost", "root", "" , "phonebook");
	$fupdate= "UPDATE contactdetails  SET FirstName='Rebeca' WHERE ContactDetailsId=3";
	$mysqli->query ($fupdate);

	
	$fdelete="DELETE  from contactdetails WHERE ContactDetailsId=4";
	$mysqli->query ($fdelete);
	
	$mysqli->close();
?>
</body>
</html>
