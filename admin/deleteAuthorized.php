<html> 
<head>
 <title>Photo Gallery</title>
 <link rel ="stylesheet" type="text/css" href="../stylesheets/main.css" media="all" />
</head>
<body>

<div id='header'>
  <?php include('../layouts/header_admin.php'); ?>
</div>

<div id="main">
	<h2>Delete Authorized Access Log file</h2>
	<ul>
	<li><a href='admin.php'>Main Administration Page</a></li>
	<li><a href='../index.php'>Return to Gallery</a></li>
	</ul>

<?php
$file = fopen('authorized.txt', 'wb');
$file1 = 'authorized.txt';
$curDate = strftime("%Y-%m-%d, %H:%M",time());
$text = "Authorized access file cleared by administrator on ";
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
	<?php include('../layouts/footer_admin.php'); ?>
</div>
</body>
</html>
