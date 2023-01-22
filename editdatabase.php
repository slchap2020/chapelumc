<?php

$id= $_POST["id"];
$name = $_POST["name"];
$title= $_POST["title"];
$comments= $_POST["comments"];

$servername = "mysql8002.site4now.net";
$username = "a8ec59_salliec";
$password = "Chappell2022";
$dbname = "db_a8ec59_salliec";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}


$id = $_POST['id'];

$sql = "UPDATE comments SET name='$name', title='$title', comments='$comments' WHERE id='$id'";


if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$name."-".$title."-".$comments;
header ("location: database.php");

} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>