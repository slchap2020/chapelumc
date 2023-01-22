<?php

@include 'config.php';

if(isset($_POST['add_review'])){
   $product = $_POST['product'];
   $comments = $_POST['comments'];
 
   $insert_query = mysqli_query($conn, "INSERT INTO `productreview`(product, comments) VALUES('$product', '$comments')") or die('query failed');};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `productreview` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location: forms.php');
      $message[] = 'review has been deleted';
   }else{
      header('location: forms.php');
      $message[] = 'review could not be deleted';
   };
};

if(isset($_POST['update_prayer'])){
   $update_p_id = $_POST['update_p_id'];
   $update_product = $_POST['update_product'];
   $update_comments = $_POST['update_comments'];


   $update_query = mysqli_query($conn, "UPDATE `productreview` SET product= '$update_products', comments= '$update_comments' WHERE id = '$update_p_id'");


}

?>

<?php include 'header.php'; ?>
<?php include ('menu.php'); ?>

<div class="container">

<section>
<form method="POST" class= "add-product-form" enctype="multipart/form-data">
 <h3>Choose a product:</h3>
<select class="box" name="product">
<option value="Thermos">Thermos</option>   
<option value="T-Shirt">T-Shirt</option>
<option value="Hat">Hat</option>
<option value="Backpack">Backpack</option>
<option value="Hoodie">Hoodie</option>
<option value="Long Tee">Long-sleeved Tee</option>
<option value="Notebook">Notebook</option>
<option value="Sticker">Logo Sticker</option>
<option value="Bottle">Water Bottle</option>
<option value="Ornament">Christmas Ornament</option>
</select>
  <br><br>

 <h3>What did you think?</h3>
<input type="text" name="comments" placeholder="Comments" class="box" required>
<input type="submit" name="add_review" value="Submit Review" class="btn"/>
		</form>
</section>


</div>
<section class="display-product-table">

   <table>

      <thead>
         <th>product name</th>
         <th>product review</th>
         <th>review time</th>
      </thead>

      <tbody>
         <?php
         
            $select_review = mysqli_query($conn, "SELECT * FROM `productreview`");
            if(mysqli_num_rows($select_review) > 0){
               while($row = mysqli_fetch_assoc($select_review)){
         ?>

         <tr>
            <td><?php echo $row['product']; ?></td>
            <td><?php echo $row['comments']; ?></td>
            <td><?php echo $row['time']; ?></td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no review added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<?php include ('footer.php'); ?>
