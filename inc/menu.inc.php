<?php	
	if ( (!isset($_SESSION['logintruefalse'])) or ($_SESSION['logintruefalse']!='true') ) //mostra la pagina di login se non si è loggati
		{
		require_once('inc/login.inc.php');	
		}
		
//primo elemento del menu
?>			
	<a href="index.php?env=gen"> Home </a>  -    
	
<?php		//analizza la variabile "envinronment" passata con GET e crea il menu in funzione di essa
		
		
if (!isset($_GET['env']))
	{
	$_GET['env']='gen';
	}		
		
switch ($_GET['env'])
	{
	
	case "gen":
	?>
	<a href="ricerca-utente.php?env=users"> Dharma Users</a>  -
	<a href="ricerca-password.php?env=passbook"> PassBook </a>  - 
	<a href="ricerca-mailbox.php?env=mailbox"> Mailbox </a>  - 
	<?php
	break;
	
	case "users":
	?>
	<a href="aggiungi-utente.php?env=users"> Aggiungi Utente </a>  -  
	<a href="ricerca-utente.php?env=users"> Ricerca Utente </a>  -  
	<?php
	break;
	
	case "passbook":
	?>
	<a href="aggiungi-password.php?env=passbook"> Aggiungi Password </a>  - 
	<a href="ricerca-password.php?env=passbook"> Ricerca Password </a>  - 
	<?php
	break;
	
	case "mailbox":
	?>
	<a href="aggiungi-mailbox.php?env=mailbox"> Aggiungi Mailbox </a>  -  
	<a href="ricerca-mailbox.php?env=mailbox"> Ricerca Mailbox </a>  -  
	<?php
	break;
	
	}

?>		<!--ultimo elemento del menu-->
	<a href="logout.php"> Logout </a>	
	<br>
	<br>	
<?php

if (isset($_SESSION['messaggio']))  //stampa il messaggio in sessione lasciato dalla pagina precedente
	{
	echo $_SESSION['messaggio'];
	$_SESSION['messaggio']='';
	}
?>



