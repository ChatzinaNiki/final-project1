<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014
     */
?>

<html>
<head>
<title>QueryString and Select drop down list box</title>
</head>

<body bgcolor="lightblue">
<?php
function php_info()
{
echo "<b><center>Παρουσίαση της PHP στα πλαίσια του μαθήματος Τεχνολογία και Σχεδιασμός Web</b></center><br>";
echo "<b><i><center>Καρανικόλας Νικήτας, Αναπληρωτής Καθηγητής, ΤΕΙ Αθήνας, τμήμα Μηχανικών Πληροφορικής, 7 Απριλίου 2014</i></b></center><br>";
}

php_info();
?>

<form name="user_data" action="./QueryString_and_Select.php" method="get">
Enter your first name: <input type="text" name="user_fname"><br>
Enter your last name: <input type="text" name="user_lname"><br>
Enter your email: <input type="text" name="user_email"><br>
Select your favorite browser:

<Select name="dropdown">

<?php
$table=array("Mosaic", "Mozilla", "MS Internet Explorer", "Netscape Navigator", "Opera", "Chrome");
for ($i=0; $i<count($table); $i++) {
   echo "<option> $table[$i]";
}
?>

</Select><br>

<input type="submit"><br>
</form>

<?php
if (isset($_GET['user_fname']) && isset($_GET['user_lname']) &&
    isset($_GET['user_email'])&& isset($_GET['dropdown'])) { 

   if ($_GET['user_fname'] <> "") {
      echo "You have entered first name: ".$_GET['user_fname']."<br>";
   }
   if ($_GET['user_lname'] <> "") {
      echo "You have entered last name: ".$_GET['user_lname']."<br>";
   }
   if ($_GET['user_email'] <> "") {
      echo "You have entered email: ".$_GET['user_email']."<br>";
   }
   if ($_GET['dropdown'] <> "") {
      echo "You have entered browser: ".$_GET['dropdown'];
   }
}
?>

</body>
</html>
