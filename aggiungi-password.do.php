<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina
include 'inc/menu.inc.php';//carica il menu

$myCifrario= new Cifrario;

$descrizione = $_POST['descrizione']; // campo inserito nella pagina precedente
$username= $_POST['username']; // campo inserito nella pagina precedente
$password = $_POST['password']; // campo inserito nella pagina precedente
$path= $_POST['path']; // campo inserito nella pagina precedente

$myCifrario->mc_encrypt($password,$_SESSION['syspassword']);
$cryptpass=$myCifrario->encoded;

$ricerca=mysql_query("select distinct * 
			from config
			where descrizione = '$descrizione'
			");
			
$numoccorrenze=mysql_num_rows($ricerca);
	
	
if ($numoccorrenze>0) //se esiste già un campo uguale, il sistema restituisce errore
	{
	echo 'Errore: inserimento non effettuato. Esiste già un campo con lo stesso nome.';
	exit();
	}
	
else //se il campo non era già esistente, il sistema lo inserisce nella tab in forma criptata
	{
	$inserimento=mysql_query("insert into config values('','$descrizione', '$username', '$cryptpass', '$path')");
	if (!$inserimento)
		{
		$_SESSION['messaggio']= 'Impossibile effettuare l\'inserimento richiesto. ';
		echo mysql_error();
		}
	
	else 
		{
		$_SESSION['messaggio']= 'Inserimento effettuato correttamente';
		}
	
	}

	
	
			

		
			
include'inc/footer.inc.php';//chiude le connessioni
header("location: ricerca-password.php?env=passbook");//redirect
?>
