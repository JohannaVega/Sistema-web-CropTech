<?php

require_once("../class/conexion_db.php");
class CultivoDAO extends Conectar{
    private $cultivos;
    public function __construct(){
        $this->cultivos=array();
    }

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

     //Leemos los datos de un registro de una siembra registrada
     public function read_registro_c($registro_s){//read
        $sql="select c.id_cultivo,c.nombre_cultivo, rs.fecha_siembra, rs.nro_registro_siembra,
                rs.estado
                from registro_siembra rs
                LEFT JOIN cultivo c ON rs.id_cultivo = c.id_cultivo
                WHERE rs.nro_registro_siembra=$registro_s";   

        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }

    //Cambiamos el estado activo/desactivo del registro de una siembra
    public function change_estado($registro_s){
        $sql= "update registro_siembra set estado='Desactivo' where nro_registro_siembra=$registro_s";
        $resul=mysqli_query($this->con(),$sql);
        return $resul;

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

    //Leemos los datos de cultivos activos por id de usuario
    public function read_cultivos_user_active($idu){//read
        $sql="select c.id_cultivo,c.nombre_cultivo, rs.fecha_siembra, rs.nro_registro_siembra,
                rs.estado
                from registro_siembra rs
                LEFT JOIN cultivo c ON rs.id_cultivo = c.id_cultivo
                WHERE rs.id_usuario=$idu AND estado='Activo'";   

        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }

    //ingresamos cultivos para que estos sean elegidos por el usuario
    public function insert_cultivo_to_choose($cnombre,$luminosidadop,$humedadop,$temperaturaop,$tiempo_siembra,$primer_fecha_registro,$id_tipo){
        $sql= "insert into cultivo(nombre_cultivo,luminosidad_optima,humedad_optima,temperatura_optima,
            tiempo_siembra,primera_fecha_registro,id_tipo) values ('$cnombre','$luminosidadop','$humedadop',
                                                                     '$temperaturaop','$tiempo_siembra','$primer_fecha_registro',
                                                                     '$id_tipo')";
        $resul=mysqli_query($this->con(),$sql);
        return $resul;                                                                    
     }

    //Ingresamos detalles especificos para los cultivos que ya pertenecen a un cultivador
    public function insert_especifications_cultivo(){
        $sql="insert into registro_proveedor_u(id_imagen,cantidad_hojas_nuevas,centimetros_obtenidos,comentarios,fecha_registro,id_condiciones,nro_registro_siembra)
                values ('$id_imagen','$cantidad_hojas_nuevas','$centimetros_obtenidos','$comentarios','$fecha_registro','$id_condiciones',
                        '$nro_registro_siembra')";
        $resul=mysqli_query($this->con(),$sql);
        return $resul;                                                
    }

    // LEEMOS TODOS LOS TIPOS DE CULTIVOS 
    public function read_tipos_cultivo(){
        $sql="select * from tipo_cultivo";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }

