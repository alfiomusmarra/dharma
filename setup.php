<?php
include ('inc/loader.inc.php');
$myCifrario= new Cifrario;

$nomeprimoutente='INSERIRE QUI'; //inserire qui lo username del primo utente

$passworddelsistema='INSERIRE QUI';//inserire qui solo la prima volta la password che il sistema utilizzerà per criptare i dati

$passworddelprimoutente='INSERIRE QUI';//inserire qui la password del primo utente, di cui verrà conservato solo l'hash md5

$myCifrario->mc_encrypt($passworddelsistema,$passworddelprimoutente);

$hashpass= md5($passworddelprimoutente);

$cryptpass=$myCifrario->encoded;

$registra=mysql_query("insert into users values ('', $nomeprimoutente, '$hashpass', '$cryptpass')");

if (!$registra)
	{
	echo mysql_error();
	}
	
else 
	{
	echo 'Inserimento effettuato con successo. Adesso è necessario rimuovere il presente file setup.php o
		editarlo cancellando le password inserite'.
	}

include('inc/footer.inc.php');

?>
