<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014

        This program is equivalent with "insert_melos.php" on page 270
        of my book (Web Technologies and e-commerce; ISBN: 960-8105-94-3).
     */
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Insert Members of an Association</title>
</head>
<body>

<?php
if (isset($_POST['sname']) && isset($_POST['fname'])) {

   /*
    * there should be a database schema named "test"
    * it should has a table named "members"
    * change "root" to some user that has access to the database (schema) "members"
    * change "nnk" to the password of the above user 
   */
   @mysql_connect("localhost", "root", "nnk") or die ("can not connect to dbms");
   @mysql_select_db("test") or die ("can not select db");

   mysql_set_charset('utf8');

   $insert_command="insert into members values(NULL, "."'".$_POST['fname']."', '".$_POST['sname']."')";
   $result=mysql_query($insert_command);
   if ($result)
      echo 'Successfull member insertion';
   else
      echo 'Failure in member insertion';
   ?>
   <a href="MembersInsert.php">Back to members form</a>
   <?php
}
else {
   ?>
   <form name="insert_member_form" action="MembersInsert.php" method="post">
   <table>
   <tr>
   <td>Προσδιορίστε το μικρό όνομα του μέλους: </td>
   <td><input type="text" name="fname" size="25"></td>
   </tr>
   <td>Προσδιορίστε το επώνυμο του μέλους: </td>
   <td><input type="text" name="sname" size="30"></td>
   <tr>
   <td></td><td><input type="submit" value="insert"></td>
   </tr>
   </table>
   </form>
   <?php
}
?>

</body>
</html>
