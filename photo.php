<html>
  <head>
		<title>Photo Gallery</title>
		<link rel ="stylesheet" type="text/css" href="../stylesheets/main.css" />
	</head>

<body>
	<div id='header'>
		<?php
		include('../layouts/header.php');
		?>
	</div>	
	<div id='main'>
		<?php
		
		$photo = $_GET['id'];
	
		echo"<div style='float: left; margin-left: 20px;'><img src=$photo alt='photo' /><br clear='all' />
				<a href='index.php'>Back to Gallery View</a></div>";
		?>
			
		
	</div>
	
	<div id='footer'>
		<?php
		include('../layouts/footer.php');
		?>
	</div>	

</body>
</html>
