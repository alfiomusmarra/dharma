<?php 
class Calendario
	{ //apertura classe


public $dataitaliana;
public $ggmmaaaa;

	private function adesso () 
		{
		$this->anno= date("Y");
		$this->mese= date("m");
		$this->meseesteso= date("F");
		$this->giorno= date("d");
		$this->ora= date("H");
		$this->minuti= date("i");
		$this->secondi= date("s");
		}





	function publadesso () // metodo per determinare il riferimento temporale attuale: 
				//vengono restituiti anno, mese, meseesteso, giorno, ore, minuti, e secondi </man>
		{
		if(function_exists('date_default_timezone_set') AND (!ini_get('date.timezone')))
			{
			
			date_default_timezone_set('Europe/Rome');
 
			}

		$this->adesso();
		switch ($this->mese)
			{
			case "01": $this->meseestesoitaliano ='gennaio';
			break;
			case "02": $this->meseestesoitaliano ='febbraio';
			break;
			case "03": $this->meseestesoitaliano ='marzo';
			break;
			case "04": $this->meseestesoitaliano ='aprile';
			break;
			case "05": $this->meseestesoitaliano ='maggio';
			break;
			case "06": $this->meseestesoitaliano ='giugno';
			break;
			case "07": $this->meseestesoitaliano ='luglio';
			break;
			case "08": $this->meseestesoitaliano ='agosto';
			break;
			case "09": $this->meseestesoitaliano ='settembre';
			break;
			case "10": $this->meseestesoitaliano ='ottobre';
			break;
			case "11": $this->meseestesoitaliano ='novembre';
			break;
			case "12": $this->meseestesoitaliano ='dicembre';
			break;
			}
		}//fine metodo




	function publdataitaliana ($datainglese,$separatore)  //metodo per stampare all'italiana la data, 
							//mettendo nel giusto ordine giorno, mese, anno, e 
							//passando come parametri la data inglese e il separatore che si vuole adottare</man>
		{
		$this->dataesplosa= explode('-',$datainglese);
		$this->datagiorno= $this->dataesplosa[2];
		$this->datamese= $this->dataesplosa[1];
		$this->dataanno=$this->dataesplosa[0];
		$this->dataitaliana =$this->datagiorno.$separatore.$this->datamese.$separatore.$this->dataanno;
		}//fine metodo
		

	function publggmmaaaa ($separatore)//Restituisce la data attuale nel formato numerico 
					//GG/MM/AAAA con $separatore come separatore</man>
		{
		$this->publadesso();
		$this->ggmmaaaa=$this->giorno.$separatore.$this->mese.$separatore.$this->anno;
		
		}//fine metodo

	function publhhmmss ($separatore)//Restituisce l'orario attuale nel formato numerico hh/mm/ss con $separatore come separatore
		{
		$this->publadesso();
		$this->hhmmss=$this->ora.$separatore.$this->minuti.$separatore.$this->secondi;
		
		}//fine metodo


	}//chiusura classe
?>



