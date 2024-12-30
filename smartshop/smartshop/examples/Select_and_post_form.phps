<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014
     */
?>

<html>
<head>
<title>Post and Select drop down list box</title>
</head>

<body bgcolor="lightblue">

<form name="user_data" action="./Select_and_post_action.php" method="post">
Enter your first name: <input type="text" name="user_fname" size="20"><br>
Enter your last name: <input type="text" name="user_lname" size="20"><br>
Enter your email: <input type="text" name="user_email" size="20"><br>
Select your favourite browser:

<Select name="dropdown">

<?php
$table=array("Mosaic", "Mozilla", "MS Internet Explorer", "Netscape Navigator", "Opera", "Chrome");
for ($i=0; $i<count($table); $i++) {
   echo"<option> $table[$i]";
}
?>

</Select><br>

<input type="submit"><br>
</form>
</body>
</html>
