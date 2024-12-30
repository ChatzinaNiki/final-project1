<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014
     */
?>

<HTML>
<HEAD>
<TITLE>QueryString Page</TITLE>

<?php
function php_info()
{
echo "<b><center>Παρουσίαση της PHP στα πλαίσια του μαθήματος Τεχνολογία και Σχεδιασμός Web</b></center><br>";
echo "<b><i><center>Καρανικόλας Νικήτας, Αναπληρωτής Καθηγητής, ΤΕΙ Αθήνας, τμήμα Μηχανικών Πληροφορικής, 7 Απριλίου 2014</i></b></center><br>";
}
?>
</HEAD>
<BODY bgcolor="lightblue">
<?php
php_info();
?>
<Form name="user_data" action="querystring_php.php" method="get">

Enter your First Name:
<Input type="text" name="user_fname" size="20"><br>
Enter your Last Name:
<Input type="text" name="user_lname" size="20"><br>
Enter your email:
<Input type="text" name="user_email" size="20"><br>

<Input type="submit" value="Πάτησέ με"><br>
</Form>

<?php

if (isset($_GET['user_fname']) && isset($_GET['user_lname']) &&
    isset($_GET['user_email'])) { 

   if ($_GET['user_fname'] <> "") {
      echo "You have entered first name: "
           .$_GET['user_fname']."<br>";
   }
   if ($_GET['user_lname'] <> "") {
      echo "You have entered last name: "
           .$_GET['user_lname']."<br>";
   }
   if ($_GET['user_email'] <> "") {
      echo "You have entered email: "
           .$_GET['user_email']."<br>";
   }

}
?>
</body>
</html>
