
<!DOCTYPE html>
<html>
<head>
	<?php

	$filename = $_GET['user'];

	$user = substr($filename , 5);
	$user = substr($user , 0, -4);


	echo "<title> SLOW: $user</title>";
	$txt_file    = file_get_contents($filename);
	$rows        = explode("\n", $txt_file);

	$theme_name = "Theme-".$rows[0].".txt";
	$theme_txt_file    = file_get_contents($theme_name);
	$theme_rows        = explode("\n", $theme_txt_file);
	
	
	

	echo "<style>";
	echo "<!--";
	echo 'body {background-image:url(\''.$theme_rows[0].'\');}';
	
    echo "-->";
   	echo "</style>";
	
	?>

	<style>
	<!--
	img.day5
	{
	position:fixed;
	left:800px;
	top:50px;
	max-width: 160px;
	min-width: 160px;
	
	z-index:-1;
	}
	img.day4
	{
	position:fixed;
	left:600px;
	top:200px;
	z-index:-1;
	max-width: 130px;
	min-width: 130px;
	
	}
	img.day3
	{
	position:fixed;
	left:400px;
	top:150px;
	z-index:-1;
		max-width: 100px;
	min-width: 100px;	
	}
	img.day2
	{
	position:fixed;
	left:300px;
	top:350px;
	z-index:-1;
	max-width: 70px;
	min-width: 70px;
	
	}
	img.day1
	{
	position:fixed;
	left:150px;
	top:500px;
	z-index:-1;
	max-width: 50px;
	min-width: 50px;
	}
	div.text{
	
 	display: inline-block;
 	opacity:.50; 
	background: black;
	color:#ffffff;
	float: right;
	
	}
	a:link {color:#FFFFFF;}      /* unvisited link */
	a:visited {color:#FFFFFF;}  /* visited link */
	a:hover {color:#FFFFFF;}  /* mouse over link */
	a:active {color:#FFFFFF;}  /* selected link */
	
	-->
	</style>


	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!-- Add jQuery library -->
	<script type="text/javascript" src="./lib/jquery-1.9.0.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="./lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="./source/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="./source/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="./source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="./source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="./source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="./source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="./source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
</head>
<body>

<?php
// get the user and ser up substrings

$filename = $_GET['user'];

$user = substr($filename , 5);
$user = substr($user , 0, -4);


//open  user file

$txt_file    = file_get_contents($filename);
$rows        = explode("\n", $txt_file);

echo "<div class=\"text\">";

echo "Hello $user. <a href=\"http://slow.intae.it\"> Not you? </a>";


if($rows[0] == "space")
{

}



$dts = time(); //this returns the current date time
$format = "H:i:s";
$format2 = "d:H:i:s";
$diff = time() - $rows[4];
$diff2 = time() - $rows[5];


$maxlevel = intval($rows[2]);
$curlevel = intval($rows[3]);


if ($maxlevel < $curlevel){
	$rows[3] = $maxlevel;
}
// if the user has waited long enough level up
if ($rows[3] != 0){
	if ($maxlevel != $rows[3]){
		$waiting = 21600;
		if ($diff > $waiting){
			echo "Congratulations, you have levelled up!";
	
			$rows[3] = intval($rows[3]) + 1;
	
			$rows[4] = time();
		}
		else{
		// user hasnt waited long enough
			$output = (string)gmdate($format,$diff) + " ";
			echo '<script type="text/javascript">';
			echo 'alert("you have already seen todays video, you can still re-watch it, and all previous videos.\nCheck back again tomorrow for new content.")';
			echo '</script>';
		
			$ttl = $waiting - $diff;
		

		}
	}
	else{
	// end of week
		echo "Congratulations! <br> You have completed your course... <br><br>";
		echo "<a href=\"welldone.php?user=$user\"> Click here for your prize! </a>";
		echo "<br><br>";
	}
	}
else{
	$rows[3] = 1;
	$rows[4] = time();
	$rows[5] = time();
	echo '<script type="text/javascript">';
	echo 'alert("Welcome, this is your first login! Click the shape to see your first video")';
	echo '</script>';
	}

echo "</div>";


$topic_filename = "Topic-".$rows[1].".txt";
$txt_file    = file_get_contents($topic_filename);
$rows_f        = explode("\n", $txt_file);


$iter = 0;
$maxdays = $rows[3];
//$maxdays = intval($maxdays);
//$maxdays = $maxdays + $rows[3];

if($row[3] == 1){


}
// load the correct interface
foreach($rows_f as $row => $data)
{
	$iter = $iter + 1;
		
	if($iter > $maxdays){
		break;
	}
	if($iter > $rows[4]){
		break;
	}
    //get row data
    $row_data = explode(';', $data);
	
if($rows[0]== "space"){
	if($iter == $maxdays){
		echo "<a class=\"fancybox-media\" href=\"$row_data[1]\"><img src=\"rocket.png\" class=\"day".$iter."\"></a>";
	}
	else{
		echo "<a class=\"fancybox-media\" href=\"$row_data[1]\"><img src=\"star.png\" class=\"day".$iter."\"></a>";
	}
	}
else{
	if($iter == $maxdays){
	echo "<a class=\"fancybox-media\" href=\"$row_data[1]\"><img src=\"bee.gif\" class=\"day".$iter."\"></a>";
	}
	else{
	echo "<a class=\"fancybox-media\" href=\"$row_data[1]\"><img src=\"bee1.gif\" class=\"day".$iter."\"></a>";
	}
}
	
	 
	


}
//write back changes

$rows[5] = time();
$fp = fopen($filename, 'w');
fwrite($fp, $rows[0]."\n");
fwrite($fp, $rows[1]."\n");
fwrite($fp, $rows[2]."\n");
fwrite($fp, $rows[3]."\n");
fwrite($fp, $rows[4]."\n");
fwrite($fp, $rows[5]."\n");
fclose($fp);

?>
