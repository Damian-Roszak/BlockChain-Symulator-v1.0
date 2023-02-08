<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_ERROR);
	
		
		$db_nameBlock = "db_blockchain";
		$polaczenieBlock = new mysqli($host, $db_user, $db_password, $db_nameBlock);
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		//$polaczenie = new mysqli($host, $db_user, $db_password, $db_nameBlock);
	    if ($polaczenie->connect_errno!=0 && $polaczenieBlock->connect_errno!=0 )
		{
				throw new Exception(mysqli_connect_errno());
		}
		else
		{    
		    $rezultatUsers = $polaczenie->query("SELECT * FROM uzytkownicy");
		    $rezultatAdmins = $polaczenie->query("SELECT * FROM admini");
            $rezultatBlok = $polaczenieBlock->query("SELECT * FROM block");
				        /*while($wiersz = $rezultat->fetch_assoc()){
				           // $_SESSION['BTC'] = $wiersz['bitcoin'];
				        }*/
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
	echo "<p><b>Wykonaj SQL</b>: ";
	
?>
	<form action="dosql.php" method="post">
	     <fieldset>
            <legend>Wybierz Bazę Danych::</legend>

              <input type="radio" id="usr" name="baza" value="db_users"  checked>
              <label for="usr">db_users</label>
            
              <input type="radio" id="walet" name="baza" value="db_wallet">
              <label for="walet">db_wallet</label>         

              <input type="radio" id="block" name="baza" value="db_blockchain">
              <label for="block">db_blockchain</label>

        </fieldset>
		Kod SQL: <br /> <textarea name="sqlcode" class="areasql" placeholder="Tutaj wpisz kod SQL, do wykonania...."></textarea><br />
		<input type="submit" value="Wykonaj SQL" />
	
	</form>

<p>&nbsp</p>
<p class="naglowek"> ADMINI [ <a href="addadmin.php">Dodaj Admina</a> ] </p>
<table>
   <thead>
      <tr>
      <th>L.p.</th> <th>Admin</th> <th>E-mail</th><th>Operacje</th>
      </tr>
   </thead>
   <tbody>     
        <?php 
        $i = 0;
         while($wiersz = $rezultatAdmins->fetch_assoc()){         
             echo ' <tr><th> '. ++$i . '</th> 
             <td>'. $wiersz['user'] .' </td>
             <td>'. $wiersz['email'] .' </td>
             <td><form method=post action="usunadmina.php"> <input name="deladm" value="'.$wiersz['user'].'" type="hidden"><input type="submit" value="Usuń"> </form> </td> </tr>';
         }
             
        ?>      
   </tbody>
</table>


<p>&nbsp</p>
<p class="naglowek"> UŻYTKOWNICY [ <a href="adduser.php">Dodaj Użytkownika</a> ]</p>
<table>
   <thead>
      <tr>
      <th>L.p.</th> <th>User</th> <th>E-mail</th><th>Operacje</th>
      </tr>
   </thead>
   <tbody>     
        <?php 
        $i = 0;
         while($wiersz = $rezultatUsers->fetch_assoc()){         
             echo ' <tr><th> '. ++$i . '</th> 
             <td>'. $wiersz['user'] .' </td>
             <td>'. $wiersz['email'] .' </td>
             <td><form method=post action="usunusera.php"> <input name="delusr" value="'.$wiersz['user'].'" type="hidden"><input type="submit" value="Usuń"> </form> </td> </tr>';
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
