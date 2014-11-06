<?php
 
echo 'Benvenuto in <b>Dharma</b>, il Lato Oscuro di CriCatania<br>';
echo 'Per utilizzare questa applicazione devi prima effettuare il login.';
		?>	
			<p>
			<form name="form_login" method="post" action="login.do.php">
				<label>Username: <input name="username" type="text" value="" /></label>
				<br />
				<br />
				<label>Password:  <input name="password" type="password" value="" /></label>
				<br />
				<br />
	    			<input name="invia" type="submit" value="Login" />
			</form>
			</p>
		<?php
exit();
?>
