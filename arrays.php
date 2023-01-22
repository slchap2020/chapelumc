<?php
session_start();
if(isset($_POST['read']))
{
        $_SESSION['update'] = True;
}
 
?>

<?php include ('header.php'); ?>

<?php include ('menu.php'); ?>



<?php
// define variables and set to empty values
$staff= $job= $department = $interests=  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION["staff"]= test_input($_POST["staff"]);
  $_SESSION["job"]= test_input($_POST["job"]);
  $_SESSION["department"]= test_input($_POST["department"]);
  $_SESSION["interests"]= test_input($_POST["interests"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
session_start();
if(isset($_POST['read']))
{
	if (!isset($_SESSION['loggedin']))
		{
				header('Location: sessions.php');
			}
		else
			{
				if (isset($_POST['read']))
					{
                                                $staff= $_POST['staff'];
						header('Location: $staff');	
						
					}
			}
}
?>



<?php
switch ($staff) 
{ case "1" : header( "Location: http://chappellumc.com/dumbledore.php" );
break;
case "2" : header( "Location: http://chappellumc.com/sparrow.php" );
break;
case "3" : header( "Location: http://chappellumc.com/gladiator.php" );
break;
case "4" : header( "Location: http://chappellumc.com/america.php" );
break;
case "5" : header( "Location: http://chappellumc.com/ella.php" );
break;
case "6" : header( "Location: http://chappellumc.com/kevin.php" );
break;
case "7" : header( "Location: http://chappellumc.com/groot.php" );
break;
case "8" : header( "Location: http://chappellumc.com/shrek.php" );
break;
case "9" : header( "Location: http://chappellumc.com/ironman.php" );
break;
case "10" : header( "Location: http://chappellumc.com/montoya.php" );
break;
case "11" : header( "Location: http://chappellumc.com/davey.php" );
break;
case "12" : header( "Location: http://chappellumc.com/batman.php" );
break;
case "13" : header( "Location: http://chappellumc.com/mushu.php" );
break;
}
?>


<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Update a Staff Member</h3>
<select name="staff"  class="box" required>
<option>select a staff member to edit</option>
<option value="1">Albus Dumbledore</option>   
<option value="2">Jack Sparrow</option>
<option value="3">Maximus Gladiator</option>
<option value="4">Captain America</option>
<option value="5">Cinder Ella</option>
<option value="6">Kevin McCallister</option>
<option value="7">Baby Groot</option>
<option value="8">Shrek Ogre</option>
<option value="9">Iron Man</option>
<option value="10">Inigo Montoya</option>
<option value="11">Davey Jones</option>
<option value="12">Bat Man</option>
<option value="13">Mushu Dragon</option>
</select>
   <input type="text" name="job" placeholder="enter job" class="box" required>
   <input type="text" name="department" placeholder="enter department" class="box" required>
   <input type="text" name="interests" placeholder="enter interests" class="box" required>
   <input type="submit" value="Update Staff Member" name="read" class="btn">
</form>
<button onclick="document.location = 'logout.php'" class="btn">log out</button>
</section>

</body>

</html>





<div>
<?php include ('footer.php'); ?>