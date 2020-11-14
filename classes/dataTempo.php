<?php
/*
Forma de utilizar a classe
 $data = new dataTempo();
 echo $data->data('d/m/Y');
 echo "<br>";

 echo $data->hora('H:i:s');
*/

 class dataTempo
 {
    public function data($formatoData = 'd/m/Y')
    {
        date_default_timezone_set('America/Recife');
        return date($formatoData);
    }

    public function hora($formatoHora = 'H:i:s')
    {
        date_default_timezone_set('America/Recife');
        return date($formatoHora);
    }
 }
?>