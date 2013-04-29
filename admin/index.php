<?php
session_start();
if(!$_SESSION['authorized']){
  	header("location:form.php");
}else if($_SESSION['authorized']){ 
	  echo "<a href='../admin/admin.php'>Admin</a>	";
	  } 
?>

<html> 
 <head>
	<title>Photo Gallery</title>
	<link rel ="stylesheet" type="text/css" href="stylesheets/main.css" media="all" />
 </head>
 <body>
 	
   <div id='header'>
	 <?php include('layouts/header_admin.php'); ?>
   </div><!--end header div -->
   	
   <div id='main'>
   	<h1>Menu</h1>	
<ul>
	<li><a href="list_photos.php">List Photos</a></li>
	<li><a href="admin.php">View Log file</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>

   </div><!--end main div -->
    <div id='footer'>
	  <?php include('layouts/footer_admin.php'); ?>
	</div><!--end footer div -->			
</body>
</html>
