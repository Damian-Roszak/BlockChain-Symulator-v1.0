<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: konto.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>BlokckChain Symulator</title>
</head>

<body>
	Symulator BlockChain'a<br /><br />
	
	<a href="rejestracja.php">
	    Rejestracja - załóż darmowe konto!<br>
	    Dostaniesz za darmo: 3 BTC, 2 ETH, i 10 ResztaCoinów<br>
	    Dodatkowo: darmowe przelewy i wrzucanie smart kontraktów na blockchain
	</a>
	<br /><br />
	
	<form action="zaloguj.php" method="post">
	
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
		<input type="submit" value="Zaloguj się" />
	
	</form>
	
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</body>
</html>
