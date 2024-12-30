<?php
	
     /* Έλεγχος στοιχείων χρήστη από βάση
     */
	 include ("includes/db_connect.php");
	 include ("includes/functions.php");
?>

<html>
	<head>
		<meta charset='utf-8'>
		<title>Επιβεβαίωση επιλογής</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php 
			$loggeduser = $_POST["user_id"];
			$productID = $_POST["prod_id"];
			$quantity = $_POST["quantity"];
			
			$SQL = "INSERT INTO cart (user_id, prod_id, quantity)
					VALUES ($loggeduser, $productID, $quantity)";
			try
			{
				mysqli_query($con, $SQL);
			?>
				<div class="DialogBox">
				<img src="images/tick.png" style="height:100px;"/>
				<h2>Το προϊόν προστέθηκε στο καλάθι.</h2><br>

				<table class="pagenav">
					<tr>
						<td>
							<form method="post" action="index.php">
								<input type="hidden" name="user_id" value="<?php echo $loggeduser; ?>">
								<input type="submit" value="Συνέχεια αγορών">
							</form>
						</td>
						<td>
							<form method="post" action="cart.php">
								<input type="hidden" name="user_id" value="<?php echo $loggeduser; ?>">
								<input type="submit" value="Το καλάθι μου">
							</form>
						</td>
					</tr>
				</table>
				</div>
		<?php
			}
			catch (Exception $e)
			{
		?>
				<div class="DialogBox">
				<center><img src="images/x.png" style="height:100px;"/></center>
				<h2 style="text-align: center;">Έχετε ήδη στο καλάθι σας το προϊόν.</h2><br>

				<table class="pagenav">
					<tr>
						<td>
							<form method="post" action="index.php">
								<input type="hidden" name="user_id" value="<?php echo $loggeduser; ?>">
								<input type="submit" value="Συνέχεια αγορών">
							</form>
						</td>
						<td>
							<form method="post" action="cart.php">
								<input type="hidden" name="user_id" value="<?php echo $loggeduser; ?>">
								<input type="submit" value="Το καλάθι μου">
							</form>
						</td>
					</tr>
				</table>
				</div>
		<?php
			}
		?>
	</body>
</html>
