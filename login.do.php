<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina

$username = $_POST['username']; //username inserita nella pagina di login
$hashpass= md5($_POST['password']); // password inserita nella pagina di login
$myCifrario= new Cifrario;

$ricerca=mysql_query("select distinct * 
			from users
			where username = '$username'
			and hashpass = '$hashpass'
			");
			
while ($credenziali=mysql_fetch_array($ricerca))

	{
	
	if (($username == $credenziali['username']) and ($hashpass == $credenziali['hashpass']))
		{
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['logintruefalse'] = 'true';
		$_SESSION['syspassword']=$myCifrario->mc_decrypt($credenziali['cryptpass'], $_SESSION['password']);
		}
	
	else
		{
		echo 'Nome utente o password errati';
		?>
		<br>
		<br>
		<a href="index.php">Clicca qui per tentare nuovamente il login</a>
		<br>
		<?php
		exit();
		}
	
	}
			

		
			
include'inc/footer.inc.php';//chiude le connessioni
header("location: index.php");//redirect
?>
