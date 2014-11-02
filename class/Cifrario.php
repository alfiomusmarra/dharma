<?php
class Cifrario
	{

	
	
	public function mc_encrypt($encrypt, $mc_key) 
		{
		$this->iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
		$this->passcrypt = trim(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $mc_key, trim($encrypt), MCRYPT_MODE_ECB, $this->iv));
		$this->encoded = base64_encode($this->passcrypt);
		}		


	public function mc_decrypt($decrypt, $mc_key) 
		{
		$this->decoded = base64_decode($decrypt);
		$this->iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
		$this->decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $mc_key, trim($this->decoded), MCRYPT_MODE_ECB, $this->iv));
		}
		
	
	
	}//fine classe


?>
