<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina
include 'inc/menu.inc.php'; //carica la barra con il menu solo se si è loggati

$ricerca=mysql_query("select distinct * from users");

$my_Tabellahtml= new Tabellahtml; //crea una nuova istanza della classe che crea le tabelle html
$my_Tabellahtml->opentable(1,0,1,"100%");//PASSO I PARAMETRI GENERALI DELLA TABELLA

$columns=array();
$extracolumn1="modifica - <a href='javascript:AlertEliminaUtente(";//definisco il contenuno di una colonna aggiuntiva da aggiungere alla tabella 
$extracolumn2=");'>elimina</a>";

//creo un array con i nomi delle colonne della tabella
array_push($columns,
			"ID",
			"Username",
			"Hash Password",
			"Crypted Password",
			"Azioni"
	);

$my_Tabellahtml->firstrow($columns);  //uso l'oggetto tabellahtml per creare la prima riga con i nomi delle colonne

$my_Database->arrayfromquery($ricerca);

$counter=0; //azzero il counter del successivo foreach

foreach ($my_Database->resultarray as $value)
        {
        
        array_push($my_Database->resultarray[$counter],
                $extracolumn1.$value[0].$extracolumn2);
	$counter=$counter+1;
	}

        
$my_Tabellahtml->tablefromarray($my_Database->resultarray);


$my_Tabellahtml->closetable();

include'inc/footer.inc.php';//chiude le connessioni
?>

<script type="text/javascript">
function AlertEliminaUtente(rows) {
var answer = confirm ("Sei sicuro di voler eliminare l\'utente selezionato?")
if (answer)
window.location="elimina-utente.do.php?env=users&id="+rows;
}
</script>
