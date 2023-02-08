<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	echo "działą";
	
	echo "_SESSION[_POST['krypto']".$_SESSION[$_POST['krypto']];
	if($_POST['kwota']>0){
	    
	    if($_POST['kwota']>$_SESSION[$_POST['krypto']]){
        	$_SESSION['blad_przelew']="Niewystarczająca ilość środków na koncie! ";
		    header('Location: przelew.php');
		    exit();
	    }
	
	    require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_ERROR);
		
		$polaczenieUsers = new mysqli($host, $db_user, $db_password, $db_name);
		
		$db_nameWallet = "db_wallet";
		$polaczenieWallet = new mysqli($host, $db_user, $db_password, $db_nameWallet);	
		
		$db_nameBlock = "db_blockchain";
		$polaczenieBlock = new mysqli($host, $db_user, $db_password, $db_nameBlock);

	    if ($polaczenieBlock->connect_errno!=0 && $polaczenieWallet->connect_errno!=0  && $polaczenieUsers->connect_errno!=0 )
		{
				throw new Exception(mysqli_connect_errno());
		}
		else
		{   
		    $roznica = $_SESSION[$_POST['krypto']]-$_POST['kwota'];
		    $rezultatWalletUser1 = $polaczenieWallet->query("UPDATE kryptowaluty SET ".$_POST['krypto']."=".$roznica." WHERE user_id='".$_SESSION['id']."'");

		    //$_SESSION['id_user2']=$_POST['user2'];
		    $rezultatWalletUser2 = $polaczenieWallet->query("SELECT * FROM stan_konta  WHERE hash_nick='".$_POST['user2']."'");
		    while($wiersz = $rezultatWalletUser2->fetch_assoc()){		    
				            $_SESSION['user2id'] = $wiersz['user_id'];
					       // $_SESSION['user2ethereum'] = $wiersz['ethereum'];
					       // $_SESSION['user2reszta_coinow'] = $wiersz['reszta_coinow'];
				        } 
		    $rezultatWalletUser2 = $polaczenieWallet->query("SELECT * FROM kryptowaluty  WHERE user_id='".$_SESSION['user2id']."'");
		    while($wiersz = $rezultatWalletUser2->fetch_assoc()){		    
				            $_SESSION['user2bitcoin'] = $wiersz['bitcoin'];
					        $_SESSION['user2ethereum'] = $wiersz['ethereum'];
					        $_SESSION['user2reszta_coinow'] = $wiersz['reszta_coinow'];
				        } 
		    
		    $rezultatWalletUser2 = $polaczenieWallet->query("UPDATE kryptowaluty SET ".$_POST['krypto']."=".$_SESSION["user2".$_POST['krypto']]+$_POST['kwota']." WHERE user_id='".$_SESSION['user2id']."'");

		}	
	  
	}
	else{
    	$_SESSION['blad_przelew']="Kwota przelewu musi być większa od zera".$_POST['kwota'];
		header('Location: przelew.php');
		exit();
	}	
	
		
    	$_SESSION['blad_przelew']="Kwota przelewu : ".$roznica;
		header('Location: przelew.php');
		exit();
		//header('Location: przelewsucceded.php');
		//exit();
?>

