<?php include ('header.php'); ?>

<?php include ('menu.php'); ?>


<?php
    session_name("shop");
    session_start();

    $errorqueue = '';

    include("users.php");
    include("products.php");

    $action = (isset($_GET['action'])) ? $_GET['action']: ""; 
    switch($action)
    {
  case "login":
            if(isset($_SESSION['username'])) 
            {
                $errorqueue= "We've already logged in!";
            } else {
                $errorqueue = "Invalid username/password";
                $username = (isset($_POST['username'])) ? $_POST['username']: ""; 
                $password = (isset($_POST['password'])) ? $_POST['password']: ""; 
                foreach($accounts as $value) 
                {
                    if(($username == $value['username']) && ($password == $value['password']))
                    {
                    
                        $_SESSION['username'] = $username;
                        $_SESSION['cart'] = ''; 

                    }
                }
            }
            break;
        case "logout":
            session_unset(); 
            break;
        case "additem":
           
            $itemid = (isset($_GET['itemid'])) ? $_GET['itemid']: "";
            if($itemid != "")
            {
                if($_SESSION['cart'] == "")
                {
                    $_SESSION['cart'] = array($products[$itemid]);
                } else {
                    array_push($_SESSION['cart'], $products[$itemid]);
                }
            }
            break;
        case "clearcart":
            $_SESSION['cart'] = "";
            break;
    }

    echo <<<SHOP
    <html>


            <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"> </script>
            <script type="text/javascript" language="javascript">
                $(function() {
                    $('.button').mouseover(function() {
                        $(this).animate({opacity:1},200);
                    })
                    .mouseleave(function() {
                        $(this).animate({opacity:.6},200);
                    });
                    $('#login_button').click(function() {
                        $('#login_form').submit();
                    });
                    $('.shop_item').click(function() {
                        var itemid = $(this).attr("id");
                        var location = "cmssessions.php?action=additem&itemid="+itemid;
                        window.location.href = location;
                    });
                    $('.shop_item').mouseover(function() {
                        $(this).css("background-color","#CCC");
                    })
                    .mouseleave(function() {
                        $(this).css("background-color","transparent");
                    });
                    $('#clearcart').click(function() {
                        window.location.href= "cmssessions.php?action=clearcart";
                    });
                });
            </script>

        </head>
        <body>
        <div id="wrapper">
SHOP;



  
        if(isset($_SESSION['username'])) 
        {

            $dUsername = $_SESSION['username'];

            echo <<<SHOP

<div>
<button onclick="document.location = 'cmssessions.php?action=logout'">log out</button>
</div>

            <br />
SHOP;

          
            echo "Cart Contents:<br />\n";
            $cart_total = 0;
            $cart_tax = 0;
            if($_SESSION['cart'] != '') {
            foreach($_SESSION['cart'] as $key => $value)
            {
                $cart_total = $cart_total + $value['price'];
                $cart_tax = $cart_total *1.2;
                $src= $value['src'];
                $name = $value['name'];
                $price = $value['price'];
                $desc = $value['description'];
                echo <<<SHOP
                <div class="cart">

                    <span class="di_name lololol">$name</span>
                    <span class="di_price lololol">\$$price</span>
                    <span class="di_desc lololol">$desc</span>
                </div>
SHOP;
            } }
            echo "Cart total: $".$cart_total;
           echo "<br />\n";
            echo "Cart total with tax: $".$cart_tax;
            echo '<br /><span class="button" id="clearcart">Clear Cart</span>';
            echo "<br /> <br/>\n";

            echo "Click an item to add it to your cart:<br />\n";
            foreach($products as $key => $value)
            {
                $src= $value['src'];
                $name = $value['name'];
                $price = $value['price'];
                $desc = $value['description'];
                echo <<<SHOP
                <div id="$key" class="shop_item">
                    <img src= {$value['src']} />
                    <span class="di_name lololol">$name</span>
                    <span class="di_price lololol">\$$price</span>
                    <span class="di_desc lololol">$desc</span>
                </div>
SHOP;

            }
        } else { 
            echo <<<LOG
            <form method="post" action="cmssessions.php?action=login" id="login_form">
            Username:<br />
            <input type="text" placeholder="Username" name="username" id="login_username" /><br />
            <br />
            Password:<br />
            <input type="password" placeholder="Password" name="password" id="login_password" /><br />
            <br />
            </form>
            <span class="button" id="login_button">Login</span>
LOG;

        } 

        echo "<br /> <br />\n";
        if($errorqueue != "") {

        {
            echo $key . " error: " . $value . "! <br />\n";
        }}
        echo <<<DONE
        </div>
    </body>
</html>
DONE;
?>

<div>
<?php include ('footer.php'); ?>