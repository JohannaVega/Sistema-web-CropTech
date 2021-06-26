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
    public function read_all(){//ok
       $sql="select * from cultivo";
       $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }

     //Leemos los datos de un registro de una siembra registrada
     public function read_registro_c($registro_s){
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
    public function change_estado($registro_s){//ok
        $sql= "update registro_siembra set estado='Desactivo' where nro_registro_siembra=$registro_s";
        $resul=mysqli_query($this->con(),$sql);
        return $resul;

    }

    //Leemos los datos de cultivos por id de usuario
    public function read_cultivos_user($idu){//
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
    public function read_cultivos_user_active($idu){//ok
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

    //Leemos los datos de un cultivo por su Id
    public function read_cultivo_byId($id){
        $sql="select * from cultivo where id_cultivo=$id";   

        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;


    }
    
     //actualizamos datos de un cultivo por su Id
     public function edit_cultivo_byId($humedadmin,$humedadmax,$luzmin,$luzmax,$temperaturamin,
     $temperaturamax,$tiempo,$id_cultivo){
         
        $sql="update cultivo set horas_luz_min='$luzmin',horas_luz_max='$luzmax',humedad_optima_min='$humedadmin',
        humedad_optima_max='$humedadmax',temperatura_optima_min='$temperaturamin',temperatura_optima_max='$temperaturamax', 
        tiempo_siembra='$tiempo' where id_cultivo=$id_cultivo";

        $resul1=mysqli_query($this->con(),$sql);
       
        return $resul1;
    }
    //Ingresamos cultivos para que estos sean elegidos por el usuario USAR
    public function insert_cultivo_new($name,$tipo,$humedadmin,$humedadmax,$luzmin,$luzmax,
    $temperaturamin,$temperaturamax,$tiempo,$idu)
    {
        
        $sql= "insert into cultivo(nombre_cultivo,horas_luz_min,horas_luz_max,humedad_optima_min,humedad_optima_max,
        temperatura_optima_min,temperatura_optima_max,tiempo_siembra,id_tipo) 
        values ('$name','$luzmin','$luzmax','$humedadmin','$humedadmax','$temperaturamin','$temperaturamax','$tiempo','$tipo')";

        $resul=mysqli_query($this->con(),$sql);

        if($resul){
            $rs = mysqli_query($this->con(), "SELECT MAX(id_cultivo) AS id FROM cultivo");
        
            $idc=0;
            if ($row = mysqli_fetch_row($rs)) {
                $idc = trim($row[0]);
            }

            $fecha = date('Y-m-d');

            $sql1= "insert into registro_siembra (fecha_siembra,estado,id_usuario,id_cultivo) values 
                    ('$fecha','Activo','$idu','$idc')";

            $resul1=mysqli_query($this->con(),$sql1);

            return $resul1;
            
        }                                            
     }

    
     // LEEMOS TODOS LOS TIPOS DE CULTIVOS 
    public function read_tipos_cultivo()
    { //OK
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

    //Validamos si un registro siembra x existe en la tabla registro_cultivo_u
    public function validar_exist_registro($nro_registro_siembra){

        $sql="SELECT IF (EXISTS (SELECT 1 from registro_cultivo_u rcu 
        left join condiciones_ambientales ch on rcu.id_condiciones = ch.id_condiciones 
        where rcu.nro_registro_siembra='$nro_registro_siembra'),1,0)";

        $resul=mysqli_query($this->con(),$sql);

        if ($row = mysqli_fetch_row($resul)) {
            $id = trim($row[0]);
        }
       
        return $id;

    }

    //Leemos los datos del ultimo registro de un cultivo y usuario en espedifico
    public function readallbynroregistro($nro_registro_siembra){
        $sql="select * from registro_cultivo_u rcu 
        left join condiciones_ambientales ch on rcu.id_condiciones = ch.id_condiciones 
        where rcu.nro_registro_siembra='$nro_registro_siembra'
        ORDER  BY  fecha_registro DESC";

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

                     
    //INGRESAMOS LOS REGISTROS DE DATOS AMBIENTALES DE NUESTRO CULTIVO
    public function insert_registro_datos($idSiembra,$centimetros,$cantidad_hojas,$comentarios,$fechaActual,
    $id_amb){

        $sql="insert into registro_cultivo_u(cantidad_hojas_nuevas,centimetros_obtenidos,comentarios,fecha_registro,id_condiciones,
                nro_registro_siembra,id_imagen)
        values('$cantidad_hojas','$centimetros','$comentarios','$fechaActual','$id_amb','$idSiembra')";
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

    //Traemos los datos de humedad de un registro de cultivo en especifico
    public function get_humedad($date1, $date2, $idr)
    {
        $sql="SELECT h.cantidad_humedad 
              FROM condiciones_ambientales h
               LEFT JOIN registro_cultivo_u r ON r.id_condiciones = h.id_condiciones
               LEFT JOIN registro_siembra rc ON rc.nro_registro_siembra = r.nro_registro_siembra
                WHERE rc.nro_registro_siembra =$idr AND r.fecha_registro BETWEEN '$date1' AND '$date2'";
        
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }

    //Traemos los datos de temperatura de un registro de cultivo en especifico
    public function get_temperatura($date1, $date2, $idr)
    {
        $sql="SELECT h.nivel_temperatura 
              FROM condiciones_ambientales h
               LEFT JOIN registro_cultivo_u r ON r.id_condiciones = h.id_condiciones
               LEFT JOIN registro_siembra rc ON rc.nro_registro_siembra = r.nro_registro_siembra
                WHERE rc.nro_registro_siembra =$idr AND r.fecha_registro BETWEEN '$date1' AND '$date2'";
        
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
    }

    //Traemos los datos de luminosidad de un registro de cultivo en especifico
    public function get_luz($date1, $date2, $idr)
    {
        $sql="SELECT h.cantidad_luminosidad 
              FROM condiciones_ambientales h
               LEFT JOIN registro_cultivo_u r ON r.id_condiciones = h.id_condiciones
               LEFT JOIN registro_siembra rc ON rc.nro_registro_siembra = r.nro_registro_siembra
                WHERE rc.nro_registro_siembra =$idr AND r.fecha_registro BETWEEN '$date1' AND '$date2'";
        
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->cultivos[]=$row;
        }
        return $this->cultivos;
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

        $sql = "UPDATE imagen SET 'ruta' = '$db_url_img' WHERE id_imagen = $id";

        $resul=mysqli_query($this->con(),$sql);

        return $resul;
    } 


 
}

?>