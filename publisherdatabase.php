<?php


 session_start();
    


    if(empty($_SESSION['loggedin']))
    {
        // If they are not logged in, redirect them to the login page.
        header("Location: sessions.php");
        

        die("Redirecting to sessions.php");
    }
?>

<?php include ('header.php'); ?>

<?php include ('menu.php'); ?>



<div class="address">
<img src="staffreviewpic.png" alt="addressicon" class="addicon"  style="width:100%" />
</div>



<form action="processdatabase.php" method="post" class="add-product-form" enctype="multipart/form-data">
<h3>Staff Review</h3>
<h4>Have you been helped by one of our staff members recently? Did you have a good or bad experience? Tell us about it below!</h4>
<input type="text" id="name" name="name" placeholder="enter your name" class="box" required>
  <br><br>
<input type="text" id="title" name="title" placeholder="enter comment title" class="box" required>
  <br><br>
<input type="text" id="Comments" name="comments"  placeholder="enter comments" class="box" required>
  <br><br>
<input type="submit" value="submit" class="btn">
  <br><br>
</form>


<section class="display-product-table">
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
<thead>
<th>Name</th>
<th>Title</th>
<th>Date</th>
<th>Comments</th>
<th>Action</th>
</thead>";


    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
<td>" . $row["name"]. "</td>
<td>" . $row["title"]. "</td>
<td>" . $row["CommentDate"]. "</td>
<td>" . $row["comments"]. "</td>
<td><a href=\"edit.php?id={$row['id']}\">Edit Row</a>

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
<button class="menubutton" onclick="document.location = 'publishermenu.php'">Return to Publisher Menu</button>
</section>
<?php include ('footer.php'); ?>