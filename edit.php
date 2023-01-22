<?php include ('header.php'); ?>

<?php include ('menu.php'); ?>



<div class="address">
<img src="sermonpic.png" alt="addressicon" class="addicon"  style="width:100%" />
</div>


<div class="about">
<?php
echo "<h2>Sermon Review</h2>";
echo "Did you watch our most recent sermon? We want to know what you thought! Tell us what sermon you saw, when you saw it and what you thought about it. Are there any questions that you want us to answer in a future sermon? " ;
?>
</div>

<?php
$id = $_GET['id']
?>



<form action="editdatabase.php" method="post">

<input type="hidden" name="id" value="<?php echo $id?>">

<label for="name">Your name:</label> 
<input type="text" id="name" name="name">
  <br><br>
<label for="title">Title:</label> 
<input type="text" id="title" name="title">
  <br><br>
<label for="comments">Comments:</label> 
<textarea id="Comments" name="comments"  rows="5" cols="80"></textarea>
  <br><br>
<button>Update</button>
  <br><br>
</form>



<?php

$servername = "mysql8002.site4now.net";
$username = "a8ec59_salliec";
$password = "Chappell2022";
$dbname = "db_a8ec59_salliec";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT  id, name, title, CommentDate, comments FROM Comments";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Title</th>
<th>Date</th>
<th>Comments</th>
</tr>";


    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
<td>" . $row["id"]. "</td>
<td>" . $row["name"]. "</td>
<td>" . $row["title"]. "</td>
<td>" . $row["CommentDate"]. "</td>
<td>" . $row["comments"]. "</td>
<td><a href=\"edit.php?id={$row['id']}\">Edit Row</a>
<br> 
<a href=\"delete.php?id={$row['id']}\">Delete Row</a>
</td>

</tr>";


    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<div>
  <br><br>

<?php include ('footer.php'); ?>


