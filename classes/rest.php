<?php

/*
    como utilizar: var_dump(rest::GET()); echo json_encode(rest::GET());
    validações necessarias: recebe em protocolo selecionda, filtrar os dados de entrada, contabiliza  ,  

*/
class rest extends criptografia
{   
    public static function GET_CRIPT() // retorna as informações das requisições feitas em GET
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" and $_REQUEST == TRUE):
            $criptografia = new criptografia();
            $teste = $criptografia->descriptografar($_REQUEST['url'], 'AnYlOpHgFbJgrlop');
            //$teste = $_REQUEST['url'];
            $url = explode('/',filter_var($teste, FILTER_SANITIZE_STRING));
            return $url;
        else:
            return '300'; 
        endif;
    }
    public static function GET() // retorna as informações das requisições feitas em GET
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" and $_REQUEST == TRUE):
            $teste = $_REQUEST['url'];
            $url = explode('/',filter_var($teste, FILTER_SANITIZE_STRING));
            return $url;
        else:
            return '300'; 
        endif;
    }

    public static function GET_COUNT($numParametros) // retorna o numero de campos da requisição
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" and $_REQUEST == TRUE):
            $teste = $_REQUEST['url'];
            $url = explode('/',filter_var($teste, FILTER_SANITIZE_STRING));
            if($numParametros == count($url)):
                return true;
            else:
                return false;
            endif;
        else:
            return false; 
        endif;
    }

    public static function POST()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" and $_REQUEST == TRUE):
            $teste = $_REQUEST['url'];
            $url = explode('/',filter_var($teste, FILTER_SANITIZE_STRING));
            return $url ; 
        else:
            return '300'; 
        endif;
    }

    public static function POST_COUNT($numParametros)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" and $_REQUEST == TRUE):
            $teste = $_REQUEST['url'];
            $url = explode('/',filter_var($teste, FILTER_SANITIZE_STRING));
            if($numParametros == count($url)):
                return true;
            else:
                return false;
            endif; 
        else:
            return false; 
        endif;
    }

    public static function contador($entrada,$numParametros) // ordem das requisições -> operacao, dados
    {
        if(count($entrada) == $numParametros ):
            return true;
        else:
            return false;
        endif;
    }
}
?>