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
			$username=escape_a($con,$_POST["username"]);
			$userpass=escape_a($con,$_POST["userpass"]);
			$sql="select user_name, user_pass, user_id from users where user_name='$username' and user_pass='$userpass'";			
			$result=mysqli_query($con,$sql);
			$numrows=0;
			while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				$user_id = $row['user_id'];
				$numrows++;
			}
			$row = [];

			if ($numrows > 0)
			{
		?>
				<img src="images/tick.png" style="height:100px;"/>
				<h2>Καλωσορίσατε στο SmartShop</h2>
				<form method="post" action="index.php">
					<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
					<input type="submit" value="Ξεκινήστε τις αγορές σας...">
				</form>
		<?php
			}
			else 
			{
				echo '<img src="images/x.png" style="height:100px;"/>';
				echo '<h2>Το όνομα χρήστη ή και το συνθηματικό που χρησιμοποιήσατε,<br>δεν είναι σωστά.<br><br>Προασπαθήστε ξανά</h2>';
			}
		?>
		</div>
	</body>
</html>
