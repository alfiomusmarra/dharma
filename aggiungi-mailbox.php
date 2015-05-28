<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina


include 'inc/menu.inc.php'; //carica la barra con il menu solo se si è loggati

?>	
			<p>
			<form name="form_aggiungi_mailbox" method="post" action="aggiungi-mailbox.do.php">
				<label>Email: <input name="email" type="text" value="" /></label>
				<br />
				<br />
				<label>Password:  <input name="password" type="password" value="" /></label>
				<br />
				<br />
				<label>Descrizione:  <input name="descrizione" type="text" value="" /></label>
				<br />
				<br />
				<label>Consegnata a:  <input name="nomereale" type="text" value="" /></label>
				<br />
				<br />
				<label>Contatto Email:  <input name="emailpersonale" type="text" value="" /></label>
				<br />
				<br />
				<label>Contatto telefonico:  <input name="telefono" type="text" value="" /></label>
				<br />
				<br />
	    			<input name="invia" type="submit" value="Inserisci" />
			</form>
			</p>
		<?php	
	
	
	
include'inc/footer.inc.php';//chiude le connessioni
?>
