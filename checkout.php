<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $address= $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $zipcode= $_POST['zipcode'];
   $card_number= $_POST['card_number'];
   $exp_date= $_POST['exp_date'];
   $security_code= $_POST['security_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
         $pricetax += $price_total*1.2;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, address, city, state, country, zipcode, total_products, total_price, pricetax, card_number, exp_date, security_code) VALUES('$name','$number','$email','$address','$city','$state','$country','$zipcode','$total_product','$price_total', '$pricetax', '$card_number', '$exp_date', '$security_code')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$address.", ".$city.", ".$state.", ".$country." - ".$zipcode."</span> </p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<?php include ('header.php'); ?>

<?php include ('menu.php'); ?>

<?php include 'shopheader.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
      <span class="grand-total"> grand total with tax : $<?= $grand_total*1.2; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>address</span>
            <input type="text" placeholder="e.g. 15563 Greentree Rd." name="address" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. Lynchburg" name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. Virginia" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. United States" name="country" required>
         </div>
         <div class="inputBox">
            <span>Zip code</span>
            <input type="text" placeholder="e.g. 123456" name="zipcode" required>
         </div>
         <div class="inputBox">
            <span>Credit Card Number</span>
            <input type="number" placeholder="e.g. 0000 0000 0000 0000" name="card_number" required>
         </div>
         <div class="inputBox">
            <span>Expiration Date</span>
            <input type="text" placeholder="e.g. 01/30" name="exp_date" required>
         </div>
         <div class="inputBox">
            <span>Security Code</span>
            <input type="text" placeholder="e.g. 111" name="security_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>
<div>
<?php include ('footer.php'); ?>