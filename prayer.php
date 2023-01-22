<?php

@include 'config.php';

if(isset($_POST['add_prayer'])){
   $p_name = $_POST['p_name'];
   $p_email = $_POST['p_email'];
   $p_request = $_POST['p_request'];
 
   $insert_query = mysqli_query($conn, "INSERT INTO `prayer`(name, email ,request) VALUES('$p_name', '$p_email', '$p_request')") or die('query failed');

};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `prayer` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location: prayer.php');
      $message[] = 'prayer has been deleted';
   }else{
      header('location: prayer.php');
      $message[] = 'prayer could not be deleted';
   };
};

if(isset($_POST['update_prayer'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_email = $_POST['update_p_email'];
   $update_p_request = $_POST['update_p_request'];


   $update_query = mysqli_query($conn, "UPDATE `prayer` SET name = '$update_p_name', email = '$update_p_email', request = '$update_p_request' WHERE id = '$update_p_id'");


}

?>

<?php include 'header.php'; ?>
<?php include ('menu.php'); ?>

   




<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new prayer</h3>
   <input type="text" name="p_name" placeholder="enter your name" class="box" required>
   <input type="text" name="p_email" placeholder="enter email" class="box" required>
   <input type="text" name="p_request" placeholder="enter the prayer request" class="box" required>
   <input type="submit" value="add the prayer" name="add_prayer" class="btn">
</form>

</section>


</div>


<?php include ('footer.php'); ?>