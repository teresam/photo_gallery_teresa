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
	<h1>Photographs</h1>
	<a href='index.php'>&laquo; Back </a><br /><br />
	<table border="1">
		<th width="120px">Image</th>
		<th width="220px">Filename</th>
		<th width="270px">Caption</th>
		<th width="100px">Size</th>
		<th width="100px">Type</th>
		<th width="150px">Comments</th>
		<th width="100px">  </th>
	</table>
	<?php
	//gets image paths from teresam_photo database
	$sql = "SELECT photographs.id,
			  photographs.filename,
			  photographs.caption,
			  photographs.size,
			  photographs.type,
			  comments.photograph_id,
			  comments.body
			FROM photographs
			LEFT JOIN comments
			ON photographs.id=comments.photograph_id
			GROUP BY photographs.id";
    $result = mysql_query($sql);
	while($row = mysql_fetch_array($result)){
		$_SESSION['id']=$row['id'];
		$_SESSION['filename']=$row['filename'];
		$_SESSION['caption']=$row['caption'];
		$_SESSION['size']=$row['size'];
		$_SESSION['type']=$row['type'];
		$_SESSION['body']=$row['body'];
		
	?>
	<table border="1">
 	<tr>
 		<td width="100px"><img src="<?php echo $_SESSION['filename'];?>" width="120px"/></td>
 		<td width="220px">"<?php echo $_SESSION['filename']; ?>"</td>
 		<td width="270px"><?php echo $_SESSION['caption']; ?></td>
 		<td width="100px"><?php echo round(($_SESSION['size']/1024)); ?> Kb<br /></td>
 
 		<td width="100px"><?php echo $_SESSION['type']; ?></td>
 		<td width="150px"><?php echo count($_SESSION['body']); ?></td>
 		<td width="100px"><a href="delete_photo.php?id=<?php echo $_SESSION['id']; ?>">Delete</a></td>
 	</tr> 		
 	</table>

<?php } //close while loop?>
<?php mysql_close(); ?>
 	<br /><a href='photo_upload.php'>Upload a new photograph</a><br />
</div>


<div id='footer'>
	<?php include('layouts/footer_admin.php'); ?>
</div>
</body>
</html>
