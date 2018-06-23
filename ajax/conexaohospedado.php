<?php  
	$servername = 'db.bot.sh';
	$username = 'findpet_dbu';
	$password = 'ubDQUgcaZVG3cJEQ';
	$dbname = 'findpet_dados';

	try{
		$conn = new PDO ("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo"Connected Successfully";
	}
	catch(PDOException $e){
		echo"Connection Failed 7: " . $e->getMessage();
	}
?>