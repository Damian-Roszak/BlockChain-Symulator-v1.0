<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
		require_once "connectloged.php";
		mysqli_report(MYSQLI_REPORT_ERROR);
	
		
		$polaczenieWallet = new mysqli($host, $db_user, $db_password, $db_name);
		$db_nameBlock = "db_blockchain";
		$polaczenieBlock = new mysqli($host, $db_user, $db_password, $db_nameBlock);
	    if ($polaczenieWallet->connect_errno!=0 && $polaczenieBlock->connect_errno!=0)
		{
				throw new Exception(mysqli_connect_errno());
		}
		else
		{    
		    $rezultat = $polaczenieWallet->query("SELECT * FROM kryptowaluty WHERE user_id =".$_SESSION['id']);

				        while($wiersz = $rezultat->fetch_assoc()){
				           // $_SESSION['BTC'] = $wiersz['bitcoin'];
				        }
		}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>BlokckChain Symulator</title>
	 <link rel="stylesheet" href="konto.css">
</head>

<body>
	
<?php
	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';	
	echo "<p><b>E-mail</b>: ".$_SESSION['email'];
	echo "<p><b>Hash twojego portfela</b>: ".$_SESSION['user_hash'];		
?>



</body>
</html>