     //LEEMOS TODOS LOS REGISTROS DE SIEMBRA
    public function read_reg_siembra(){
        $sql="select * from registro_siembra";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }   
        return $this->cultivos;
    }

    //VEMOS EL TIPO DE CULTIVO SEGUN SU ID
    public function read_tipo_byidcultivo($id_culti){
        $sql= "select c.id_cultivo,c.id_tipo,tc.tipo_cultivo
              from cultivo c
               left join tipo_cultivo tc on c.id_tipo = tc.id_tipo
                where c.id_cultivo =$id_culti";

        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
             $this->cultivos[]=$row;
        }
        return $this->cultivos;
    } 

    //Leemos todos los registros de seguimiento de nuestro cultivo
    public function readallbynroregistro($nro_registro_siembra){
        $sql="select *
            from registro_cultivo_u rcu
            left join rs  on rcu.nro_registro_siembra = rs.nro_registro_siembra
            where rs.nro_registro_siembra=$nro_registro_siembra";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }


    //Buscamos el seguimiento de un cultivo por no_seguimiento
    public function readOneByNOSEG($no_seguim){
        $sql="select * from registro_cultivo_u where no_seguimiento=$no_seguim";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }

    //SE INGRESARAN LOS DATOS PARA LAS IMAGENES LAS CUALES INICIAN COMO TIPO BLOB Y SE CONVERTIRAN
   //pendiente revisar<----
   public function insert_datos_IMAGEN($id_imagen,$nombre_imagen,$imagen,$tipo){
        $sql="insert into imagen(id_imagen,nombre_imagen,imagen,tipo)
        values('$id_imagen','$nombre_imagen','$imagen','$tipo')";
        $resul=mysqli_query($this->con(),$sql);
           
    return $resul;                                            
    }
                     
    //INGRESAMOS LOS REGISTROS DE DATOS AMBIENTALES DE NUESTRO CULTIVO
    public function insert_registro_datos($idSiembra,$centimetros,$cantidad_hojas,$comentarios,$fechaActual,
    $id_amb,$last_id){

        $sql="insert into registro_cultivo_u(cantidad_hojas_nuevas,centimetros_obtenidos,comentarios,fecha_registro,id_condiciones,
                nro_registro_siembra,id_imagen)
        values('$cantidad_hojas','$centimetros','$comentarios','$fechaActual','$id_amb','$idSiembra','$last_id')";
        $resul=mysqli_query($this->con(),$sql);

        return $resul;                                            
    }

    //INGRESAMOS LOS REGISTROS DE DATOS AMBIENTALES DE NUESTRO CULTIVO SIN LA IMAGEN
    public function insert_registro_datosV2($idSiembra,$centimetros,$cantidad_hojas,$comentarios,$fechaActual,
    $id_amb){

        $sql="insert into registro_cultivo_u(cantidad_hojas_nuevas,centimetros_obtenidos,comentarios,fecha_registro,id_condiciones,
                nro_registro_siembra)
        values('$cantidad_hojas','$centimetros','$comentarios','$fechaActual','$id_amb','$idSiembra')";
        $resul=mysqli_query($this->con(),$sql);

        return $resul;                                            
    }

    //INGRESAMOS LOS DATOS AMBIENTALES DE NUESTRO CULTIVO
    public function insert_datos_ambientales($temperatura,$luminosidad,$humedad){

        $sql="insert into condiciones_ambientales(cantidad_humedad,cantidad_luminosidad,nivel_temperatura)
        values('$humedad','$luminosidad','$temperatura')";

        $resul=mysqli_query($this->con(),$sql);

        if($resul){
            $rs = mysqli_query($this->con(), "SELECT MAX(id_condiciones) AS id FROM condiciones_ambientales");
     
            if ($row = mysqli_fetch_row($rs)) {
                $id = trim($row[0]);
            }

        }else{
            return 0;
        }     
        
        return $id;                                
    }

    public function imagen_insert ($producto_img){

        $sql1 = "insert into imagen (nombre_imagen) values ('$producto_img')";

        $resul=mysqli_query($this->con(),$sql);

        if($resul1){
            $rs = mysqli_query($this->con(), "SELECT MAX(id_imagen) AS id FROM imagen");
     
            if ($row = mysqli_fetch_row($rs)) {
                $id = trim($row[0]);
            }
        }else{
            return 0;
        }     
        
        return $id;     
    }
    
    public function last_insert (){
        $rs = mysqli_query($this->con(), "SELECT MAX(id_imagen) AS id FROM imagen");
        
        if ($row = mysqli_fetch_row($rs)) {
            $id = trim($row[0]);
           
        }
        return $id;
    }
    public function last_insert_amb (){
        $rs = mysqli_query($this->con(), "SELECT MAX(id_condiciones) AS id FROM condiciones_ambientales");
     
        if ($row = mysqli_fetch_row($rs)) {
            $id = trim($row[0]);
        }
        return $id;
    }


    public function imagen_update($id,$db_url_img){

        $sql = "UPDATE imagen SET $ruta = '$db_url_img' WHERE id_imagen = $id";

        $resul=mysqli_query($this->con(),$sql);

        return $resul;
    } 


 
}

?>