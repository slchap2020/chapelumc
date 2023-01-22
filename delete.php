<?php

if (isset ($_GET["id"]) ) {
$id = $_GET["id"];


$servername = "mysql8002.site4now.net";
$username = "a8ec59_salliec";
$password = "Chappell2022";
$dbname = "db_a8ec59_salliec";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "DELETE FROM comments WHERE id=$id";
$conn->query ($sql);
}
header ("location: database.php");
exit;
?>