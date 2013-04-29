<?php
session_start();

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
    $result2=mysql_query("SELECT * FROM users");
	if(!$result2){
		die("Database query failed: " .mysql_error());
	}
	while($row=mysql_fetch_array($result2)){
		//echo $row['username']." ".$row['password']."<br />";
	}

function logged_in($user, $pass){
if(isset($_POST['username']) && isset($_POST['password'])){
	$user = trim($_POST['username']);
	$pass = trim($_POST['password']);
	
	$query = mysql_query("SELECT * FROM users WHERE username = '$user' AND password = '$pass'");
	//checks user table for matching results
	while($row = mysql_fetch_array($query)){
		$dbUser = $row['username'];
		$dbPass = $row['password'];
		}
    //if results return one row then login else go to form
	if(mysql_num_rows($query) > 0){
		$_SESSION['authorized']=true;
		$_SESSION['success']='Login Successful';
		header('location:index.php');
		exit();
	}else{
		header('location:form.php');
	}
}
}
logged_in($user, $pass);




$_SESSION['username'] = $user;
$_SESSION['password'] = $pass;
  //header("location:index.php");

?>



<?php
/*
if($_REQUEST['username']==$user && $_REQUEST['password']==$pass){
//$_SESSION['username'] = $user;
//$_SESSION['password'] = $pass;
   //header("location:index.php");
   
   if (!isset($_SESSION['password']) && ($_SESSION['username'])) {
	header("Location:form.php");
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
else{
	if(($_SESSION['password'] == $pass) && ($_SESSION['username'] == $user)){
	echo ("<script>location.href='../admin/index.php'</script>");
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
}
*/

?>
