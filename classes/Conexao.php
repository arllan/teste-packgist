<?php
    namespace App;

    class Conexao 
    {
        private static $instance;

        public static function getConn() {

            $dns = 'mysql:host=127.0.0.1;port=3306;dbname=banco_api;charset=utf8'; // informações do servidor
            $usuario = 'root'; // login do banco de dados
            $senha = ''; // senha do banco de dados

            $opcoes = [
                \PDO::ATTR_PERSISTENT => true, // informa que a conexão vai ser pesistente, ou seja sempre vai está conectado
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // ativa o modo de mostrar os erros 
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO:: FETCH_OBJ // Informa como o dado vai sair  obs: existe varias opçoes
            ];

            if (!isset(self::$instance)): 
            
                self::$instance = new \PDO($dns, $usuario, $senha, $opcoes);
            endif;

            return self::$instance;
        }
    }
?>