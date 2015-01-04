<?php 
include 'inc/loader.inc.php';//carica le funzioni che sono presenti in ogni pagina


include 'inc/menu.inc.php'; //carica la barra con il menu solo se si è loggati

$ricerca=mysql_query("select distinct * from config");



$my_Tabellahtml= new Tabellahtml; //APRO L'OGGETTO
$my_Tabellahtml->opentable(1,0,1,"100%");//PASSO I PARAMETRI DELLA TABELLA
$my_Cifrario= new Cifrario;

$columns=array();
$extracolumn1="modifica - <a href='javascript:AlertEliminaCampo(";//definisco il contenuno di una colonna aggiuntiva da aggiungere alla tabella 
$extracolumn2=");'>elimina</a>";

//creo un array con i nomi delle colonne della tabella
array_push($columns,
			"ID",
			"Descrizione",
			"Username",
			"Password",
			"Path",
			"Azioni"
	);

$my_Tabellahtml->firstrow($columns);  //uso l'oggetto tabellahtml per creare la prima riga con i nomi delle colonne


$my_Database->arrayfromquery($ricerca);

$counter=0; //azzero il counter del successivo foreach

foreach ($my_Database->resultarray as $value)
        {
        $my_Cifrario->mc_decrypt($value[3],$_SESSION['syspassword']);
        $my_Database->resultarray[$counter][3]=$my_Cifrario->decrypted;
        
        array_push($my_Database->resultarray[$counter],
                $extracolumn1.$value[0].$extracolumn2);
	$counter=$counter+1;
	}

        
$my_Tabellahtml->tablefromarray($my_Database->resultarray);


$my_Tabellahtml->closetable();

include'inc/footer.inc.php';//chiude le connessioni
?>

<script type="text/javascript">
function AlertEliminaCampo(rows) {
var answer = confirm ("Sei sicuro di voler eliminare il campo selezionato?")
if (answer)
window.location="elimina-password.do.php?env=passbook&id="+rows;
}
</script>
