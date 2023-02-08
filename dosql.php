<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>BlokckChain Symulator</title>
	 <link rel="stylesheet" href="admin.css">
</head>

<body>
	
<?php
	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';	
	echo "<p><b>E-mail</b>: ".$_SESSION['email'];	
	echo "<h1>strona wykonania SQL:</h1> ";
	
	//echo "Wpisany SQL to: ".$_POST['sqlcode'];
	$sql = $_POST['sqlcode'];
	
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_ERROR);
	
	$db_name = $_POST['baza'];
		
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		//$polaczenie = new mysqli($host, $db_user, $db_password, $db_nameBlock);
	    if ($polaczenie->connect_errno!=0 )
		{
				throw new Exception(mysqli_connect_errno());
		}
		else
		{    
		    echo "$db_name = ".$_POST['baza']. "<br>sql = ".$_POST['sqlcode'];
		    if($sql!="") $rezultat = $polaczenie->query($sql);
		    header('Location: admin.php');
		    exit();
				        
		}
?>

</body>
</html>
