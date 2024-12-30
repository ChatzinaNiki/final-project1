<?php
	
     /* Έλεγχος στοιχείων χρήστη από βάση
     */
	 include ("includes/db_connect.php");
	 include ("includes/functions.php");
?>

<html>
	<head>
		<meta charset='utf-8'>
		<title>user login</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="DialogBox">
		<?php 
			$loggeduser = 0;
		?>
			<img src="images/tick.png" style="height:100px;"/>
			<h2>Έχετε αποσυνδεθεί από το SmartShop</h2>
			<form method="post" action="index.php">
				<input type="hidden" name="user_id" value="<?php echo $loggeduser ?>">
				<input type="submit" value="Επιστροφή στην αρχική σελίδα...">
			</form>
		</div>
	</body>
</html>
