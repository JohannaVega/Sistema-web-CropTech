<?php

require_once("../class/conexion_db.php");

class ProveedorDAO extends Conectar{
    private $proveedores;
    
    //constructor, inicializamos la variable proveedores
    public function __construct(){
        $this->proveedores=array();
    }

    //Leemos todos los proveedores registrados
    public function readall(){  //read

        $sql="select * from proveedor";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;
    }

}

?>