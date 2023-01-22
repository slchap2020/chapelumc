<?php
 session_start();
    


    if(empty($_SESSION['loggedin']))
    {
        // If they are not logged in, redirect them to the login page.
        header("Location: sessions.php");
        

        die("Redirecting to sessions.php");
    }


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
      header('location: prayeradmin.php');
      $message[] = 'prayer has been deleted';
   }else{
      header('location: prayeradmin.php');
      $message[] = 'prayer could not be deleted';
   };
};

if(isset($_POST['update_prayer'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_email = $_POST['update_p_email'];
   $update_p_request = $_POST['update_p_request'];


   $update_query = mysqli_query($conn, "UPDATE `prayer` SET name = '$update_p_name', email = '$update_p_email', request = '$update_p_request' WHERE id = '$update_p_id'");

 if($update_query){
      $message[] = 'product updated succesfully';
      header('location:prayeradmin.php');
   }else{
      $message[] = 'prayer could not be updated';
      header('location:prayeradmin.php');
   }

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

<section class="display-product-table">

   <table>

      <thead>

         <th>name</th>
         <th>email</th>
         <th>prayer request</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_prayer = mysqli_query($conn, "SELECT * FROM `prayer`");
            if(mysqli_num_rows($select_prayer) > 0){
               while($row = mysqli_fetch_assoc($select_prayer)){
         ?>

         <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['request']; ?></td>
            <td>
               <a href="prayeradmin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a><br br>
               <a href="prayeradmin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no prayer added</div>";
            };
         ?>
      </tbody>
   </table>

</section>
<button class="menubutton" onclick="document.location = 'adminmenu.php'">Return to Admin Menu</button>
<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `prayer` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="text" class="box" required name="update_p_email" value="<?php echo $fetch_edit['email']; ?>">
      <input type="text" class="box" required name="update_p_request" value="<?php echo $fetch_edit['request']; ?>">
      <input type="submit" value="update the prayer" name="update_prayer" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>


<?php include ('footer.php'); ?>