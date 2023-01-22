<?php


 session_start();
    


    if(empty($_SESSION['loggedin']))
    {
        // If they are not logged in, redirect them to the login page.
        header("Location: sessions.php");
        

        die("Redirecting to sessions.php");
    }
?>


<?php

@include 'config.php';

if(isset($_POST['add_staff'])){
   $p_name = $_POST['p_name'];
   $p_department= $_POST['p_department'];
   $p_job= $_POST['p_job'];
   $p_interests = $_POST['p_interests'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = $p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `staff`(name, department, job, interests, image) VALUES('$p_name', '$p_department', '$p_job', '$p_interests','$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'staff member add succesfully';
   }else{
      $message[] = 'could not add the staff member';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `staff` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:staffadmin.php');
      $message[] = 'staff member has been deleted';
   }else{
      header('location:staffadmin.php');
      $message[] = 'staff member could not be deleted';
   };
};

if(isset($_POST['update_staff'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_department = $_POST['update_p_department'];
   $update_p_job = $_POST['update_p_job'];
   $update_p_interests = $_POST['update_p_interests'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `staff` SET name = '$update_p_name', department= '$update_p_department', job= '$update_p_job', interests= '$update_p_interests',image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'staff member updated succesfully';
      header('location:staffadmin.php');
   }else{
      $message[] = 'staff member could not be updated';
      header('location:staffadmin.php');
   }

}

?>

<?php include 'header.php'; ?>
<?php include ('menu.php'); ?>

   




<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new staff member</h3>
   <input type="text" name="p_name" placeholder="enter the staff member name" class="box" required>
   <input type="text" name="p_department" min="0" placeholder="enter the staff members department" class="box" required>
   <input type="text" name="p_job" min="0" placeholder="enter the staff members job" class="box" required>
   <input type="text" name="p_interests" min="0" placeholder="enter the staff members interests" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the staff member" name="add_staff" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>staff image</th>
         <th>staff name</th>
         <th>staff department</th>
         <th>staff job</th>
         <th>staff interests</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_staff = mysqli_query($conn, "SELECT * FROM `staff`");
            if(mysqli_num_rows($select_staff) > 0){
               while($row = mysqli_fetch_assoc($select_staff)){
         ?>

         <tr>
            <td><img src="<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td><?php echo $row['job']; ?></td>
            <td><?php echo $row['interests']; ?></td>
            <td>
               <a href="staffadmin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a><br br>
               <a href="staffadmin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no staff member added</div>";
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
      $edit_query = mysqli_query($conn, "SELECT * FROM `staff` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="text" class="box" required name="update_p_department" value="<?php echo $fetch_edit['department']; ?>">
      <input type="text" class="box" required name="update_p_job" value="<?php echo $fetch_edit['job']; ?>">
      <input type="text" class="box" required name="update_p_interests" value="<?php echo $fetch_edit['interests']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the staff member" name="update_staff" class="btn">
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