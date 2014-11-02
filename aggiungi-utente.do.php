<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina
include 'inc/menu.inc.php';//carica il menu

$myCifrario= new Cifrario;
$myCifrario->mc_encrypt($_POST['password'],$_SESSION['syspassword']);

$username = $_POST['username']; //username inserita nella pagina di login
$hashpass= md5($_POST['password']); // password inserita nella pagina di login
$cryptpass=$myCifrario->encoded;



$ricerca=mysql_query("select distinct * 
			from users
			where username = '$username'
			");
			
$numcredenziali=mysql_num_rows($ricerca);
	
	
if ($numcredenziali>0) //se esiste già un utente con lo stesso username, il sistema restituisce errore
	{
	echo 'Errore: inserimento non effettuato. Esiste già un utente con il medesimo username.';
	exit();
	}
	
else //se l'utente non era già esistente, il sistema lo inserisce nella tab users, con hash della password e password di sistema cryptata
	{
	$inserimento=mysql_query("insert into users values('', '$username', '$hashpass', '$cryptpass')");
	if (!$inserimento)
		{
		echo 'Impossibile aggiungere l\'utente richiesto. ';
		echo mysql_error();
		}
	}
	
	
			

		
			
include'inc/footer.inc.php';//chiude le connessioni
header("location: ricerca-utente.php?env=users");//redirect
?>
