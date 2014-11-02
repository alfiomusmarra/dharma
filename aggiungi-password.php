<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina


include 'inc/menu.inc.php'; //carica la barra con il menu solo se si è loggati

?>	
			<p>
			<form name="form_aggiungi_password" method="post" action="aggiungi-password.do.php">
				<label>Descrizione: <input name="descrizione" type="text" value="" /></label>
				<br />
				<br />
				<label>Username:  <input name="username" type="text" value="" /></label>
				<br />
				<br />
				<label>Password:  <input name="password" type="password" value="" /></label>
				<br />
				<br />
				<label>Path:  <input name="path" type="text" value="" /></label>
				<br />
				<br />
	    			<input name="invia" type="submit" value="Inserisci" />
			</form>
			</p>
		<?php	
	
	
	
include'inc/footer.inc.php';//chiude le connessioni
?>
