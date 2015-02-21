<!DOCTYPE html>
<html>
<head>
<style> 
h1 {color:white;}
h3 {size: small;}
h3 {color:white;}
a:link {color:white;}      /* unvisited link */
a:visited {color:white;}  /* visited link */
a:hover {color:white;}  /* mouse over link */
a:active {color:white;}  /* selected link */
div{margin-left:20px;}
body{background-image:url('background1.jpg');
background-repeat:no-repeat;}
.center
{
margin:auto;
width:20%;
}
</style>
<body>
<div class="center">
<?php

// this section of the code creates the welcome page where users select their profile
echo "<h1>Please select your name!</h1>";
echo "<br><br>";
echo "<div>";
foreach (glob("user*.txt") as $filename) {

	$test = substr($filename , 5);
	$test = substr($test , 0, -4);

    	
	echo "<h3><a href='next.php?user=$filename'> $test </a></h3>";
	
	
}
echo "</div>";
?>
</div>

</body>
</head>
</html>
