<?php
session_start();
if($_SESSION['authorized']){ 
    echo "<a href='../admin/admin.php'>Admin</a>	";
	  } 
	
/*
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Administrator Only"');
    header('HTTP/1.0 401 Unauthorized');
	include('layouts/footer.php');	
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
		echo("<script>location.href='../public/index.php'</script>");  
} 
else  {
	if(($_SERVER['PHP_AUTH_PW'] == 'P@ssw0rd!') && ($_SERVER['PHP_AUTH_USER'] == 'CMWEB241')){
    echo "Hello {$_SERVER['PHP_AUTH_USER']}.";
    echo "You are being redirected to the login page.";
	echo ("<script>location.href='../admin/admin.php'</script>");
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
*/
?>

<?php 
include('../admin/connect.php');
include('../admin/login.php'); 
?>
<html> 
 <head>
	<title>Photo Gallery</title>
	<link rel ="stylesheet" type="text/css" href="stylesheets/main.css" media="all" />
 </head>
 <body>
 	
   <div id='header'>
	 <?php include('layouts/header.php'); ?>
   </div><!--end header div -->
   	
   <div id='main'>	
   	<?php

   	  	
	//gets image paths from teresam_photo database
	$sql = "SELECT * FROM photographs";
    $result = mysql_query($sql);
	while($row = mysql_fetch_array($result)){


		//sets database info into sessions	
		$_SESSION['id']=$row['id'];	
		$_SESSION['filename']=$row['filename'];
		$_SESSION['caption']=$row['caption'];
		

	echo "<div style='float: left; margin-left: 20px;'>" ?>
			<a href="photo.php?id=<?php echo $_SESSION['id'];?>">
				<img src='<?php echo "../admin/".$_SESSION['filename'];?>' width='200'/><br />
			</a>
			<p><?php echo $_SESSION['caption'];?></p>
		</div><!--end style div	-->
	<?php }//end while loop ?>
	<?php mysql_close(); ?>

	<!--begin pagination-->
	<div id='pagination' style='clear: both;'>
 
	</div><!--end pagination-->
	
	
   </div><!--end main div -->
    <div id='footer'>
	  <?php include('layouts/footer.php'); ?>
	</div><!--end footer div -->			
</body>
</html>
