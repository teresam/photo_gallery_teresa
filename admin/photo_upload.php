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
	  
			//checks to see if file already exists	
			if(file_exists("../images/".$_FILES['file']['name']))
			{
			echo "The file " .$_FILES['file']['name']. " already exists.";
			}
			else 
			{
			//stores file in directory if doesn't already exist
			move_uploaded_file($_FILES['file']['tmp_name'],
			"../images/".$_FILES['file']['name']);
			echo "Stored in: " ."images/".$_FILES['file']['name'];
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
		<link rel ="stylesheet" type="text/css" href="../stylesheets/main.css" media="all" />
	</head>
<body>

	<div id='header'>
		<?php include('../layouts/header_admin.php'); ?>
	</div>
<!-- end header.php -->
	
	<div id="main">
	<h2>Photo Upload</h2>

	<form action="photo_upload.php" enctype="multipart/form-data" method="post">
		<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
		<p><input type="file" name="file" id="file"/></p>
		<input type="submit" value="Upload" />
	</form>	
	<ul>
	<li><a href='admin.php'>Return to Administration Page</a></li>
	<li><a href='../index.php'>Return to Gallery</a></li>
	</ul>

	</div>

	<!-- begin footer.php -->
	<div id='footer'>
		<?php include('../layouts/footer_admin.php'); ?>
	</div>
	<!-- end footer.php -->
</body>
</html>
