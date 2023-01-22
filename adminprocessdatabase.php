<?php


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

$sql = "INSERT INTO comments (name, title, comments) VALUES ('$name', '$title', '$comments')";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$name."-".$title."-".$comments;
header("location:/admindatabase.php"); 
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>