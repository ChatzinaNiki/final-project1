<html>
	<head>
		<meta charset='utf-8'>
		<title></title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
<?php
	$debug = 'hidden';
	
	echo "<form action='index.php' method='POST'>";
	echo "<input ".$debug." name='user_id' type='text' value='".$loggeduser."'>";
	echo "<input type='Submit' class='menuButton' value='Αρχική'><br><br>";
	echo "</form>";
	echo "<h2>Κατηγορίες</h2>";

	$SQL = "select 		cat_id, cat_name 
			from 		categories 
			order by 	cat_id";
	$result = mysqli_query($con, $SQL);
	
	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		echo "<form action='index.php?cat=".$row["cat_id"]."' method='POST'>";
		echo "<input ".$debug." name='user_id' type='text' value='".$loggeduser."'>";
		echo "<input type='Submit' class='menuButton' value='".$row["cat_name"]."'><br><br>";
		echo "</form>";
	}
	echo "</ul>";
?>
	<body>
	<ul>
		<li>Μαρία Καλατζή<br>mscict22019</li>
		<li>Στέλιος Κιουχουλάκης<br>mscict22027</li>
		<li>Έφη Κοντοδιαμαντή<br>mscict22030</li>
		<li>Νίκη Χατζίνα<br>mscict22075</li>
	</ul>
	</body>
</html>
