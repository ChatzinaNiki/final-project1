<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014
     */
?>

<html>
<head>
<title>QueryString Page</title>
<body bgcolor="lightblue">

<?php
function php_info()
{
echo "<b><center>���������� ��� PHP ��� ������� ��� ��������� ���������� ��� ���������� Web</b></center><br>";
echo "<b><i><center>����������� �������, ����������� ���������, ��� ������, ����� ��������� ������������, 7 �������� 2014</i></b></center><br>";
}
php_info();
if ($_GET['user_fname'] <> "") {echo "You have entered first name: ".$_GET['user_fname']."<br>";}
if ($_GET['user_lname'] <> "") {echo "You have entered last name: ".$_GET['user_lname']."<br>";}
if ($_GET['user_email'] <> "") {echo "You have entered email: ".$_GET['user_email']."<br>";}
?>
</body>
</head>
</html>
