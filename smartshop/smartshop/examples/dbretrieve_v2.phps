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

// @mysql_connect("localhost", "root", "nnk") or die ("can not connect to dbms");
$con=mysql_connect("localhost", "root", "nnk") or die ("can not connect to dbms");
@mysql_select_db("test") or die ("can not select db");

$charset = mysql_client_encoding($con);
echo "The current character set is: $charset"."<br>";

echo "changing client encoding to utf8: ";
if (mysql_set_charset('utf8',$con)) echo "done<br>"; else echo "fail<br>";

// verify the change
$charset = mysql_client_encoding($con);
echo "The current character set (after the change) is: $charset"."<br><br>";

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
   echo "</TD></TR>\n";
}
?>

</table>
</body>
</html>
