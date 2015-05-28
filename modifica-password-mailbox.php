<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina


include 'inc/menu.inc.php'; //carica la barra con il menu solo se si è loggati

//acquisisco i valori attuali da modificare e li passo alla form come valori di default

$email=$_GET['email'];

$ricerca=mysql_query("select distinct * 
			from config 
			where descrizione='mail'");

if (!$ricerca)
	{
	echo mysql_error();
	}

$my_Database->arrayfromquery($ricerca); //crea un array dal risultato della ricerca

$my_Formhtml=new Formhtml;

$my_Formhtml->openform('form_modifica_mailbox', 'modifica-mailbox.do.php', 'post');

$my_Formhtml->addinput('email','text', $email);

echo'<br>';

$my_Formhtml->addinput('nuova password','password','');

echo'<br>';

$my_Formhtml->addinput('ripeti password','password','');

echo'<br>';


$my_Formhtml->closeform();

include'inc/footer.inc.php';//chiude le connessioni
?>
