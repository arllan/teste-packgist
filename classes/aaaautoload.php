<?php
/*
Neste arquivo contem a função de autoload. Esse arquivo e responsavel em chamar as classes que são instanciadas. 
*/
    spl_autoload_register(
        function($classe) {
            require "$classe.php"; // se o diretorio mudar e só colocar o diretorio no require "classes/$classe.php"
        }
    );
?>