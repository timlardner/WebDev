<!DOCTYPE html>

<?php

	
	
	$txt_file    = file_get_contents($_GET['user']);
	$rows        = explode("\n", $txt_file);
	//print_r($rows);
	$rows[0] = $_GET['theme'];
	$rows[1] = $_GET['topic'];
	$rows[2] = $_GET['nDays'];
	$rows[3] = $_GET['days'];
	$rows[4] = time();
	$rows[5] = time();
	//print_r($rows);
	if (intval($rows[2]) < intval($rows[3])){
		echo "Day number is greater than number of days available. Please try again.";
		echo "<br>";
		echo '<a href="modify_user2.php?user='.$_GET['user'].'"> Back </a>';
	}
	else{
		$fp = fopen($_GET['user'], 'w');
		fwrite($fp, $rows[0]."\n");
		fwrite($fp, $rows[1]."\n");
		fwrite($fp, $rows[2]."\n");
		fwrite($fp, $rows[3]."\n");
		fwrite($fp, $rows[4]."\n");
		fwrite($fp, $rows[5]."\n");
		fclose($fp);
		header( 'Location: modify_user2.php?user='.$_GET['user'] );
	}
	
	
	
	//echo $_GET['user'];

	
	

	?>
	
