<?php

/* forma de instaciar a classe

    $texto = new criptografia();
    echo $textoCriptografado = $texto->criptografar('arllan pablo','AnYlOpHgFbJgrlop');
    echo "<br>";
    echo $texto->descriptografar($textoCriptografado, 'AnYlOpHgFbJgrlop');
    echo '<br>';
*/
    class criptografia
    {
        public function criptografar($textoSerCriptografado, $chave = "AnYlOpHgFbJgrkeR" ) // a chave deve ter no minimo 16bit
        {
            $algoritmo = "AES128"; // padrão da criptografia
            //$chave = "AnYlOpHgFbJgrkeR"; // AnYlOpHgFbJgrkeR
            $mensagem = openssl_encrypt($textoSerCriptografado, $algoritmo, $chave, OPENSSL_RAW_DATA, $chave);
            return base64_encode($mensagem); 
        }

        public function descriptografar($textoSerDescriptografado, $chave = "AnYlOpHgFbJgrkeR")
        {
            $algoritimo = "AES128";
            //$chave = "AnYlOpHgFbJgrkeR";
            $mensagem = openssl_decrypt(base64_decode($textoSerDescriptografado), $algoritimo, $chave, OPENSSL_RAW_DATA, $chave);
            return $mensagem ;
        }  
    }
?>