<?php


	session_start();
	
	include ('inc/config.inc.php'); //include il file di configurazione
	
	header('Content-type: text/html;charset=utf-8');

	spl_autoload_register('myAutoloader'); //funzione predefinita che si occupa di caricare dinamicamente 
					   //tutti gli oggetti esterni quando vengono richiamati

	function myAutoloader($class_name)
		{
   		 $path = 'class/';
   		 
   		if (isset($_SESSION[$class_name]))  //crea l'oggetto solo se non è già stato creato, altrimenti lo deserializza
			{
			${$class_name}=unserialize($_SESSION[$class_name]);
			}

   		else 
   			{
   			include $path.$class_name.'.php';
			}
		}
		
		
	$my_Database= new Database;
	
	$my_Database->host='localhost';
	$my_Database->usernamedb='dharmauser';
	$my_Database->passworddb='sanbitter';
	$my_Database->databasename='dharma';
	
	$my_Database->connessione(); //crea una nuova connessione con il database

?>

<!DOCTYPE html>
<html lang="it">
<head>

<title>Dharma, il Lato Oscuro di Gaia</title>
 
<meta charset="utf-8">
<meta name="Keywords" content="amministrazione, Gaia, lato oscuro" />
<meta name="Description" content="Interfaccia per soli super-admin di Gaia" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
