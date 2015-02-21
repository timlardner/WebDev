<?PHP
	
	function check_email_address($email) 
	{
		if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email))
		{
			return false;
		} 
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) 
		{
			if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) 
			{ 
			return false;
			} 
		} 
		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1]))
		{ 
		$domain_array = explode(".", $email_array[1]);
		
		if (sizeof($domain_array) < 2) 
		{
			return false; 
		} 
		for ($i = 0; $i < sizeof($domain_array); $i++)
		 { 
		 	if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) 
		 	{ 
			 return false; 
		 	} 
		 } 
		 }
		 return true;
	}

	if (check_email_address($_POST[Email])) 
	{
		
    $user_name = "root";
    $password = "***password***";
    $database = "retrosexual";
    $server = "127.0.0.1";

	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);



	$SQL = "INSERT INTO guestlist (Name, Email, Plus) VALUES ('$_POST[Name]', '$_POST[Email]', '$_POST[Plus]')";
	$result = mysql_query($SQL);


	$SQL = "INSERT INTO emails (Emails) VALUES ('$_POST[Email]')";
	$result = mysql_query($SQL);

	
	mysql_close($db_handle);
	
	
$total = $_POST[Plus] + 1;	
require_once "Mail.php";
/* mail setup recipients, subject etc */
$to = "$_POST[Email]";
$cc = "tim@retrowestend.co.uk";
$recipients = $to.", ".$cc;
$headers["From"] = "Retrosexual Team <tim@retrowestend.co.uk>";
$headers["To"] = "$_POST[Email]";
$headers["Subject"] = "Retrosexual";
$mailmsg = "Hi $_POST[Name], we hope the $total of you have fun at Retrosexual! See you soon x";
/* SMTP server name, port, user/passwd */
$smtpinfo["host"] = "ssl://smtp.gmail.com";
$smtpinfo["port"] = "465";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "tim@retrowestend.co.uk";
$smtpinfo["password"] = "***password***";	
/* Create the mail object using the Mail::factory method */
$mail_object =& Mail::factory("smtp", $smtpinfo);

/* Ok send mail */
$mail_object->send($recipients, $headers, $mailmsg);



	header("Location:http://www.retrowestend.co.uk/nestedconfirm.html");
	exit();
	}
	else
	{
	header("Location:http://www.retrowestend.co.uk/nestedemail.html");
	exit();
	}



?>