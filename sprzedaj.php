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
		
	    if ($polaczenieWallet->connect_errno!=0)
		{
				throw new Exception(mysqli_connect_errno());
		}
		else
		{    
		    $rezultat = $polaczenieWallet->query("SELECT * FROM kryptowaluty WHERE user_id =".$_SESSION['id']);
                        while($wiersz = $rezultat->fetch_assoc()){
				            $_SESSION['bitcoin'] = $wiersz['bitcoin'];
					        $_SESSION['ethereum'] = $wiersz['ethereum'];
					        $_SESSION['reszta_coinow'] = $wiersz['reszta_coinow'];
				        } 
		}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>BlokckChain Symulator</title>
	 <link rel="stylesheet" href="przelew.css">
</head>

<body>
	
<?php
	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';	
	echo "<p><b>E-mail</b>: ".$_SESSION['email'];
	echo "<p><b>Hash twojego portfela</b>: ".$_SESSION['user_hash'];	
		
?>

<p>&nbsp</p>
<p class="naglowek"> STAN TWOJEGO KONTA KRYPTOWALUT </p>
<table>
   <thead>
      <tr>
         <th>Bitcoin</th> <th>Ethereum</th> <th>ResztaCoinów</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td> <?php echo $_SESSION['bitcoin'] ?> </td> 
         <td><?php echo $_SESSION['ethereum'] ?>  </td> 
         <td><?php echo $_SESSION['reszta_coinow'] ?>  </td>
      </tr>
   </tbody>
</table>
	
<?php
	if(isset($_SESSION['blad_przelew'])){
		echo '<span class="blad_przelewu">'. $_SESSION['blad_przelew'].'</span>';
    	unset($_SESSION['blad_przelew']);
	}
?>

<p>&nbsp</p>
<form action="dosprzedaj.php" method="post">
	     <fieldset>
            <legend><H1>Podaj dane do przelewu:</H1></legend>

              <input type="radio" id="btc" name="krypto" value="bitcoin"  checked>
              <label for="btc">bitcoin</label>
            
              <input type="radio" id="rth" name="krypto" value="ethereum">
              <label for="rth">ethereum</label>         

              <input type="radio" id="rtx" name="krypto" value="reszta_coinow">
              <label for="rtx">reszta coinów</label>
              
              <br><br>
              <label for="komu">Hash portfela docelowego:</label> 
              <input type="txt" id="komu" name="user2" class="adrhash">
              
              <br><br>
              <label for="ile">Kwota przelewu:</label> 
              <input type="txt" id="ile" name="kwota" >

        </fieldset>
		<br>
		<input type="submit" value="Wykonaj Przelew" />
	
</form>


</body>
</html>
