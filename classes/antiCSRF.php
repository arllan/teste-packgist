<?php
/*
$a = new antiCSRF();
    $valor = sha1(uniqid(rand()));
    antiCSRF::eleHTML($valor);
*/ 
    class antiCSRF
    {
        public static function eleHTML($dados)
        {
            echo "<input type='hidden' name='token' value='$dados'>";
        }

        public static function token_POST()
        {
            if(isset($_POST['token']) == TRUE):
                return $_POST['token'];
            else:
                return '300';
            endif;
        }

    }

?>