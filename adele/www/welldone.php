<!DOCTYPE html>
<html>
<head>
<style> 

div{margin-left:20px;}
body{background-image:url('background1.jpg');
background-repeat:no-repeat;}
div{font-size: 50px;}
div{color:White;}


.center
{
margin:auto;
width:100%;
}
#parent {height: 250px;}

#floater {
    float: left;
    height: 50%;
    width: 100%;
    margin-bottom: -50px;
}

#child {
    clear: both;
    height: 100px;
}
</style>
<body>
<div id="parent">
<div id="floater"></div>
<div id="child">
<div align="center">
<?php
	$user = $_GET['user'];
	echo "Congratulations ".$user;
	echo "<br>";
		echo" you have completed your topic!";
		echo "<br>";
		echo"<img src=\"thumbup.png\" alt=\"well done\">";
?>
</div>
</div>
</div>
</body>
</head>
</html>