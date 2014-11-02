<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina



$id = $_GET['id']; //username inserita nella pagina precedente



					//esegue la query che cancella l'occorrenza dal database
$cancellazione=mysql_query("delete   
			from config
			where id = '$id'
			");
			

	
	
if (!$cancellazione)   //scrive in sessione l'esito dell'operazione per mostrarla nella PAGINA SUCCESSIVA
	{
	$_SESSION['messaggio'] = 'Non è stato possibile cancellare il campo. - '.mysql_error();
	}

else
	{
	$_SESSION['messaggio'] = 'Cancellazione riuscita';
	}
	
		
			
include'inc/footer.inc.php';//chiude le connessioni

header("location: ricerca-password.php?env=passbook");//redirect alla pagina di ricerca
?>
