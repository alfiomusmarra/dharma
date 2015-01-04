<?php

	Class Tabellahtml {

		public $border;
		public $cellpadding;
		public $cellspacing;
		public $width;
		public $columns=array();
		public $rows=array();

		public function opentable($border, $cellpadding, $cellspacing, $width) {
			?>
			<table border="<?php echo $border; ?>" cellpadding="<?php echo $cellpadding; ?>" cellspacing="<?php echo $cellspacing; ?>" width="<?php echo $width; ?>">
			<?php
		}
	
		public function firstrow($columns) {
			?>
			<tr>
			<?php
			foreach ($columns as $this->col) {
				echo "<td>" . $this->col . "</td>";
			}
			?>
			</tr>
			<?php
		}
		
		public function tablefromquery($rows) { //passa le righe della tabella
			while ($this->righe=mysql_fetch_row($rows)) {
				echo '<tr>';
				foreach ($this->righe as $this->cella) {
					echo "<td>".$this->cella."</td>";
				}
				echo '</tr>';
			}
		}

		public function tablefromarray($righe) { //passa le righe della tabella
			foreach ($righe as $this->riga) {
				echo '<tr>';
				foreach ($this->riga as $this->cella) {
					echo "<td>".$this->cella."</td>";
                        	}
				echo '</tr>';
			}
		}
	
		public function lastrow($columns) {
			?>
			<tr>
			<?php
			foreach ($columns as $this->col) {
				echo "<td>".$this->cellaint."</td>";
			}
			?>
			</tr>
			<?php
		}

		public function closetable() { //<man> chiude una tabella html aperta</man>
			?>
			</table>
			<?php
		}
	}//fine classe
?>
