<?php
     /* Dr. Nikitas N. Karanikolas
        Assoc. Prof. TEI of Athens
        Dept. of Informatics
        April 7, 2014
     */
?>
<HTML>

<BODY bgcolor="lightblue">

<Form name="user_data" action="./form_post.php" method="post">

First Name: <Input type="text" name="fname" size="20"><br>
Last Name: <Input type="text" name="lname" size="20"><br>

<Input type="submit" value="submit"><br>
</Form>

<?php

 print $HTTP_POST_VARS['fname'];
 echo "<br>";
 print $HTTP_POST_VARS['lname'];

?>

</BODY>
</HTML>
