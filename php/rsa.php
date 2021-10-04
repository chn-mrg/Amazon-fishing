<?php

class  OpensslRSA{
 
        public $pu_key;
 
        public function __construct($public_key)
        {
            $this->pu_key = openssl_pkey_get_public($public_key);//这个函数可用来判断公钥是否是可用的
        }
 
        //公钥加密
        public function PublicEncrypt($data){
            //openssl_public_encrypt($data,$encrypted,$this->pu_key);//公钥加密
            $crypto = array();
            foreach (str_split($data, 53) as $chunk) {
                openssl_public_encrypt($chunk, $encryptData, $this->pu_key);
                $crypto[] = base64_encode($encryptData);
            }
            //$encrypted = $this->urlsafe_b64encode($crypto);
            return $crypto;
        }
        public function CryptoJSAesEncrypt($passphrase, $plain_text){

            $salt = openssl_random_pseudo_bytes(256);
            $iv = openssl_random_pseudo_bytes(16);
            //on PHP7 can use random_bytes() istead openssl_random_pseudo_bytes()
            //or PHP5x see : https://github.com/paragonie/random_compat
        
            $iterations = 999;  
            $key = hash_pbkdf2("sha512", $passphrase, $salt, $iterations, 64);
        
            $encrypted_data = openssl_encrypt($plain_text, 'aes-256-cbc', hex2bin($key), OPENSSL_RAW_DATA, $iv);
        
            $data = array("ciphertext" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "salt" => bin2hex($salt));
            return json_encode($data);
        }
 
}
