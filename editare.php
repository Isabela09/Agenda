<?php
$mysqli= new mysqli("localhost", "root", "", "phonebook");
if(isset($_GET['contactId'])){
$getcontactId=$_GET['contactId'];
$sqlString= "SELECT * FROM contactdetails WHERE ContactDetailsId='$getcontactId'";
$result=$mysqli->query($sqlString);
$valueArray= array();
if (!empty($result)) {
foreach($result as $value) {
	$valueArray=$value;
}
if(!empty($_POST['FirstName'])) {
	$fname=$_POST["FirstName"];
	$lname=$_POST["LastName"];
	$email=$_POST["Email"];
$mysqli->query(
			"UPDATE contactdetails SET FirstName='$fname', LastName='$lname', Email='$email' WHERE ContactDetailsId='$getcontactId' "
);
 header('Location:search.php');
 
}
}
} 
?>
<!DOCTYPE html>
<html>
  <head>
    <link type='text/css' rel='stylesheet' href='agenda.css'/>
    <title>Phone Book</title>
  </head>
 <body>
		<div>
			<p> Edit your data in our database.
			</p>
		<form method="post">
			First Name:
		<br>
			<input type="text" name='FirstName' value="<?php echo $valueArray['FirstName']; ?>">
		<br>
			Last Name:
		<br>
			<input type="text" name='LastName' value="<?php echo $valueArray['LastName']; ?>">
		<br>
		Email:
		<br>
			<input type="text" name='Email' value="<?php echo $valueArray['Email']; ?>">
		<br>
			<input type="submit" name="Submit" value="Edit data">
		<br>
		</form>
	</div>
	<a href="AgendaTelefonica.php" class="Back">BACK</a>
	  </body>
</html>
	