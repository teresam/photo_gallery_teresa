<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Administrator Only"');
    header('HTTP/1.0 401 Unauthorized');
		//log file info
  		$file='admin/unauthorized.txt';
  		$address = $_SERVER['REMOTE_ADDR'];		
 		$timestamp = strftime("%Y-%m-%d, %H:%M",time());
		$text = "attempted access on ";
		$content = $text .$timestamp;
  		$handle=fopen($file,'a') or die("Can't open file");
 		fwrite($handle, "$address $content\n");
 		fclose($handle);
		exit();	 
		echo("<script>location.href='/CMWEB241_Lab08/public/index.php'</script>");  
} 
else  {
	if(($_SERVER['PHP_AUTH_PW'] == 'P@ssw0rd!') && ($_SERVER['PHP_AUTH_USER'] == 'CMWEB241')){
    echo "Hello {$_SERVER['PHP_AUTH_USER']}.";
    echo "You are being redirected to the login page.";
	echo ("<script>location.href='/CMWEB241_Lab08/admin/admin.php'</script>");
		//log file info
		$file='admin/authorized.txt';
  		$address = $_SERVER['REMOTE_ADDR'];
 		$timestamp = strftime("%Y-%m-%d, %H:%M",time());
		$text1 = "was granted access on ";
		$content1 = $text1 .$timestamp;
  		$handle=fopen($file,'a');
		fwrite($handle, "$address $content1\n");
		fclose($handle);
		exit();
		
		
	}
}


?>
<?php
	$array['images/branch.jpg']['caption'] = 'Frost on bush';
	$array['images/falls.jpg']['caption'] = 'Black Eagle Falls, MT';
	$array['images/frozenweb.jpg']['caption'] = 'Spider web';
	$array['images/ice.jpg']['caption'] = 'Ice on window';
	$array['images/mountain.jpg']['caption'] = 'Montana Mountain';	
?>

<html> 
 <head>
	<title>Photo Gallery</title>
	<link rel ="stylesheet" type="text/css" href="stylesheets/main.css" media="all" />
 </head>
 <body>
   <div id='header'>
	 <?php include('layouts/header.php'); ?>
   </div>	
   <div id='main'>	
	<?php
	  foreach($array as $key => $value) {
		echo "<div style='float: left; margin-left: 20px;'><a href='photo.php?id=$key'><img src='$key' alt='photo' width='200'/></a><br />";
		foreach($value as $key1 => $value1){
		echo "$value1</div>";
		}
	   }
	?>	
	</div>	
    <div id='footer'>
	  <?php include('layouts/footer.php'); ?>
	</div>			
</body>
</html>
