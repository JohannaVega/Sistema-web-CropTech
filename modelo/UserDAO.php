<?php

require_once("../class/conexion_db.php");

class UserDAO extends Conectar{
    private $usuarios;
    public function __construct(){
        $this->usuarios=array();
    }
    
    //Leemos los datos de usuario de los usuarios   ok
    public function readall(){  //read

        $sql="select * from usuario";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->usuarios[]=$row;
        }
        return $this->usuarios;
    }

    //Leemos el rol del usuario indicado    ok
    public function read_rol($id){  //read
 
        $rol=0;
        $sql="select id_rol_usuario from usuario where id_usuario =$id";
        $resul=mysqli_query($this->con(),$sql);

        if ($row = mysqli_fetch_row($resul)) {
            $rol = trim($row[0]);
            }
       
        return $rol;
    }
 
    //Leemos los datos de sesión de los usuarios   ok
    public function readall_login(){  //read

        $sql="select * from login_usuario";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->usuarios[]=$row;
        }
        return $this->usuarios;
    }

    //Leemos los telefonos de sesión de los usuarios    ok
    public function readall_telefonos(){  //read 

        $sql6="select * from no_telefonos_usuario";
        $resul=mysqli_query($this->con(),$sql6);
        while($row=mysqli_fetch_assoc($resul)){
            $this->usuarios[]=$row;
        }
        return $this->usuarios;
    }

    public function search_telefono($telefono){
        $tel=0;
       
        $conexion=$this->con();
     
        $slq="select telefono_usuario from no_telefonos_usuario where telefono_usuario=$telefono";
        $resul = $conexion->query($slq);
        $rows = $resul->fetchAll();

        if ($resul->rowCount() > 0) {
            foreach ($rows as $row) {
                $tel=$row[$telefono]; //valor de la palabra
            }
        } else {
            $tel=0;
        }

        /*$resul=mysqli_query($this->con(),$slq);
        if ($row = mysqli_fetch_row($resul)) {
            $tel = trim($row[0]);
            }
       
        return $tel;*/
    }


    //Leemos los tipos de telefonos de la BD    ok
    public function read_tipo_telefono(){
        $sql = "select * from tipo_telefono";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->usuarios[]=$row;
        }
        return $this->usuarios;

    }

    //Leemos todos los datos de sesion de todos los usuarios
    // menos el indicado mediante su id             ok
    public function readAll_Menosid($id){
        $sql="select * from login_usuario l 
        INNER JOIN usuario u on l.id_usuario = u.id_usuario
        INNER JOIN no_telefonos_usuario n on u.id_usuario = n.id_usuario
        WHERE l.id_usuario NOT IN ($id)";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->usuarios[]=$row;
        }
        return $this->usuarios;
    }
    

    //Leemos usuario por  correo    ok
    public function readOneById($id){ 
    
        $sql="select * from login_usuario where correo='$id'";
        $resul=mysqli_query($this->con(),$sql); 
        
        while($row=mysqli_fetch_assoc($resul)){
            $this->usuarios[]=$row;
        }
        return $this->usuarios;

}
    //Insertamos Usuario    ok
    public function insert($nombre,$apellido,$sexo,$correo,$tipo_telefono,$telefono,$contra,$askf,
                    $answer,$estado,$rol){ //create 
        
        $resul4=false;
        //Insertamos los datos del usuario correspondientes a los datos personales
        $sql1="insert into usuario(nombre,apellido,sexo,estado,id_rol_usuario)
        values('$nombre','$apellido','$sexo','$estado','$rol')";
        $resul1=mysqli_query($this->con(),$sql1);

        //Validamos que la inserción se haya realizado correctamente
        if($resul1){
            //Buscamos el id de la inserción recien realizada
            //para poder insertar los demás datos ingresados por el usuario
            //En las tablas correspondientes
            $rs = mysqli_query($this->con(), "SELECT MAX(id_usuario) AS id FROM usuario");
            if ($row = mysqli_fetch_row($rs)) {
            $id = trim($row[0]);
            }
                 //insertamos los telefonos ingresados por el usuario en especifico
                $sql2="insert into no_telefonos_usuario(id_usuario,telefono_usuario,id_tipo_telefono)
                values('$id','$telefono','$tipo_telefono')";

                $resul2=mysqli_query($this->con(),$sql2);
            
           
            if($resul2){

                //insertamos los datos de sesión ingresados por el usuario
                $sql4="insert into login_usuario(correo,clave,pregunta,respuesta,id_usuario)
                values('$correo','$contra','$askf','$answer','$id')";

                $resul4=mysqli_query($this->con(),$sql4);
            }
        }
        return $resul4;
    }


    //Leemmos la informacion del usuario por medio del id de usuario reistrado en la BD   ok
    public function readOneFullById($id){ 
        $sql="select * from usuario u
        INNER JOIN login_usuario l on u.id_usuario = l.id_usuario
        INNER JOIN no_telefonos_usuario n on u.id_usuario = n.id_usuario
        WHERE u.id_usuario=$id";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->usuarios[]=$row;
        }
        return $this->usuarios;
    }

    //Actualizamos contraseña de usuario    ok
    public function updatePass($id,$pass){//update
        $sql="update login_usuario set clave='$pass' where id_usuario=$id";
        $resul=mysqli_query($this->con(),$sql);
        return $resul;
    }

    //Actualizamos datos de usuario
    public function updateUser($id,$nombre,$apellido,$email){//update

        $resul2=false;

        $sql1="update usuario set nombre='$nombre',apellido='$apellido'
               where id_usuario=$id";

        $resul1=mysqli_query($this->con(),$sql1);

        if($resul1){
            $sql2="update login_usuario set correo='$email' where id_usuario=$id";

            $resul2=mysqli_query($this->con(),$sql2);

        }

        return $resul2;
    } 
    //Metodo que permite ver los datos personales de los usuarios
    //junto con los cultivos registrados
    public function readAllFull(){
        $sql="select * from tb_usuario u,tb_cultivo c
        where u.id_usuario=c.id_usuario";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->usuarios[]=$row;
        }
        return $this->usuarios;
    }

    //Método que permite leer los roles de los usuarios del sistema
    public function read_roles(){
        $sql="select * from rol_usuario";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->usuarios[]=$row;
        }
        return $this->usuarios;
    }
    //Método que permite insertar un nuevo telefono al usuario
    public function insert_telefono($idu,$tipo_telefono,$telefono){
        $sql="insert into no_telefonos_usuario(id_usuario,telefono_usuario,id_tipo_telefono)
        values('$idu','$telefono','$tipo_telefono')";

        $resul=mysqli_query($this->con(),$sql);

        return $resul;
    }

    //Método que permite actualizar telefono del usuario
    public function update_telefono($idu,$telefono,$tipo,$tel_anterior){
      
        $sql="update no_telefonos_usuario set telefono_usuario='$telefono', id_tipo_telefono='$tipo'
         where id_usuario=$idu and telefono_usuario='$tel_anterior' ";

        $resul=mysqli_query($this->con(),$sql);

        return $resul;
    }


}

?>