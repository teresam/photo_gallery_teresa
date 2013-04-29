<?php 
include('../admin/connect.php');
//include('../public/index.php'); 
include('../admin/login.php');
session_start();
if($_SESSION['authorized']){ 
    echo "<a href='../admin/admin.php'>Admin</a>	";
	  } 
?>
<html>
<head>
	<title>Photo Gallery</title>
	<link rel ="stylesheet" type="text/css" href="stylesheets/main.css" />
</head>

<body>
	<div id='header'>
		<?php include('layouts/header.php'); ?>
	</div> <!-- end header div-->
		
   <div id='main'>	
   			<a href='index.php'>&laquo; Back </a><br /><br />
	<?php
	$id = $_GET['id'];
	
		//gets image location for unlink function
		$sql="SELECT * FROM photographs WHERE $id=photographs.id";
		$result=mysql_query($sql);
		while($row = mysql_fetch_array($result)){
		$file=$row['filename'];
		$caption=$row['caption'];
		}
		
	//gets selected image paths from index.php 		
	echo "<div style='margin-left: 20px;'>" ?>
        <img src="<?php echo "../admin/".$file;?>" width="800px"/><br />
		<?php echo $caption;?>
		<?php mysql_close(); ?>
      </div><!--end style div	-->
   </div><!--end main div -->
					
	<div id='footer'>
		<?php include('layouts/footer.php'); ?>
	</div> <!--end footer -->

</body>
</html>
