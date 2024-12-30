<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014
     */
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Retrieve Fruits from a Database</title>
</head>
<body>

<?php

/*
 * there should be a database schema named "test"
 * it should has a table named "fruits"
 * change "root" to some user that has access to the database (schema) "test"
 * change "nnk" to the password of the above user 
*/
@mysql_connect("localhost", "root", "nnk") or die ("can not connect to dbms");
@mysql_select_db("test") or die ("can not select db");

$query="select * from fruits";
$result=mysql_query($query);
?>
<table>
<tr><th>List of fruits</th></tr>
<?php
for ($r=0; $r<mysql_num_rows($result); $r++) {
   $row_array=mysql_fetch_row($result);
   echo '<TR><TD>';
   echo $row_array[1];
   echo '</TD></TR>';
}
?>

</table>
</body>
</html>
