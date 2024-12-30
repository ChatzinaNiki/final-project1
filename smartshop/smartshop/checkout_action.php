<?php
	
     /* Έλεγχος στοιχείων χρήστη από βάση
     */
	 include ("includes/db_connect.php");
	 include ("includes/functions.php");
?>

<html>
	<head>
		<meta charset='utf-8'>
		<title>Ολοκλήρωση παραγγελίας</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="DialogBox">
		<?php 
			$loggeduser = $_POST['user_id'];
			$cardtype = $_POST['cardtype'];
			$cardno =  escape_a($con, $_POST['cardno']);
			$cardholder =  escape_a($con, $_POST['cardholder']);
			$expirationyear = $_POST['expirationyear'];
			$expirationmonth = $_POST['expirationmonth'];
			$expirationdate = $expirationmonth."/".$expirationyear;
			
			$SQL = "INSERT INTO orders (user_id, credit_card_type, credit_card_number, credit_card_expiration, Credit_card_name)
					VALUES ($loggeduser,  $cardtype,  '$cardno', '$expirationdate', '$cardholder')";
			
			$result = mysqli_query($con, $SQL);

			$order_id = mysqli_insert_id($con);	

			$SQL = "SELECT 	products.prod_id, products.prod_title, products.prod_price,
							cart.quantity, 
							products.prod_price * cart.quantity as TotalPrice
					FROM 	products 
							INNER JOIN cart ON products.prod_id = cart.prod_id
							INNER JOIN users ON users.user_id = cart.user_id
					WHERE 	users.user_id = $loggeduser";
	
			$result = mysqli_query($con, $SQL);
			$total_amount = 0;
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
			{
				$prod_id = $row['prod_id'];
				$quantity = $row['quantity'];
				$prod_price = $row['prod_price'];
				$total_amount += $quantity * $prod_price;
				$SQL = "INSERT INTO order_details (order_id, prod_id, quantity, price)
						VALUES ($order_id, $prod_id, $quantity, $prod_price)";
				$insertorderdetails = mysqli_query($con, $SQL);
			}
			
			$SQL = "INSERT INTO payments (order_id, customer_id, payed_amount)
					VALUES ($order_id, $loggeduser, $total_amount)";
			
			$result = mysqli_query($con, $SQL);
			
			$SQL = "DELETE 
					FROM cart
					WHERE user_id = $loggeduser";
			$result = mysqli_query($con, $SQL);
			
			echo "<img src='images/tick.png' style='height:100px;'/>";
			echo "<h2>Η παραγγελία σας έχει καταχωρηθεί.<br>Σας ευχαριστούμε.</h2>";
			echo "<form method='post' action='index.php'>";
			echo "<input type='hidden' name='user_id' value='".$loggeduser."'>";
			echo "<input type='submit' value='Συνέχεια...'>";
			echo "</form>";
		?>
		</div>
	</body>
</html>
