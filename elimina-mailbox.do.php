<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina



$email = $_GET['email']; //username inserita nella pagina precedente



$ricerca=mysql_query("select distinct * 
			from config 
			where descrizione='mail'");

if (!$ricerca)
	{
	echo mysql_error();
	}

$my_Database->arrayfromquery($ricerca); //crea un array dal risultato della ricerca

					//esegue la query che cancella l'occorrenza dal database
$cancellazione1=mysql_query("delete   
			from mailbox
			where email = '$email'
			");



$my_Cifrario=new Cifrario;
$my_Cifrario->mc_decrypt($my_Database->resultarray[0][3],$_SESSION['syspassword']); //ottiene la password per accedere alle credenziali del db MAIL
	
$my_DatabaseMail= new Database;
$my_DatabaseMail->host='localhost';
$my_DatabaseMail->usernamedb=$my_Database->resultarray[0][2];
$my_DatabaseMail->passworddb=$my_Cifrario->decrypted;
$my_DatabaseMail->databasename=$my_Database->resultarray[0][1];
	
$my_DatabaseMail->connessione(); //crea una nuova connessione con il database MAIL			
			
					//esegue la query che cancella l'occorrenza dal database
$cancellazione2=mysql_query("delete   
			from mail.users
			where email = '$email'
			");
			

	
	
if ((!$cancellazione1) or (!$cancellazione2))   //scrive in sessione l'esito dell'operazione per mostrarla nella PAGINA SUCCESSIVA
	{
	$_SESSION['messaggio'] = 'Non è stato possibile cancellare la riga selezionata. - '.mysql_error();
	}

else
	{
	$_SESSION['messaggio'] = 'Cancellazione riuscita';
	}
	
		
			
include'inc/footer.inc.php';//chiude le connessioni

header("location: ricerca-mailbox.php?env=mailbox");//redirect alla pagina di ricerca
?>
