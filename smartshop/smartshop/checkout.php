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
		<title>Πληρωμή με κάρτα</title>
		<meta charset='utf-8'>
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

				<h1>Πληρωμή παραγγελίας</h1>
				<Form name="user_data" action="checkout_action.php" method="POST">
					<Input hidden type="text" name="user_id" value="<?php echo $loggeduser; ?>" size="20">
					<table>
						<tr>
						<td>Είδος κάρτας: </td>
						<td>
							<select name="cardtype">
							<?php
								$SQL = "SELECT card_type_id, card_type_name
										FROM card_types
										ORDER BY card_type_id";
								$result = mysqli_query($con, $SQL);
								
								while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
								{
									echo "<option value='".$row['card_type_id']."'>".$row['card_type_name']."</option>";
								}
										
							?>
							</select><br><br>
						</td>
						</tr>
						<td>Κωδικός κάρτας:</td>
						<td> <Input required type="text" name="cardno" size="20"> <strong>(*)</strong><br><br></td>
						</tr>
						<tr>
						<td>Όνομα ιδιοκτήτη κάρτας: </td>
						<td><Input required type="text" name="cardholder" size="20"> <strong>(*)</strong><br><br></td>
						</tr>
						<tr>
						<td>Λήξη: </td>
						<td>
							Έτος: <select name="expirationyear">
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
								   </select>
							Μήνας: <select name="expirationmonth">
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
								   </select>
								   <br><br>
						</td>
						</tr>
						<tr><td colspan="2"><hr></td></tr>
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
