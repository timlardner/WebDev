
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
<?php
//show who the iser is ans set up varibale

	$filename = $_GET['user'];

	$user = substr($filename , 5);
	$user = substr($user , 0, -4);

	
	echo "<title> Modifying: $user</title>";
	?>
</head>
<body>
<div class="center">
	<?php
	//show current activity
	$filename = $_GET['user'];
	$txt_file    = file_get_contents($filename);
	$rows        = explode("\n", $txt_file);

	echo "Current theme is ".$rows[0];
	echo "<br>";
	echo "Topic is ".$rows[1];
	echo "<br>";
	
	

	if ($rows[3] !=0){
	echo "User is on level  ".$rows[3]." of ".$rows[2];
	}
	else{
		echo "User has not started their programme.";
	}
	echo "<br>";
	
	$dts = time(); //this returns the current date time
	$format = "H:i:s";
	$diff = time() - $rows[4];
	$diff2 = time() - $rows[5];

	$maxlevel = intval($rows[2]);
	$curlevel = intval($rows[3]);


if ($maxlevel <= $curlevel){
	$waiting = 21600;
	$ttl = $waiting - $diff;
	echo "User will level up in ".gmdate($format,$ttl);
}
echo "<br>";
echo "User last logged in ".gmdate($format,$diff2)." ago.";
echo "<br>";
echo "<br>";


?>



<form action="rowmod.php" method="get">
  
  Topic:<select name="topic"> <br>
	<?php
	// setting up drop downvaribles for topic
		foreach (glob("Topic*.txt") as $filename_top) {
			$test = substr($filename_top , 6);
			$test = substr($test , 0, -4);
			
			echo'<option value="'.$test.'">'.$test.'</option>';
		}
		?>
		</select>
		<br>
	Interface:<select name="theme">
		
	<?php
		foreach (glob("Theme*.txt") as $filename_top) {
			$test = substr($filename_top , 6);
			$test = substr($test , 0, -4);
			echo '<option value="'.$test.'">'.$test.'</option>';
		}
		?>
		</select>
		<br>
	Number of days: <select name="nDays">	
	<br>
	<?php
		
		$topic_filename = "Topic-".$rows[1].".txt";
		$txt_file    = file_get_contents($topic_filename);
		$rows_f      = explode("\n", $txt_file);
		$n_rows = count($rows_f);
		for ($i = 1; $i < $n_rows; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
		?>
</select>
<br>
Current day: <select name="days">	

	<?php
		
		$topic_filename = "Topic-".$rows[1].".txt";
		$txt_file    = file_get_contents($topic_filename);
		$rows_f      = explode("\n", $txt_file);
		$n_rows = count($rows_f);
		for ($i = 0; $i < $n_rows; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
		?>
</select>
<?php
	echo '<input type="hidden" name="user" value="'.$filename.'">';

	?>
	<br>
	<br>
  <input type="submit" value="Submit">
</form>
</div>
</body>
</head>
</html>
