<?php
Class Formhtml



	{



	public function openform ($name,$action,$method)
		{
		echo "<form name='".$name."' action='".$action."' method='".$method."'>";
		}
		
	public function addinput ($name,$type,$defaultvalue)
		{
		echo "<label>".$name."<br>";
		echo "<input name='".$name."' type='".$type."' value='".$defaultvalue."'>";
		echo "</label>";
		}
		
	public function submit ($name,$type,$defaultvalue)
		{
		echo "<label>";
		echo "<input name='".$name."' type='".$type."' value='".$defaultvalue."'>";
		echo "</label>";
		}
	
		
	public function closeform ()
		{
		echo "</form>";
		}

	
	}//fine classe
?>
