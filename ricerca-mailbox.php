<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina


include 'inc/menu.inc.php'; //carica la barra con il menu solo se si è loggati


$columns=array();

$extracolumn0="<a href='modifica-password-mailbox.php?env=mailbox&email=";
$extracolumn1="'>- mod. password</a><br><a href='modifica-descrizione-mailbox.php?env=mailbox&email=";
$extracolumn2="'>- mod. descrizione</a><br><a href='javascript:AlertEliminaCampo(\"";//definisco 
							//il contenuno di una colonna aggiuntiva da aggiungere alla tabella 
$extracolumn3="\");'>- elimina</a>";



$ricerca=mysql_query("select distinct * 
			from config 
			where descrizione='mail'");

if (!$ricerca)
	{
	echo mysql_error();
	}

$my_Database->arrayfromquery($ricerca); //crea un array dal risultato della ricerca
	
$my_Cifrario=new Cifrario;
$my_Cifrario->mc_decrypt($my_Database->resultarray[0][3],$_SESSION['syspassword']); //ottiene la password per accedere alle credenziali del db MAIL

$my_DatabaseMail= new Database;
$my_DatabaseMail->host='localhost';
$my_DatabaseMail->usernamedb=$my_Database->resultarray[0][2];
$my_DatabaseMail->passworddb=$my_Cifrario->decrypted;
$my_DatabaseMail->databasename=$my_Database->resultarray[0][1];
	
$my_DatabaseMail->connessione(); //crea una nuova connessione con il database MAIL


	
$my_Tabellahtml= new Tabellahtml; //APRO L'OGGETTO
$my_Tabellahtml->opentable(1,0,1,900);//PASSO I PARAMETRI DELLA TABELLA

	

array_push($columns,
			"Email",
			"Hash",
			"Descrizione",
			"Nome Reale",
			"Email Personale",
			"Telefono",
			"Azioni"
	);

$my_Tabellahtml->firstrow($columns);

$ricerca2=mysql_query("select distinct * 
			from mail.users
			"); //cerca tutti i campi della tab users su db mail
		    	
if (!$ricerca2)
	{
	echo mysql_error();
	}



while ($rows2= mysql_fetch_array($ricerca2)) //legge i dati dal db MAIL tab USERS
	{
	echo "<tr>";
	$email=$rows2['email'];
	$hash=$rows2['password'];
	$ricerca3=mysql_query("select distinct *
				from dharma.mailbox
				where email ='$email'
				", $my_Database->verificaserver);
	$descrizione='';
	$nomereale='';
	$emailpersonale='';
	$telefono='';
	$azioni=$extracolumn0.$email.$extracolumn1.$email.$extracolumn2.$email.$extracolumn3;
	echo "<td>".$email."</td>";
	echo "<td>".$hash."</td>";
	while ($rows3=mysql_fetch_array($ricerca3))
		{
		$descrizione=$rows3['descrizione'];
		$nomereale=$rows3['nomereale'];
		$emailpersonale=$rows3['emailpersonale'];
		$telefono=$rows3['telefono'];
		
		echo "<td>".$descrizione."</td>";
		echo "<td>".$nomereale."</td>";
		echo "<td>".$emailpersonale."</td>";
		echo "<td>".$telefono."</td>";
		echo "<td>".$azioni."</td>";
		}
	
	if (mysql_num_rows($ricerca3)<1)
		{
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td>".$azioni."</td>";
		}	
		
	echo "</tr>";
	}




$my_Tabellahtml->closetable();

include'inc/footer.inc.php';//chiude le connessioni
?>

<script type="text/javascript">
function AlertEliminaCampo(rows) {
var answer = confirm ("Sei sicuro di voler eliminare l\'utente selezionato?")
if (answer)
window.location="elimina-mailbox.do.php?env=mailbox&email="+rows;
}
</script>
