<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014
     */
?>

<html>

<body bgcolor=lightblue>
<form action="./form_post_multivalue.php" method="post">
	First name:       <input type="text" name="myvar[]"><br>
	Alternative name: <input type="text" name="myvar[]"><br>
	Alternative name: <input type="text" name="myvar[]"><br>
	<input type="submit" value="Submit">
</form>
<hr>
<p>The information received from the form above was:</p>

<?php

if (isset($_POST['myvar'])) {
 
   for ($i=0; $i<count($_POST['myvar']); $i++) {
      echo "η τιμή της <b>".($i+1)."ης</b> myvar είναι <b>".$_POST['myvar'][$i]."</b>";
      echo "</p>";
   }
}

?>

</body>
</html>
