<?php
require_once("../class/conexion_db.php");
class AdmonDAO extends Conectar{
    private $admons;

    public function __construct(){
        $this->admons=array();
    }   

    public function read_solicitudes(){
        $sql="select * from solicitud_admon";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->admons[]=$row;
        }
        return $this->admons;
    }

    public function read_tipo_solicitudes(){
        $sql="select * from solicitud";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->admons[]=$row;
        }
        return $this->admons;
    }


}

?>