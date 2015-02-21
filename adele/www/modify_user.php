<!DOCTYPE html>
<html>
<head>
<style> 
h1 {color:black;}
h3 {size: back;}
h3 {color:black;}
h3 {text-align:center;}
a:link {color:black;}      /* unvisited link */
a:visited {color:blue;}  /* visited link */
a:hover {color:blue;}  /* mouse over link */
a:active {color:black;}  /* selected link */
div{margin-left:20px;}
body{background-image:url('background1.jpg');
background-repeat:no-repeat;}
.center
{
margin:auto;
width:40%;
background-color:white;
}
</style>
<body>
<div class="center">
<?php

// this section of the code creates the welcome page where users select their profile to chnage
echo "<h1>Please select the user to modify</h1>";
echo "<br>";
echo "<div>";
foreach (glob("user*.txt") as $filename) {

	$test = substr($filename , 5);
	$test = substr($test , 0, -4);

    	
	echo "<h3> <a href='modify_user2.php?user=$filename'> $test </a></h3>";
	
	
	
}
echo "</div>";
?>
</div>

</body>
</head>
</html>

	

