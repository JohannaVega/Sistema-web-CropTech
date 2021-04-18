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

    //Insertamos Cultivo para el usuario cultivador
    public function insert($idu, $cnombre, $fecha_registro, $estado){ //create

        $sql="insert into registro_siembra(fecha_siembra,estado,id_usuario,id_cultivo)
        values('$fecha_registro','$estado',$idu,'$cnombre')";
        $resul=mysqli_query($this->con(),$sql);
        return $resul;//Retorna true si se realizo el insert correctamentamente
    }

    //Leemos todos los cultivos registrados en el sistema
    public function read_all(){//read 
       $sql="select * from cultivo";
       $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }

    //Leemos los datos de cultivos por id de usuario
    public function read_cultivos_user($idu){//read
        $sql="select c.id_cultivo,c.nombre_cultivo, rs.fecha_siembra, rs.nro_registro_siembra,
                rs.estado
                from registro_siembra rs
                LEFT JOIN cultivo c ON rs.id_cultivo = c.id_cultivo
                WHERE rs.id_usuario=$idu";   

        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }
}

?>