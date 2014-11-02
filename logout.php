<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina


$_SESSION=array(); // Resetta tutte le variabili di sessione. 

$_SESSION['logintruefalse']= 'false' ;

include'inc/footer.inc.php';//chiude le connessioni

session_destroy(); //DISTRUGGE la sessione. 

?>

LogOut Effettuato con successo<br><br>
<a href="index.php">Torna alla pagina iniziale</a>
</body>

	


