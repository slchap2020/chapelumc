<?php include ('header.php'); ?>

<?php include ('menu.php'); ?>



<div class="address">
<img src="addresspic.png" alt="addressicon" class="addicon"  style="width:100%" />
</div>

<?php
// define variables and set to empty values
$nameErr = $emailErr =  "";
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Sign Up to Receive Our Weekly Newsletter</h3>
   <input type="text" name="name" placeholder="enter your name" class="box" required>
  <span class="error"><?php echo $nameErr;?></span>
   <input type="text" name="email" placeholder="enter your email" class="box" required>
  <span class="error"> <?php echo $emailErr;?></span>
   <input type="submit" value="Submit" name="submit" class="btn">
</form>



</section>
<div class="add-product-form">
<?php

echo "<h3>Your Input:</h3>";
echo "<p>$name</p>";
echo "<br>";
echo  "<p>$email</p>";
echo "<br>";

?>
</div>
<div>
<?php include ('footer.php'); ?>



