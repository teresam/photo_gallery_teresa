<?php
session_start();
include('../admin/connect.php');
include('../admin/login.php');

if(!$_SESSION['authorized']){
		header("location:form.php");
}else if($_SESSION['authorized']){ 
	  echo "<a href='../admin/admin.php'>Admin</a>	";
	  } 
?>

<div style='position:absolute; left: 300px; top:200px; color:red;'>
<?php 

if(isset($_FILES['file']['name'])&&!empty($_FILES['file']['name']))
{
	$allowedExt = array("jpg","jpeg","gif");
	$extension = end(explode(".",$_FILES['file']['name']));

	//checks if file is jpeg or gif and is not larger than 1MB
	if((($_FILES['file']['type']=='image/jpeg')||($_FILES['file']['type']=='image/gif'))
 	&& ($_FILES['file']['size']<=1048576)
	&& in_array($extension, $allowedExt))
	{
 		if($_FILES['file']['error']>0)
 	 	 {
 	   		 echo "Error :".$_FILES['file']['error']."<br />";
 	 	 }
 		else
 		  {
 			echo "Upload: ".$_FILES['file']['name']."<br />";
			echo "Type: ".$_FILES['file']['type']."<br />";
			echo "Size: ".round(($_FILES['file']['size']/1024),3)." Kb<br />";
			echo "Temp file: ".$_FILES['file']['tmp_name']."<br />";
			echo "Caption: ".$_POST['caption']."<br />";
	  
			//checks to see if file already exists	
			if(file_exists("../admin/images/".$_FILES['file']['name']))
			{
			echo "The file " .$_FILES['file']['name']. " already exists.";
			}
			else 
			{
			//stores file in directory if doesn't already exist
			move_uploaded_file($_FILES['file']['tmp_name'],
			"../admin/images/".$_FILES['file']['name']);

			echo "Stored in: " ."../admin/images/".$_FILES['file']['name'];
			
				$filename = "images/".$_FILES['file']['name'];
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size'];
				$caption = $_POST['caption'];
				$cap=htmlentities($caption);
	
				//insert into database
				$sql="INSERT INTO photographs(filename, type, size, caption)
				VALUES('$filename','$type','$size','$cap')";
				$result=mysql_query($sql);
			
			}
	  	  }		
	  }
}
else {
	//displays error if incorrect file size or file is too large
	echo "Invalid file type or size".'<br />';
}

?>
</div>
<!-- begin header.php-->
<html> 
	<head>
		<title>Photo Gallery</title>
		<link rel ="stylesheet" type="text/css" href="stylesheets/main.css" media="all" />
	</head>
<body>

	<div id='header'>
		<?php include('layouts/header_admin.php'); ?>
	</div>
<!-- end header.php -->
	
	<div id="main">
	<h2>Photo Upload</h2>

	<form action="photo_upload.php" enctype="multipart/form-data" method="post">
		<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
		<p><input type="file" name="file" id="file"/></p>
		<p>Caption: <input type="text" name="caption" id="caption" /></p>
		<input type="submit" value="Upload" />
	</form>	
	<a href='index.php'>Back to Gallery View</a><br /><br />
	</div>

	<!-- begin footer.php -->
	<div id='footer'>
		<?php include('layouts/footer_admin.php'); ?>
	</div>
	<!-- end footer.php -->
</body>
</html>
