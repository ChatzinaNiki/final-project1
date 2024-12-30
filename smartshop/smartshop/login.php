<?php
     /* Είσοδος χρήστη
     */
?>

<html>
	<head>
		<meta charset='utf-8'>
		<title>User login</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="DialogBox">
		<h1>Είσοδος χρήστη</h1>
		<form name="user_data" action="login_action.php" method="post">
		<table style="width: 90%; margin-left: auto; margin-right: auto;">
			<tr>
				<td style="width: 30%">Όνομα χρήστη:</td>
				<td><Input type="text" name="username" size="20"><br><br></td>
			</tr>
			<tr>
				<td>Συνθηματικό:</td>
				<td> <Input type="password" name="userpass" size="20"></td>
			</tr>
			<tr>
				<td colspan="2">
					<hr><br>
				</td>
			</tr>
			<tr>
				<td><Input type="submit" value="Είσοδος"></td>
				<td><Input type="reset" value="Καθαρισμός"></td>
			</tr>
		</table>
		</form>
		</div>
	</body>
</html>
