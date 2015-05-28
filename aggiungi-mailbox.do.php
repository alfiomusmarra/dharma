<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina
include 'inc/menu.inc.php';//carica il menu




$email = $_POST['email']; //username inserita nella pagina di login
$password= $_POST['password']; // password inserita nella pagina di login
$descrizione=$_POST['descrizione'];
$nomereale=$_POST['nomereale'];
$emailpersonale=$_POST['emailpersonale'];
$telefono=$_POST['telefono'];

$ricerca=mysql_query("select distinct * 
			from config
			where descrizione = 'mail'
			");

$my_Database->arrayfromquery($ricerca); //crea un array dal risultato della ricerca

$my_Cifrario= new Cifrario;
$my_Cifrario->mc_decrypt($my_Database->resultarray[0][3],$_SESSION['syspassword']); //ottiene la password per accedere alle credenziali del db MAIL



$my_DatabaseMail= new Database;
$my_DatabaseMail->host='localhost';
$my_DatabaseMail->usernamedb=$my_Database->resultarray[0][2];
$my_DatabaseMail->passworddb=$my_Cifrario->decrypted;
$my_DatabaseMail->databasename=$my_Database->resultarray[0][1];
	
$my_DatabaseMail->connessione(); //crea una nuova connessione con il database MAIL

$ricercamailesistente=mysql_query("select distinct * 
				from mail.users
				where email = '$email'
				");
$my_Database->connessione(); //crea una nuova connessione con il database				

$ricercadescrizioneesistente=mysql_query("select distinct * 
				from dharma.mailbox
				where email = '$email'
				");
	
$numemail=mysql_num_rows($ricercamailesistente);
$numdescrizione=mysql_num_rows($ricercadescrizioneesistente);
	
if ($numemail>0) //se esiste già un utente con la stessa email, il sistema restituisce errore
	{
	echo 'Errore: inserimento non effettuato. Esiste già un utente con la medesima email.';
	exit();
	}
	
	
elseif ($numdescrizione>0) //se esiste già un utente con la stessa email nella tab con le descrizioni, il sistema restituisce errore
	{
	echo 'Errore: inserimento non effettuato. Esiste già un utente con la medesima email nel campo descrizione.';
	exit();
	}

else //se l'utente non era già esistente, il sistema lo inserisce
	{
	
	$my_DatabaseMail->connessione();
	$inserimento=mysql_query("insert into mail.users values('$email', encrypt('$password'))");
	if (!$inserimento)
		{
		echo 'Impossibile aggiungere il campo richiesto. ';
		echo mysql_error();
		exit();
		}
	
	$my_Database->connessione();
	$inserimento2=mysql_query("insert into dharma.mailbox values('$email', '$descrizione', '$nomereale', '$emailpersonale', '$telefono')");
	if (!$inserimento2)
		{
		echo 'Impossibile aggiungere il campo richiesto nel database DHARMA. ';
		echo mysql_error();
		exit();
		}
	
	}
	
	
			

		
			
include'inc/footer.inc.php';//chiude le connessioni
header("location: ricerca-mailbox.php?env=mailbox");//redirect
?>
