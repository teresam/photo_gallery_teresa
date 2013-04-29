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
	<h2>Delete Unauthorized Access Log file</h2>
	<ul>
	<li><a href='admin.php'>Main Administration Page</a></li>
	<li><a href='../public/index.php'>Return to Gallery</a></li>
	</ul>

<?php
$file = fopen('unauthorized.txt', 'wb');
$file1 = 'unauthorized.txt';
$curDate = strftime("%Y-%m-%d, %H:%M",time());
$text = "Unauthorized access file cleared by administrator on ";
if(file_exists($file1)){
	fwrite($file, "$text $curDate\n");
	}else{
		echo"Can't write to file";
}
fclose($file);
echo $text, $curDate;
?>
</div>
<div id='footer'>
	<?php include('layouts/footer_admin.php'); ?>
</div>
</body>
</html>
