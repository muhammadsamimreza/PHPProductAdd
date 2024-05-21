<?php
$dbhost = "localhost";
$dbuser ="root";
$dbpass ="";
$dbname = "productpos";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

if (!$conn) {
    die("Connection Faild !");
}
?>