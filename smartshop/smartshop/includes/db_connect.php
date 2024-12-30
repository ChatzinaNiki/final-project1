<?php
// Ro!tania$3567
define("DB_SERVER", "localhost");
define("DB_DATABASE", "smartshop");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

$con=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die ("Cannot connect to SmartShop database");
@mysqli_select_db($con, DB_DATABASE) or die ("Cannot select db");

mysqli_set_charset($con, 'utf8')

?>