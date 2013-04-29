<?php
//variables
$host = "localhost";
$username = "redteam";
$password = "shUy*4!L2-r.k!*ZmE";
$database = "redteam_photo";

//connect to mysql server
$conn=mysql_connect($host,$username,$password);
if(!$conn){
  die('Could not connect: '.mysql_error());
}
//echo 'Connected successfully';

//connect to database;
$db=mysql_select_db($database);
if(!$db){
	die('Could not connect to database: '.mysql_error());
}
//echo 'Connected successfully';
//photograph table
$sql = "SELECT * FROM photographs";
$result = mysql_query($sql);

		$filename = $row['filename'];
		$id = $row['id'];
		$caption = $row['caption'];	

//user table
$user = $_POST['username'];
$pass = $_POST['password'];


$sql2 = "SELECT * FROM users";
$result2 = mysql_query($sql2);

$dbUser = $row['username'];
$dbPass	= $row['password'];
$dbID = $row['id'];

if($user==$dbUser && $pass==$dbPass){
	echo $dbUser;
}else{
	echo $user, $pass ;
}

mysql_close($conn); 

?>
