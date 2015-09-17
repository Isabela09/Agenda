<?php
$mysqli = new mysqli ("localhost" , "root" , "" , "phonebook");
if (!empty($_POST['name'])) {
	$search_people = $_POST['name'];
} else {
	$search_people = '';
}

 $sqlString = "SELECT * FROM contactdetails 
INNER JOIN phonenumber
ON contactdetails.ContactDetailsId=phonenumber.ContactDetails_ContactDetailsId
INNER JOIN homeaddress
ON contactdetails.ContactDetailsId=homeaddress.ContactDetails_ContactDetailsId
INNER JOIN account
ON contactdetails.ContactDetailsId=account.AccountId
WHERE FirstName Like '%$search_people%' OR LastName Like '%$search_people%' ";
 $search_peoples = $mysqli->query($sqlString);
 $table = array();

?>
<!DOCTYPE html>
<html>
  <head>
    <link type='text/css' rel='stylesheet' href='agenda.css'/>
    <title>Phone Book</title>
  </head>
	<body>
		<a href="AgendaTelefonica.php">Index agenda</a>
  <h3>Search  Contacts Details</h3> 
	    <p>You  may search either by first or last name</p> 
	    <form  method="post" action="search.php"  id="searchform"> 
	      <input  type="text" name="name"> 
	      <input  type="submit" name="submit" value="Search"> 
		</form>
	<div>
		<table border="1"> 
			<tr>
				<td> First Name
				</td>
				<td> Last Name
				</td>
				<td> Email
				</td> 
				<td>User Name
				</td>
				<td> Phone Number
				</td>
				<td> No Street
				</td>
				<td> Street
				</td>
				<td> Zip Code
				</td>
				<td> City
				</td>
				<td> State
				</td>
				<td>Edit</td>
			</tr>
			<?php
				foreach ($search_peoples as $row) {
					?>
					<tr>
						<td> <?php echo $row['FirstName']; ?></td>
						<td> <?php echo $row['LastName']; ?></td> 
						<td> <?php echo $row['Email']; ?></td>
						<td> <?php echo $row['UserName']; ?> </td>
						<td> <?php echo $row['NumberPhone']; ?> </td>
						<td> <?php echo $row['NoStreet']; ?> </td>
						<td> <?php echo $row['Street']; ?> </td> 
						<td> <?php echo $row['ZipCode']; ?> </td>
						<td> <?php echo $row['City']; ?> </td>
						<td> <?php echo $row['State']; ?> </td>
						<td> <a href="editare.php?contactId=<?php echo $row['ContactDetails_ContactDetailsId']; ?>">Edit</a></td>
					</tr>
					<?php
					}	
					?>
			
		</table>
	</div>
	</body>
</html>	
	

		
		
