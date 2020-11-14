<?php
    /*
    Para entender melhor primeiros vamos conhecer os elementos que fazer parte do script da requisição

    -> curl_init() -> Essa função inicializa uma session cURL, tem que ser executado antes de qualquer comando cURL.

    -> curl_setop() -> Essa é a função mais importante da biblioteca cURL, com ela podemos setar vários parâmetros para a session aberta.

    -> curl_exec() -> Executa a session cURL e captura o retorno, essa função deve ser executada após ser iniciada e configurada uma session.

    -> curl_getinfo() -> Retorna informações sobre a requisição, podemos obter o valor numérico Status Code HTTP exemplo (200, 301, 500 e etc)

    -> curl_close() -> Fecha a session cURL aberta e libera todos os recursos.


    Outras constantes importantes de configuração para curl_setopt():

    CURLOPT_CONNECTTIMEOUT – Para especificar o timeout da conexão. Se passar do número de segundos informados, a tentativa de conectar é finalizada.
    CURLOPT_POST – Envia a requisição como sendo do tipo POST.
    CURLOPT_POSTFIELDS – Array de dados para enviar numa requisição do tipo POST.

    FONTES EXTERNAS: https://www.codigomaster.com.br/desenvolvimento/utilizando-curl-com-php/

    para fazer uma requisição precisamos iniciar o passo a passo

    COMO UTILIZAR:

    $requisicao = new curlRequest();
    echo $requisicao->POST('http://localhost:8080/POO/cURL/recebe.php',$dados = ['nome' => 'arllan','idade' => 15],'texto'); 
    echo "<br>";
    echo $requisicao->GET('http://localhost:8080/POO/cURL/recebe.php?nome=arllan&idade=15','texto');
    */

    class curlRequest 
    {
        public function GET($urlRequisicao,$formatoSaida)
        {
             // Inicia
            $recurso = curl_init($urlRequisicao);

            // Definido o que receber de conteúdo (GET)
            curl_setopt($recurso, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($recurso, CURLOPT_CONNECTTIMEOUT, 10); // define o tempo maximo da requisição
            // Executa e obtém o resultado
            $resultado = curl_exec($recurso);

            $httpCode = curl_getinfo($recurso, CURLINFO_HTTP_CODE);

            if($httpCode==200)
            {
                switch ($formatoSaida) 
                {
                    case 'json':
                            return json_decode($resultado);
                        break;
                    case 'texto':
                            return $resultado;
                        break;
                    default:
                            return "formato nao aceito";
                        break;
                }
            }
            else
            {
                return 'Requisição deu algum problema relacionado ao código de erro: ' . $httpCode;
            }
            curl_close($recurso);
        }

        public function POST($urlRequisicao,$arrayDados,$formatoSaida)
        {
            $recurso = curl_init($urlRequisicao);
            curl_setopt($recurso, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($recurso, CURLOPT_CONNECTTIMEOUT, 10); // define o tempo maximo da requisição
            curl_setopt($recurso, CURLOPT_POST, true); // descomentar essa linha para a requisição se torna POST
            curl_setopt($recurso, CURLOPT_POSTFIELDS, $arrayDados); // forma de enviar variaveis 
            $resultado = curl_exec($recurso);
            $httpCode = curl_getinfo($recurso, CURLINFO_HTTP_CODE);

            if($httpCode==200)
            {
                switch ($formatoSaida) 
                {
                    case 'json':
                            return json_decode($resultado);
                        break;
                    case 'texto':
                            return $resultado;
                        break;
                    default:
                            return "formato nao aceito";
                        break;
                }
            }
            else
            {
                return 'Requisição deu algum problema relacionado ao código de erro: ' . $httpCode;
            }

            curl_close($recurso);    
        }
    }    
?>