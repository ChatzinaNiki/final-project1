<?php
	
	include("includes/db_connect.php");
	$loggeduser=0;
	if (isset($_POST['user_id']))
		$loggeduser = $_POST['user_id'];
	else
		$loggeduser = 0;
	
	if (!isset($_GET['cat']))
		$category=0;
	else
		$category = $_GET['cat'];

	$SQL = "select 		categories.cat_name
			from 		categories
			where 		categories.cat_id=".$category;
	
	$result = mysqli_query($con, $SQL);
	while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
	{
		$cat_name = $row['cat_name'];
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>SmartShop</title>
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
			<td class="leftsidebar">
			<?php 
				include ("leftsidebar.php");
			?>
			</td>
			<td class="productsarea">
			<h1><strong>Προϊόντα της κατηγορίας <?php echo $cat_name; ?></strong></h1>

			<?php
			$SQL = "select 		products.prod_id, prod_title, prod_description,
								prod_price, product_status_description, products.prod_photo
					from 		products inner join prod_cat 
								on products.prod_id=prod_cat.prod_id
								inner join stock_status 
								on products.prod_stock = stock_status.product_status_id
					where 		prod_cat.cat_id=".$category;
			
			$result = mysqli_query($con, $SQL);
			
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
			{
				echo "<img class='productthumbnail' src='images/".$row["prod_photo"]."' />";
				echo "<p class='productname'>".$row["prod_title"]."</p><br>";
				echo "<p class='productdprice'>Τιμή: ".$row["prod_price"]."€</p><br>";
				echo "<p class='productdescription'>".$row["prod_description"]."</p><br>";
				echo "<p class='productavailability'>".$row["product_status_description"]."</p><br>";
				$productID = $row["prod_id"];
				if ($loggeduser > 0)
				{
					?>
					<form style="margin-top: -42px; margin-bottom: 22px;" action="cart_action.php" method="POST">
					<span>Ποσότητα:  </span>
					<input type="number" name="quantity" value="1" min="1" width="3">
					<input type="submit" value="Στο καλάθι">
					<input hidden type="text" name="user_id" value="<?php echo $loggeduser; ?>">
					<input hidden type="text" name="prod_id" value="<?php echo $productID; ?>">
					</form>
					<?php
				}
				echo "<hr>";
			}
			?>
			</td>
			<!-- Δεξιά στήλη που φιλοξενεί τα κουμπιά σύνδεσης, αποσύνδεσης
				 εγγραφής και καλαθιού
			-->
			<td class='rightsidebar'>
				<?php include ("rightsidebar.php"); ?>
			</td>
			</tr>
		</table>
	</body>
</html>
