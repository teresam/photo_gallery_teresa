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
	<h2>Authorized Access to Site</h2>
	<ul>
	<li><a href='deleteAuthorized.php'>Empty Authorized Access log file</a></li>
	<li><a href='admin.php'>Main Administration Page</a></li>
	<li><a href='../index.php'>Return to Gallery</a></li>
	</ul>

<?php
$file = fopen('authorized.txt', 'r+');
$names = '';
while(!feof($file)){
	$name = fgets($file);
	if ($name===false) continue;
	$name = trim($name);
	if(strlen($name)== 0||substr($name, 0, 1)=='#') continue;
	$names .= "".$name."<br />";
}
fclose($file);
echo $names;
?>
</div>
<div id='footer'>
	<?php include('../layouts/footer_admin.php'); ?>
</div>
</body>
</html>
