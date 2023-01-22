<?php

@include 'config.php';


session_start();


if(isset($_POST['submit'])){

   $uname = $_POST['uname'];
   $psword = $_POST['psword'];

 $insert_query = mysqli_query($conn, "INSERT INTO `login`(uname, psword) VALUES('$uname', '$psword')") or die('query failed');

	if($_POST['psword'] == "admin" &&  $_POST['uname'] == "admin"  )
	{
		$_SESSION['loggedin'] = True;
		
		 header('location: http://chappellumc.com/adminmenu.php');
	
	}
if($_POST['psword'] == "publisher" &&  $_POST['uname'] == "publisher"  )
	{
		$_SESSION['loggedin'] = True;
		
		 header('location: http://chappellumc.com/publishermenu.php');
	
	}
if($_POST['psword'] == "customer" &&  $_POST['uname'] == "customer"  )
	{
		$_SESSION['loggedin'] = True;
		
		 header('location: http://chappellumc.com/index.php');
		
	}
	else
	{
			echo "Username or Password is wrong. Please try again.";
			
					
	}
};
?>

<?php include ('header.php'); ?>

<?php include ('menu.php'); ?>




<html>

<body>

 <section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Log In</h3>
   <input type="text" name="uname" placeholder="enter username" class="box" required>
   <input type="text" name="psword"  placeholder="enter password" class="box" required>
  <input type="submit" name="submit" value="Log In"  class="btn">
</form>

</section>