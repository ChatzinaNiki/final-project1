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

<?php
function php_info()
{
echo "<b><center>Παρουσίαση της PHP στα πλαίσια του μαθήματος Τεχνολογία και Σχεδιασμός Web</b></center><br>";
echo "<b><i><center>Καρανικόλας Νικήτας, Αναπληρωτής Καθηγητής, ΤΕΙ Αθήνας, τμήμα Μηχανικών Πληροφορικής, 7 Απριλίου 2014</i></b></center><br>";
}
?>
</head>

<body bgcolor="lightblue">

<?php
php_info();

if ($_POST['user_fname'] <> "") {
   echo "You have entered first name: "
        .$_POST['user_fname']."<br>";
}
if ($_POST['user_lname'] <> "") {
   echo "You have entered last name: "
        .$_POST['user_lname']."<br>";
}
if ($_POST['user_email'] <> "") {
   echo "You have entered email: "
        .$_POST['user_email']."<br>";
}
if ($_POST['dropdown'] <> "") {
   echo "You have entered browser: "
        .$_POST['dropdown'];
}
?>

</body>
</html>
