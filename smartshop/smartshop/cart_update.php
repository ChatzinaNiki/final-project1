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
			$loggeduser = $_POST['user_id'];
			$prod_id = $_POST['prod_id'];
			$quantity = $_POST['quantity'];
			
			if (isset($_POST['update']))
			{
				$SQL = "UPDATE cart
						SET quantity = $quantity
						WHERE user_id = $loggeduser AND prod_id = $prod_id";
				$result = mysqli_query($con, $SQL);

				if ($result)
				{
					echo "<img src='images/tick.png' style='height:100px;'/>";
					echo "<h2>Το καλάθι σας ενημερώθηκε.</h2>";
					echo "<form method='post' action='cart.php'>";
					echo "<input type='hidden' name='user_id' value='".$loggeduser."'>";
					echo "<input type='submit' value='Συνέχεια...'>";
					echo "</form>";
				}
				else
				{
					echo "<img src='images/x.png' style='height:100px;'/>";
					echo "<h2>Η ενημέρωση του καλαθιού σας δεν έγινε.</h2>";
					echo "<form method='post' action='cart.php'>";
					echo "<input type='hidden' name='user_id' value='".$loggeduser."'>";
					echo "<input type='submit' value='Συνέχεια...'>";
					echo "</form>";
				}
			}	
			if (isset($_POST['delete']))
			{
				$SQL = "DELETE 
						FROM cart
						WHERE user_id = $loggeduser AND prod_id = $prod_id";
				$result = mysqli_query($con, $SQL);

				if ($result)
				{
					echo "<img src='images/tick.png' style='height:100px;'/>";
					echo "<h2>Το προϊόν αφαιρέθηκε από το καλάθι σας.</h2>";
					echo "<form method='post' action='cart.php'>";
					echo "<input type='hidden' name='user_id' value='".$loggeduser."'>";
					echo "<input type='submit' value='Συνέχεια...'>";
					echo "</form>";
				}
				else
				{
					echo "<img src='images/x.png' style='height:100px;'/>";
					echo "<h2>Πρόβλημα στην αφαίρεση του είδους από το καλάθι σας.</h2>";
					echo "<form method='post' action='cart.php'>";
					echo "<input type='hidden' name='user_id' value='".$loggeduser."'>";
					echo "<input type='submit' value='Συνέχεια...'>";
					echo "</form>";
				}
			}
		?>

		</div>
	</body>
</html>
