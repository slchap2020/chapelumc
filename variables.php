<?php

@include 'config.php';



?>

<?php include ('header.php'); ?>

<?php include ('menu.php'); ?>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<div class="container">

<section class="products">

   <h1 class="heading">Staff</h1>

   <div class="box-container">

      <?php
      
      $select_staff = mysqli_query($conn, "SELECT * FROM `staff`");
      if(mysqli_num_rows($select_staff) > 0){
         while($fetch_staff = mysqli_fetch_assoc($select_staff)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="<?php echo $fetch_staff['image']; ?>" alt="">
            <h3><?php echo $fetch_staff['name']; ?></h3>
<div class="price"><?php echo $fetch_staff['job']; ?></div>
<div class="department"><?php echo $fetch_staff['department']; ?></div>
            <h4><?php echo $fetch_staff['interests']; ?></h4>
            <input type="hidden" name="staff_name" value="<?php echo $fetch_staff['name']; ?>">
            <input type="hidden" name="staff_department" value="<?php echo $fetch_staff['department']; ?>">
            <input type="hidden" name="staff_job" value="<?php echo $fetch_staff['job']; ?>">
            <input type="hidden" name="staff_interests" value="<?php echo $fetch_staff['interests']; ?>">
            <input type="hidden" name="staff_image" value="<?php echo $fetch_staff['image']; ?>">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>
<button class="btn" onclick="document.location = 'database.php'">Staff Member Review</button>
<button class="btn" onclick="document.location = 'logout.php'">log out</button>

</div>

<div>
<?php include ('footer.php'); ?>