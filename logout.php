<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html version="-//W3C//DTD XHTML 1.1//EN"

 xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="United Methodist Church in Deerfield Beach, Florida"/>
	<meta name="keywords" content="Church, God, Methodist, Jesus"/>
	<title>Chapel Church: A United Methodist Congregation</title>
       <link href="styles.css" rel="stylesheet"/>
       


</head>
<body>

	
<div class="header">
<a href="index.php"><img src="chapellogowhite.png" alt="Chapel Logo" class="logo" /></a>
</div>


<div id="modulebuttons" class="modules">

<button class= "menubutton" onclick="document.location = 'foundations.php'">Module 1: Week 1 Foundations</button>
<button class= "menubutton" onclick="document.location = 'variables.php'">Module 1: Week 1 Variables </button>
<button class= "menubutton" onclick="document.location = 'forms.php'">Module 2: Week 2 Forms </button>
<button class= "menubutton" onclick="document.location = 'arrays.php'">Module 3: Week 3 Arrays</button>
<button class= "menubutton" onclick="document.location = 'sessions.php'">Module 4: Week 4 Sessions </button>
<button class= "menubutton" onclick="document.location = 'cmssessions.php'">Module 5: Week 5 CMS Sessions</button>
<button class= "menubutton" onclick="document.location = 'database.php'">Module 6: Week 6 Database </button>
<button class= "menubutton" onclick="document.location = 'cmsdatabase.php'">Module 8: Week 8 CMS Database</button>
</div>

<?php   
session_start(); 
session_destroy(); 
header("location:/sessions.php"); 
exit();
?>





<div>
<?php include ('footer.php'); ?>