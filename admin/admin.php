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
</div>

<div id="main">
	<h2>Main Administration Page</h2>
	<ul>
		<li><a href='unauthorized.php'>View Unauthorized Access Attempts</a></li>
		<li><a href='authorized.php'>View Authorized Access</a></li>
		<li><a href='photo_upload.php'>Upload Photos</a></li> 
		<li><a href='../public/index.php'>Return to Gallery</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</div>
<div id='footer'>
	<?php include('layouts/footer_admin.php'); ?>
</div>
</body>
</html>

