<?php
     /* Εισαγωγή νέου χρήστη στη βάση
     */
	 include ("includes/db_connect.php");
	 include ("includes/functions.php");
?>

<html>
<head>
	<meta charset='utf-8'>
	<title>Registration user</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
	$username=escape_a($con,$_POST["username"]);
	$userpass=escape_a($con,$_POST["userpass"]);
	$useremail=escape_a($con,$_POST["useremail"]);
	$user_fname=escape_a($con,$_POST["user_fname"]);
	$user_lname=escape_a($con,$_POST["user_lname"]);
	$title=escape_a($con,$_POST["title"]);
	$useraddr=escape_a($con,$_POST["useraddr"]);
	$usercity=escape_a($con,$_POST["usercity"]);
	$usercity1=escape_a($con,$_POST["usercity1"]);
	$userzip=escape_a($con,$_POST["userzip"]);
	$usercountry=escape_a($con,$_POST["usercountry"]);
	$sql="insert into users(
							user_name,user_pass,
							user_email,user_fname,user_lname,user_title,
							user_street_and_number,user_city,user_state,
							user_zipcode,user_country) values ('$username','$userpass','$useremail','$user_fname',
															'$user_lname','$title','$useraddr','$usercity','$usercity1',
															'$userzip','$usercountry')";
	$result=mysqli_query($con,$sql);
	$user_id=0;
	if ($result){
		$user_id = mysqli_insert_id($con);
		echo '<div class="DialogBox">';
		echo '<img src="images/tick.png" style="height:100px;"/>';
		echo '<h2>Καλωσορίσατε στο SmartShop</h2>';
		echo '<h3>Η εγγραφή σας έγινε επιτυχώς </h3><br><br>';
		echo 'Όνομα χρήστη:'.$username.'<br><br><br>';
		
		echo '<form method="post" action="index.php">';
		echo '	<input type="text" hidden name="user_id" value="'.$user_id.'" /><br><br>';
		echo '	<input type="submit" value="Ξεκινήστε τις αγορές σας..." />';
		echo '</form>';
		echo '</div>';

	}
	else
		echo "Υπήρξε πρόβλημα με την εγγραφή σας";
?>

</BODY>
</HTML>
