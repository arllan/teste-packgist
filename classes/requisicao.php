<?php
/*
    Classe responsavel em receber campos de requisições 'Get' e 'Post'

    FORMA DE UTILIZAR A CLASSE:

    1- instaciar a classe

    $requisicao = new validaCampos(); 
    $requisicao->varURL('Metodo','Variavel Da URL')[index];

    Os elementos do varURL() são:

    # Metodo: Podemos utilizar dois metodos, que são: 'GET' e 'POST'

    # Variavel da URL: nome da variavel que vai receber os dados para fazer o processo de validação

    # Index: Informa qual campo deve ser acessado da classe, que são: '0' -> informa se realmente recebeu a variavel | '1' -> mostra o valor recebido da variavel

    2 - Forma prática
    
    OBS: Existe a condição de receber o valor '300' que só vai gerar esse erro se caso a variavel não tiver nenhum valor 
    ................................................................................. 
    $requisicao = new requisicao(); // instacia da classe
    $requisicao->varURL('GET','teste')[0]; // Nessa configuração vai receber via 'GET' a variavel 'teste' e retorna o status se recebeu a variavel ou não
    .................................................................................

    $requisicao = new requisicao(); // instacia da classe
    $requisicao->varURL('GET','teste')[1]; // Nessa configuração vai receber via 'GET' a variavel 'teste' e retorna o conteudo que foi enviado nela
    .................................................................................

*/
    class requisicao 
    {
        public static function varURL($metodo, $variavelURL) 
        {
            switch ($metodo) 
            {
                case 'GET':
                        if (filter_input(INPUT_GET,$variavelURL, FILTER_SANITIZE_STRING) == true) 
                        {
                            $retornoFilter = filter_input(INPUT_GET,$variavelURL, FILTER_SANITIZE_STRING) ;
                            $statusValida = array(true,$retornoFilter); // '0' recebe o status se recebeu ou não | '1' mostra o conteudo da requisição
                        }
                        else
                        {
                            $statusValida = array(false,300) ; 
                        }
                        return $statusValida;
                    break;
                case 'POST':
                        if (filter_input(INPUT_POST,$variavelURL, FILTER_SANITIZE_STRING) == true) 
                        {
                            $retornoFilter = filter_input(INPUT_POST,$variavelURL, FILTER_SANITIZE_STRING) ;
                            $statusValida = array(true,$retornoFilter); // '0' recebe o status se recebeu ou não | '1' mostra o conteudo da requisição
                        }
                        else
                        {
                            $statusValida = array(false,300);
                        }
            
                        return $statusValida;
                    break;
                
                default:
                        return "Metodo de requisição invalido";
                    break;
            }
        }

        //$a = ['id','CampoAdate','CampoBdate','CampoCdate','CampoDdate','CampoFdate','CampoEdate','Campotoken'];
        // echo teste($a,'get');
        public static function teste($array, $metodo)
        {   
            $count = 0;
            $saida = array();
    
            if(strtoupper($metodo) == 'GET'):
                foreach ($array as $value) 
                {
                  $count++;
                  $saida[$count] = filter_input(INPUT_GET,$value, FILTER_SANITIZE_STRING);
                }    
            else:
                foreach ($array as $value) 
                {
                  $count++;
                  $saida[$count] = filter_input(INPUT_POST,$value, FILTER_SANITIZE_STRING);
                }
            endif;
            
            if(array_search(NULL,$saida) == null):
                return TRUE; // NÃO FALTA NENHUMA CAMPO
            else:
                return FALSE; // FALTA ALGUM CAMPO
            endif;
        }
    }    
?>