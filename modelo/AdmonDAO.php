<?php
require_once("../class/conexion_db.php");
class AdmonDAO extends Conectar{
    private $admons;
    public function __construct(){
        $this->admons=array();
    }   
}

?>