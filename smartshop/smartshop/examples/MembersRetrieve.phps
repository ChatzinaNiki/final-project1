<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014

        This program is equivalent with "listing_php.php" on page 268
        of my book (Web Technologies and e-commerce; ISBN: 960-8105-94-3).
     */
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Retrieve Members of Association</title>
</head>
<body>

<?php

/*
 * there should be a database schema named "test"
 * it should has a table named "members"
 * change "root" to some user that has access to the database (schema) "members"
 * change "nnk" to the password of the above user 
*/
@mysql_connect("localhost", "root", "nnk") or die ("can not connect to dbms");
@mysql_select_db("test") or die ("can not select db");

mysql_set_charset('utf8');

$query="select * from members";
$result=mysql_query($query);
?>
<table border="6" width="50%" bgcolor="cyan">
<tr>
<?php echo "<th colspan=".mysql_num_fields($result).">Listing Members</th>"; ?>
</tr>
<?php

for ($r=0; $r<mysql_num_rows($result); $r++) {
   $row_array=mysql_fetch_row($result);
   echo '<TR>';
   for ($c=0; $c<mysql_num_fields($result); $c++)
      echo '<TD>'.$row_array[$c].'</TD>';
   echo '</TR>';
}
?>

</table>
</body>
</html>
