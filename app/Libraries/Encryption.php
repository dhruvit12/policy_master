<?php 
namespace App\Libraries;

class Encryption {

    function encryptor($action, $string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'test';
        $secret_iv = 'test123';

        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}
?>