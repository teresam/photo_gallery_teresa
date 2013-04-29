<!--begin footer.php -->
Copyright
  <?php 

//defines constants for function to select date format in footer.php
define("Y", date("Y,"));
define("M", date("F  d, Y,"));
define("F", date("l, F, d, Y,"));

//function to set constant for footer
$form = setDate(F);
function setDate($text){
switch($text){
	case Y:
		echo constant("Y");
		break;
	case M:
		echo constant("M");
		break;
	case F;
		echo  constant("F");
		break;
	}
}
	//defines constant
	define("COPY_FORMAT", $form);
	define("USER_NAME"," Teresa McAvoy");
// end footer 

	//prints constants
	echo constant("COPY_FORMAT");
	echo constant("USER_NAME");  
	?>  
(Some rights reserved)
<!--end footer.php -->
