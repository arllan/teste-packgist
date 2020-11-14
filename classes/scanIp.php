<?php
/*
forma de utilizar: echo scanIp::scan();
*/
class scanIp
{
    public static function scan()
    {
        $a = $_SERVER["REMOTE_ADDR"];
        if(filter_var($a,FILTER_VALIDATE_IP) and strlen($a) >= 5):
            return $_SERVER["REMOTE_ADDR"];
        else:
            return '#';
        endif;
    }
}
?>