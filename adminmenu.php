
<?php include ('header.php'); ?>

<?php
 session_start();
    


    if(empty($_SESSION['loggedin']))
    {
        // If they are not logged in, redirect them to the login page.
        header("Location: sessions.php");
        

        die("Redirecting to sessions.php");
    }
?>
<div id="modulebuttons" class="modules">

<button class= "menubutton" onclick="document.location = 'foundations.php'">New Here</button>
<button class= "menubutton" onclick="document.location = 'prayer.php'">Prayer Request</button>
<button class= "menubutton" onclick="document.location = 'prayeradmin.php'">Prayer Request Updates</button>
<button class= "menubutton" onclick="document.location = 'devotion.php'">Devotionals</button>
<button class= "menubutton" onclick="document.location = 'nextgen.php'">Children and Youth</button>
<button class= "menubutton" onclick="document.location = 'collegeya.php'">College and Young Adult</button>
<button class= "menubutton" onclick="document.location = 'caring.php'">Caring Ministries</button>
<button class= "menubutton" onclick="document.location = 'worship.php'">Worship</button>
<button class= "menubutton" onclick="document.location = 'variables.php'">Staff </button>
<button class= "menubutton" onclick="document.location = 'staffadmin.php'">Staff Updates</button>
<button class= "menubutton" onclick="document.location = 'products.php'">Shop</button>
<button class= "menubutton" onclick="document.location = 'admin.php'">Shop Updates</button>
<button class= "menubutton" onclick="document.location = 'forms.php'">Product Review </button>
<button class= "menubutton" onclick="document.location = 'admindatabase.php'">Staff Reviews </button>
<button class= "menubutton" onclick="document.location = 'sessions.php'">Log In </button>
<button class="menubutton" onclick="document.location = 'logout.php'">Log Out</button>
</div>
<?php include ('footer.php'); ?>