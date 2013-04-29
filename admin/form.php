<?php
session_start();
if($_SESSION['authorized']){ 
    echo "<a href='../admin/admin.php'>Admin</a>	";
	 } 
?>

<html>
<head>
	<title>Login Page</title>
	<link rel ="stylesheet" type="text/css" href="stylesheets/main.css" />
</head>
   <body>
    	
   <div id='header'>
	 <?php include('layouts/header_admin.php'); ?>
   </div><!--end header div -->

   <div id='main'>
    <!–- login form –->
    	<h1>Staff Login</h1>
		<form action = "login.php" method = "post" >
		<table>
			<tr>
				<td>Username:</td>
				<td><input type = "username" size="12" name="username" maxlength="12"
					value="<?php  htmlentities($user); ?>" /></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type = "password" size="12" name="password" maxlength="12"
					value="<?php  htmlentities($pass);  ?>" /></td>
			</tr>
			</table>
			<br />	
	
		<input type = "submit" value = "Login" /> 
		</form>
		
	<p><a href="../public/index.php">&laquo; Back to Public View</a></p>
	</div><!--end main div -->
	
	<div id='footer'>
	  <?php include('layouts/footer_admin.php'); ?>
	</div><!--end footer div -->
   
    </body>
    </html>
