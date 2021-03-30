<?php

require_once("../class/conexion_db.php");
class CultivoDAO extends Conectar{
    private $cultivos;
    public function __construct(){
        $this->cultivos=array();
    }
    //Metodo que me permite evaluar si dicho usuario tiene cultivos registrados
    /*public function numCropUser($id){
        $sql="select COUNT(nombre_cultivo) from tb_cultivo c
        where c.id_usuario=$id";
        $num=0;
        
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
            $num= $this->cultivos[0];
        }
        return $num;
    }*/

    //Insertamos Cultivo 
    public function insert($idu,$cnombre,$fecha_registro){ //create

        $sql="insert into tb_cultivo(id_usuario,nombre_cultivo,fecha_registro)
        values('$idu','$cnombre','$fecha_registro')";
        $resul=mysqli_query($this->con(),$sql);
        return $resul;//Retorna true si se realizo el insert correctamentamente
    }

    public function read_all(){//read 
       $sql="select * from tb_cultivo";
       $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }
    public function read_cultivos_user($idu){//read
        $sql="select * from cultvo WHERE id_usuario=$idu";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }
}
?>