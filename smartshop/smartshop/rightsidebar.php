	<?php 	
	$debug = "hidden";

	if ($loggeduser > 0)
	{
		$SQL = "SELECT user_fname, user_lname
				FROM users
				WHERE user_id = ".$loggeduser;
		$result = mysqli_query($con, $SQL);
		while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
		{
			$loggedfullname = $row['user_fname']." ".$row['user_lname'];
		}
		echo "Έχετε εισέλθει ως:<br><strong>".$loggedfullname."</strong><br><br>"
		
	?>
		<form action="logout.php" method="POST">
			<input <?php echo $debug; ?> type="text" value="<?php echo $loggeduser ?>">
			<input type="Submit" class="menuButton" value="Αποσύνδεση"><br><br>
		</form>
	<?php
	}
	else
	{
	?>
		<form action="login.php" method="POST">
			<input type="Submit" class="menuButton" value="Σύνδεση"><br><br>
		</form>
	<?php
	}
	if ($loggeduser == 0)
	{
	?>
	<form action="registration.php" method="POST">
		<input <?php echo $debug; ?> type="text" name="user_id" value="<?php echo $loggeduser ?>">
		<input type="Submit" class="menuButton" value="Νέος χρήστης"><br><br>
	</form>
	<?php
	}
	
	if ($loggeduser != 0)
	{
	?>
	<form action="cart.php?cat=<?php echo $category; ?>" method="POST">
		<input <?php echo $debug; ?> type="text" name="user_id" value="<?php echo $loggeduser ?>">
		<input type="Submit" class="menuButton" value="Καλάθι">
	</form>
	<?php
	}
	?>