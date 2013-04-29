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
<?php
//gets value sent from browser
$id=$_GET['id'];
	
		//gets image location for unlink function
		$sql="SELECT photographs.filename FROM photographs WHERE $id=photographs.id";
		$result=mysql_query($sql);
		while($row = mysql_fetch_array($result)){
		$_SESSION['filename']=$row['filename'];
			$file=$_SESSION['filename'];
		}
//echo trim($file);

if(empty($id)){
	echo "Empty ID";
}else{
//delete data in database that matches id
$sql="DELETE from photographs WHERE id='$id'";
$result=mysql_query($sql);
unlink(trim($file));

//if deleted successfully 
if($result){
	echo "Deleted $file successfully.";
	echo "<BR /><BR />";
	echo "<a href='list_photos.php'>Back to photos</a>";
} else {
	echo "Error deleting image";
}
}

?>
<?php mysql_close(); ?>
</div>
<div id='footer'>
	<?php include('layouts/footer_admin.php'); ?>
</div>
</body>
</html>
