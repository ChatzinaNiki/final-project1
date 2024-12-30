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
		<title>SmartShop</title>
		<meta charset='utf-8'>
		<script type="text/javascript" src="js/functions.js"></script>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<table class="layout">
			<tr>
			<?php 
				include ("header.html");
			?>
			</tr>
		</table>
		<table class="layout">
			<tr>
			<!-- Αριστερή στήλη που φιλοξενεί τις διαθέσιμες κατηγορίες -->
			<td class='leftsidebar'>
			<?php 
				include ("leftsidebar.php");
			?>
			</td>
			<td class="productsarea">
				<h1>Το καλάθι σας</h1>
			<?php
				$SQL = "SELECT 	products.prod_id, products.prod_title, products.prod_price,
								cart.quantity, 
								products.prod_price * cart.quantity as TotalPrice
						FROM 	products 
								INNER JOIN cart ON products.prod_id = cart.prod_id
								INNER JOIN users ON users.user_id = cart.user_id
						WHERE 	users.user_id = $loggeduser";
		
				$result = mysqli_query($con, $SQL);
				$total_cart_price = 0;
				if (mysqli_num_rows($result) > 0)
				{
					echo "<table>";
					echo "<tr>";
					echo "<th>Προϊόν</th>";
					echo "<th></th>";
					echo "<th>Τιμή</th>";
					echo "<th>Ποσότητα</th>";
					echo "<th>Αξία</th>";
					echo "</tr>";
					while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
					{
						$priceid = "price".$row["prod_id"];
						$totalpriceid = "totalprice".$row["prod_id"];
						echo "<form name='editcart' action='cart_update.php' method='POST'>";
						echo "<tr>";
						echo "<td>";
						echo "<p class='cartdata'>".$row["prod_title"]."</p>";
						echo "</td>";
						echo "<td>";
						echo "<input type='text' hidden name='user_id' value='".$loggeduser."'>";
						echo "<input type='text' hidden name='prod_id' value='".$row["prod_id"]."'>";
						echo "</td>";
						echo "<td>";
						echo "<input type='text' id='".$priceid."' name='price' value='".$row["prod_price"]."' size='10' readonly>";
						echo "</td>";
						echo "<td>";
						echo "<input type='number' id='".$row["prod_id"]."' name='quantity' value='".$row["quantity"]."' min='1'  onchange='calculatetotal(this.id)'>";
						echo "</td>";
						echo "<td>";
						echo "<input type='text' id='".$totalpriceid."' name='totalprice' value='".$row["TotalPrice"]."' size='10' readonly>";
						$total_cart_price += $row["TotalPrice"] * 1.00;
						echo "</td>";
						echo "<td>";
						echo "<input type='submit' name='update' class='menuButton' value='Ενημέρωση'>";
						echo "</td>";
						echo "<td>";
						echo "<input type='submit' name='delete' class='menuButton' value='Διαγραφή'>";
						echo "</td>";
					}
					echo "</form>";
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td><strong>Σύνολο:</strong></td>";
					echo "<td><input type='text' id='total_cart_price' name='price' value='".number_format((float)$total_cart_price, 2, '.', '')."' size='10' readonly></td>";
					echo "<tr>";
					echo "</table>";
					echo "<br>";
					echo "<form action='checkout.php' method='POST'>";
					echo "<input ".$debug." name='user_id' type='text' value='".$loggeduser."'>";
					echo "<input type='Submit' class='menuButton' style='width: 240px;' value='Στο ταμείο...'><br><br>";
					echo "</form>";
				}
				else
					echo "<strong>Το καλάθι σας είναι άδειο.</strong>"
			?>
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
