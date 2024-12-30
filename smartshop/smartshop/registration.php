<?php
	
	include("includes/db_connect.php");

	$debug = 'hidden';
	
	if (isset($_POST['user_id']))
		$loggeduser = $_POST['user_id'];
	else
		$loggeduser = 0;

	if (!isset($_GET['cat']))
		$category=0;
	else
		$category = $_GET['cat'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Εγγραφή νέου χρήστη</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<table class="layout">
			<tr >
			<td class="header" colspan='3'></td>
			</tr>
			<tr>
			<!-- Αριστερή στήλη που φιλοξενεί τις διαθέσιμες κατηγορίες -->
			<td class='leftsidebar'>
			<?php 
				include ("leftsidebar.php");
			?>
			</td>
			<td class="productsarea">

				<h1>Εγγραφή νέου χρήστη</h1>
				<Form name="user_data" action="reg_action.php" method="post">
					<table>
						<tr>
						<td>UserName: </td>
						<td><Input type="text" name="username" size="20"></td>
						</tr>
						<tr>
						<td>Password:</td>
						<td> <Input type="password" name="userpass" size="20"></td>
						</tr>
						<tr>
						<td>email: </td>
						<td><Input type="text" name="useremail" size="20"></td>
						</tr>
						<tr>
						<td>Όνομα:</td>
						<td><Input type="text" name="user_fname" size="20"></td>
						</tr>
						<tr>
						<td>Επώνυμο: </td>
						<td><Input type="text" name="user_lname" size="20"></td>
						</tr>
						<tr>
						<td>Τίτλος:</td>
						<td>
						<select name="title">
						<option value="κος">Κος</option>
						<option value="κα">Κα</option>
						</select>
						</td>
						</tr>
						<tr>
						<td>Οδός και Αριθμός:</td>
						<td> <Input type="text" name="useraddr" size="20"></td>
						</tr>
						<tr><td>Περιοχή:</td>
						<td> <Input type="text" name="usercity" size="20"></td>
						</tr>
						<tr>
						<td>Πόλη:</td>
						<td><Input type="text" name="usercity1" size="20"></td>
						</tr>
						<tr>
						<td>Ταχυδρομικός κώδικας:</td>
						<td><Input type="text" name="userzip" size="20"></td>
						</tr>
						<tr>
						<td>Χώρα:</td>
						<td><Input type="text" name="usercountry" size="20"></td>
						</tr>
						<tr>
						<td><Input type="submit" value="Καταχώριση"></td>
						<td> <Input type="reset" value="Καθαρισμός"></td>
						</tr>
					</table>
				</Form>


			</td>
			<!-- Δεξιά στήλη που φιλοξενεί τα κουμπιά σύνδεσης, αποσύνδεσης
				 εγγραφής και καλαθιού
			-->
			<td class='rightsidebar'>
				<?php include ("rightsidebar.php"); ?>
			</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</body>
</html>
