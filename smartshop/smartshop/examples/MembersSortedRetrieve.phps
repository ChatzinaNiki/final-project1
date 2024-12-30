<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014

        This program is equivalent with "melh_sort.php" on page 273
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

if (isset($_GET['sort']))
   $sort_field=$_GET['sort'];
else
   $sort_field="id";

/*
 * There should be a database schema named "test".
 * It should has a table named "members".
 * This table should has three fields (id, fname, lname).
 * Change "root" to some user that has access to the database (schema) "members".
 * Change "nnk" to the password of the above user 
*/
@mysql_connect("localhost", "root", "nnk") or die ("can not connect to dbms");
@mysql_select_db("test") or die ("can not select db");

mysql_set_charset('utf8');

$query="select id, fname, lname from members order by ".$sort_field;
echo "[".$query."]";
$result=mysql_query($query);

?>
<table border="6" width="50%" bgcolor="cyan">
<tr>
<th><a href="MembersSortedRetrieve.php?sort=id">α/α</a></th>
<th><a href="MembersSortedRetrieve.php?sort=fname">Όνομα</a></th>
<th><a href="MembersSortedRetrieve.php?sort=lname">Επώνυμο</a></th>
</tr>

<?php

for ($r=0; $r<mysql_num_rows($result); $r++) {
   $row_array=mysql_fetch_row($result);
   echo '<TR>';
   echo '<TD>'.$row_array[0].'</TD>';
   echo '<TD>'.$row_array[1].'</TD>';
   echo '<TD>'.$row_array[2].'</TD>';
   echo '</TR>';
}
?>

</table>
</body>
</html>
