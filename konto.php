<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
		require_once "connectloged.php";
		mysqli_report(MYSQLI_REPORT_ERROR);
	
		$db_nameBlock = "db_blockchain";
		$polaczenieBlock = new mysqli($host, $db_user, $db_password, $db_nameBlock);
		
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		//$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	    if ($polaczenie->connect_errno!=0)
		{
				throw new Exception(mysqli_connect_errno());
		}
		else
		{   
					  echo '$_SESSION["id"]: '.$_SESSION['id'];
		                $rezultat = $polaczenie->query("SELECT * FROM kryptowaluty WHERE user_id =".$_SESSION['id']);

				        while($wiersz = $rezultat->fetch_assoc()){
				            $_SESSION['bitcoin'] = $wiersz['bitcoin'];
					        $_SESSION['ethereum'] = $wiersz['ethereum'];
					        $_SESSION['reszta_coinow'] = $wiersz['reszta_coinow'];
				        } 

				        $rezultat = $polaczenie->query("SELECT * FROM stan_konta WHERE user_id =".$_SESSION['id']);
				        while($wiersz = $rezultat->fetch_assoc()){
				            $_SESSION['user_hash'] = $wiersz['hash_nick'];
					      
				        }
					
				        $aktywa = $polaczenie->query("SELECT * FROM aktywa WHERE user_id =".$_SESSION['id']);
			            $smartKontrakty = $polaczenie->query("SELECT * FROM smart_kontrakt WHERE user_id =".$_SESSION['id']);
			            
            $rezultatBlok = $polaczenieBlock->query("SELECT * FROM block");
					
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
<p>&nbsp</p>
<p class="naglowek"> KRYPTOWALUTY </p>
<table>
   <thead>
      <tr>
         <th>Bitcoin</th> <th>Ethereum</th> <th>ResztaCoinów</th><th>Operacje</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td> <?php echo $_SESSION['bitcoin'] ?> </td> 
         <td><?php echo $_SESSION['ethereum'] ?>  </td> 
         <td><?php echo $_SESSION['reszta_coinow'] ?>  </td>
         <td> <a href="przelew.php">przelew</a> </td>
      </tr>
   </tbody>
</table>

<p>&nbsp</p>
<p class="naglowek"> AKTYWA </p>
<table>
   <thead>
      <tr>
      <th>L.p.</th> <th>Nazwa Aktywa</th> <th>Dane Aktywa</th><th>Operacje</th>
      </tr>
   </thead>
   <tbody>     
        <?php 
        $i = 0;
         while($wiersz = $aktywa->fetch_assoc()){         
             echo ' <tr><th> '. ++$i . '</th> 
             <td>'. $wiersz['nazwa_aktywa'] .' </td>
             <td>'. $wiersz['dane_aktywa'] .' </td>
             <td><a href="">sprzedaj </a> </td> </tr>';
         }
             
        ?>      
   </tbody>
</table>

<p>&nbsp</p>
<p class="naglowek"> SMART KONTRAKTY </p>
<table>
   <thead>
      <tr>
         <th>L.p.</th> <th>id kontraktu</th> <th>Kod Kontraktu</th> <th> Wrzuć SmartKontrakt na BlockChain </th>
      </tr>
   </thead>
   <tbody>
      <?php 
        $i = 0;
         while($wiersz = $smartKontrakty->fetch_assoc()){         
             echo ' <tr><th> '. ++$i . '</th> 
             <td>'. $wiersz['id_kontraktu'] .' </td>
             <td>'. $wiersz['kod_kontraktu'] .' </td>
             <td><a href="">Wrzuć NOWY SmartKontrakt na BlockChain </a> </td> </tr>';
         }
        ?> 
   </tbody>
</table>


<p>&nbsp</p>
<p class="naglowek"> BLOCKCHAIN</p>
<table>
   <thead>
      <tr>
      <th>L.p.</th> <th>Data</th> <th>Poprzedni Hash</th><th>Hash Tego Bloku</th><th>Hash User 1</th><th>Hash User 2</th><th>TRANSAKCJA</th>
      </tr>
   </thead>
   <tbody>     
        <?php 
        $i = 0;
         while($wiersz = $rezultatBlok->fetch_assoc()){         
             echo ' <tr><th> '. ++$i . '</th> 
             <td>'. $wiersz['data'] .' </td>
             <td>'. $wiersz['pop_hash'] .' </td>
             <td>'. $wiersz['this_hash'] .' </td>
             <td>'. $wiersz['user_hash1'] .' </td>
             <td>'. $wiersz['user_hash2'] .' </td>
             <td>'. $wiersz['transakcja'] .' </td> </tr>';
         }
             
        ?>      
   </tbody>
</table>



</body>
</html>
