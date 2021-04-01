<?php

class Conectar{

    public static function con(){
        $link=mysqli_connect('localhost','root','');
        mysqli_query($link,"SET NAMES 'utf8'");
        mysqli_select_db($link,'db_croptechf');
        return $link;
    }
    
    }
/*
//si se realiza la conexion
if($conexion){
    echo 'Conectado exitosamente a la bd';
}else{
    echo 'Error en la conexion a la bd';
}*/

?>