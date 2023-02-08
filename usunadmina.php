<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_ERROR);
	
		
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		//$polaczenie = new mysqli($host, $db_user, $db_password, $db_nameBlock);
	    if ($polaczenie->connect_errno!=0 )
		{
				throw new Exception(mysqli_connect_errno());
		}
		else
		{   
		    $rezultatAdmins = $polaczenie->query("DELETE FROM admini WHERE user='".$_POST['deladm']."'");

		}
		
		
		header('Location: admin.php');
		exit();
?>

