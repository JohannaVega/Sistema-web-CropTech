<?php
include 'AdmonDAO.php';
include 'UserDAO.php';
include 'CultivoDAO.php';
include 'ProveedorDAO.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

class facade{
    //instanciando objetos DAO
    private $obj_admon;
    private $obj_user;
    private $obj_cultivo;
    private $obj_proveedor;

    public function __construct(){
        $this->obj_admon = new AdmonDAO();
        $this->obj_user = new UserDAO();
        $this->obj_cultivo = new CultivoDAO();
        $this->obj_proveedor = new ProveedorDAO();
    }

    //FUNCION PARA IDENTIFICAR TIPO DE USUARIO 
    public function TipoUser($id){//ok
        $tipo=0;                   
        //1=cultivador con mail  
        //2=proveedor con mail  
        //3=admon con mail 
        //0=no existe
        
                //Verificamos el rol 
                $resul1 = $this->obj_user->read_rol($id);
                //Asignamos tipo de usuario
                if($resul1 == 1){
                    $tipo=1;
                }else if($resul1 == 2){
                    $tipo=2;
                }else if($resul1 == 3){
                    $tipo=3;

                }

        return $tipo;
   }

    //funcion para validar clave y correo/id
    public function validarCredencial($mail,$pass){//ok
        $tipo=0;
        //tipo =1 envia al modulo de cultivodor
        //tipo=2 envia al modulo de proveedor
        //tipo=3 envia al modulo de administrador
        //tipo= 0 error en datos (No existe el usuario)

        $resul1=$this->obj_user->readall_login();

        //Leemos los datos de login validando que el mail y la clave existan
        //si existen validamos el rol del usuario que ingresa
        for($i=0;$i<count($resul1);$i++){
            if($resul1[$i]['correo'] == $mail && $resul1[$i]['clave'] == $pass){
                $tipo=$this->TipoUser($resul1[$i]['id_usuario']);
            }
        }
        return $tipo;
   } 

   //funcion para definir id de la sesion,el $id es el mail del usuario
   public function idDefinitivo($id){ //ok
        $iddef=0;

        $resul1=$this->obj_user->readOneById($id);
        for($i=0;$i<count($resul1);$i++){
            $iddef=$resul1[$i]['id_usuario'];
        }
    
        return $iddef;
   }

   //Me permite optener la informacion de sing-in de un usuario por medio del id
   public function read_datos_login($id_user){ //ok

    $resul=$this->obj_user->read_user_login($id_user);
    return $resul;
}

    //FUNCION PARA VERIFICAR QUE UNA CLAVE CUMPLA CON LAS CONDICIONES
    public function validarPass($clave){//con expresiones regulares    //ok
        $error_clave =  " ";
        if(strlen($clave) < 6){
            $error_clave ='a';// "La clave debe tener al menos 6 caracteres";
        }
        if(strlen($clave) > 16){
            $error_clave ='b';// "La clave no puede tener más de 16 caracteres";
        }
        if (!preg_match('`[a-z]`',$clave)){
            $error_clave ='c';// "La clave debe tener al menos una letra minúscula";
        }
        if (!preg_match('`[A-Z]`',$clave)){
            $error_clave = 'd';// "La clave debe tener al menos una letra mayúscula";
        }
        if (!preg_match('`[0-9]`',$clave)){
            $error_clave ='e';// "La clave debe tener al menos un caracter numérico";
        }
        
        return $error_clave;
    }

    //FUNCIÓN QUE VALIDA QUE EL CORREO A REGISTRAR
    //NO EXISTA EN LA BD
    public function validarCorreo($mail){//correo  //ok
        $direccionador1=0;

        $resul2=$this->obj_user->readall_login();
    
        for($i=0;$i<count($resul2);$i++){
            if(strtoupper($resul2[$i]['correo']) == strtoupper($mail)){
                $direccionador1=2;
            }
        }
    return $direccionador1;
    }

    //Funcion que valida que la respuesta a la pregunta ingresada sea la correcta
    public function validarPregunta($id,$respuesta){//ok
        
        $resul1=$this->obj_user->readall_login();
       
           for($i=0;$i<count($resul1);$i++){
               if($resul1[$i]['id_usuario'] == $id){
                  if(strtoupper($resul1[$i]['respuesta']) == strtoupper($respuesta)){
                      return true;
                  }   
               }
           }
        
       return false;
    }

    //FUNCION PARA VERIFICAR LA EXISTENCIA DE UN NUMERO DE TELEFONO   //ok
    public function verificarIdUser($id){
        $direccionador1=0;
        $resul=$this->obj_user->readall_telefonos();
    
        for($i=0;$i<count($resul);$i++){
            if($resul[$i]['id_usuario'] == $id){
                $direccionador1=2;
            }
        }
    
    return $direccionador1; 
    }

    public function buscar_telefono($telefono){
        $flag=0;

        $resul= $this->obj_user->search_telefono($telefono);
            if($resul==$telefono){
                $flag=1;
            }
        return $flag;
    }

    //INSERTANDO USUARIOS    //ok
    public function insertarUser($nombre,$apellido,$sexo,$correo,$tipo_telefono,$telefono,
                                $contra,$askf,$answer,$estado,$rol){
        $resul=$this->obj_user->insert($nombre,$apellido,$sexo,$correo,$tipo_telefono,$telefono,
                                        $contra,$askf,$answer,$estado,$rol);
        return $resul;
    }

   //funcion que valida el estado del insert: información de usuarios    OK
   public function validarRegistroUser($nombre,$apellido,$sexo,$correo,$tipo_telefono,$telefono,
                    $contra,$contra2,$ask,$answer,$estado,$rol){
    $feedback="";
    if($contra == $contra2){
        if($this->validarPass($contra) == ' '){
            if($tipo_telefono != '0' && $tipo_telefono<=2){
                        if($ask != '0'){
                            if($ask==1)
                            $askf="Nombre de su primer mascota";
                            if($ask==2)
                            $askf="Direccion de su primer lugar de residencia";
                            if($ask==3)
                            $askf="Nombre mejor amigo de la infancia";
                            if($ask==4)
                            $askf="Nombre de su localidad de residencia";
                            if($ask==5)
                            $askf="Color de su camisa favorita";
                            if($sexo != '0' ){
                        if($this->validarCorreo($correo) == 0){//verifica correo no exista para registrarlo
                                    if($this->verificarIdUser($telefono)==0){//si redirecciona un 0 es porq no existe el tel en la bd
                                        if($this->insertarUser($nombre,$apellido,$sexo,$correo,$tipo_telefono,$telefono,
                                            $contra,$askf,$answer,$estado,$rol) == true){
                                            $feedback='ok';
                                        }else{
                                            $feedback='1';//error en el insert
                                        }
                                        
                                    }else{
                                        $feedback='2';//telefono1 ya existe en la bd
                                    }
                                }else{
                                    $feedback='3';//correo existe
                                }
                            }else{
                                $feedback='4';//No selecciono sexo

                            }
                        }else{
                            $feedback='5';//No selecciono pregunta
                        } 
            }else{
                $feedback='7';//No selecciono tipo de telefono no. 1
            }
        }else{
            $feedback=$this->validarPass($contra);//contraseña no valida
        }
    }else{
      $feedback='6';//las claves no son iguales
    }
     return $feedback;  
  }

    //LLamamos la funcion que nos permite
    // leer la informacion del usuario por medio del id    ok
  public function readOneFullById($id){ 
    $resul=$this->obj_user->readOneFullById($id);
    return $resul;
  }

    //LLamamos la funcion que nos permite
    // leer la informacion del usuario por medio del id 
  public function readUserById($id){   //ok
    $resul3=$this->obj_user->readOneById($id);
    return $resul3;
  }
 
    //LLamamos la funcion que nos permite
    // leer los tipos de telefonos que maneja la BD
  public function read_tipos_tel(){
      $result = $this->obj_user->read_tipo_telefono();
      return $result;
  }

   //FUNCIÓN QUE ACTUALIZA LA CONTRASEÑA DEL USER POR MEDIO DEL ID   ok
   public function updatePassUserById($id,$pass1,$pass2){

        $feedback='';
        if($pass1 == $pass2){
            if($this->validarPass($pass1) == ' '){
                /* */
                if($this->obj_user->updatePass($id,$pass1) == true){
                    $feedback='ok1';//se actualizo correctamente 
                }else{
                    $feedback='3';//error en el update
                }
            }else{
                $feedback='2';//las claves dadas no son validas
            }
        }else{
            $feedback='1';//las claves dadas no son iguales
        }
        return $feedback;
  }

   //Función que valida que el correo ingresado para actualizar el email    ok
   //y demás datos no exista ya en la BD
  public function correoUnico($id,$nombre,$apellido,$email){
      $feedback="";
        if($this->validarCorreoUnico($email,$id) == 0){//verifica correo no exista para registrarlo
            if($this->updateDatosUsser($id,$nombre,$apellido,$email)==true){
                $feedback='hecho';
            }else{
                $feedback='fail';
            }
        }else{
            $feedback='email';//correo existe
        }
        return $feedback;
  }


    //Metodo que permite llegar al obj user para actualizar los datos del usuario   ok
    public function updateDatosUsser($id,$nombre,$apellido,$email){
        $resul=$this->obj_user->updateUser($id,$nombre,$apellido,$email);
        return $resul;
    }
 

    //FUNCIÓN QUE VALIDA QUE EL CORREO A REGISTRAR
    //no este registrado por otro usuario      ok pendiente
    public function validarCorreoUnico($mail,$id){//correo
        $direccionador1=0;
        $resul2=$this->obj_user->readAll_Menosid($id);
    
        for($i=0;$i<count($resul2);$i++){
            if(strtoupper($resul2[$i]['correo']) == strtoupper($mail)){
                $direccionador1=2;
            }
        }
        return $direccionador1;
    }

    //FUNCION Que verifica si un telefono ya ha sido registrado  
    public function verificarTelefono_unico($telefono,$id){
        $direccionador1=0;
        $resul2=$this->obj_user->readAll_Menosid($id);
    
        for($i=0;$i<count($resul2);$i++){
            if($resul2[$i]['telefono_usuario'] == $telefono){
                $direccionador1=2;//es user 
            }
        }
    
        return $direccionador1;
    }

    //Funcion que invoca a un metodo de la clase proveedorDAO para insertar tienda    ok
    public function insert_tienda($idu,$name_shop,$address,$address_web,$descripcion){
        $feedback="";
        $resul = $this->obj_proveedor->read_tienda_u($idu);

        
        if(count($resul)<1){
            if($resul=$this->obj_proveedor->insert($idu,$name_shop,$address,$address_web,$descripcion)==true){
                $feedback='ok';
            }else{
                $feedback='bad';
            }
        }else{
            $feedback='limit';//no puede agregar más de dos tiendas
        }
        return $feedback;
    }

    //Funcion que permite editar los datos de una tienda en especifico    ok
    public function editar_tienda($idp,$name_shop,$address,$address_web,$descripcion){
        $feedback="";
        if(empty($name_shop) or empty($address) or empty($descripcion)){
            $feedback='void';
        }else{
            if($resul=$this->obj_proveedor->update($idp,$name_shop,$address,$address_web,$descripcion)==true){
                $feedback='ok';
            }else{
                $feedback='bad';
            }
        }
        return $feedback;
    }

    //Fución que permite leer la información completa de la tienda de un usuario
    public function read_tiendas_user($idu){//ok
        $resul = $this->obj_proveedor->read_tiendas_user($idu);
        return $resul;
    }

    //Fución que permite leer la informacion de la tienda de un usuario 
    //trayendo unicamente la información almacenada en la tabla proveedor
    public function read_tienda_proveedor($idu){//ok
        $resul=$this->obj_proveedor->read_tienda_u($idu);
        return $resul;
    }
    
    //Fución que permite leer la información completa de la tienda de un proveedor
    //buscando información por medio del id_proveedor
    public function ver_tienda_byidp($idp){
        $resul=$this->obj_proveedor->read_tienda_proveedor($idp);
         return $resul; 
    }

    //Fución que permite leer la información completa de la tienda de un proveedor
    //buscando información por medio del id_categoria
    public function ver_tiendas_bycategoria($idc){
        $resul=$this->obj_proveedor->read_tienda_categoria($idc);
         return $resul; 
    
    }

    //Fución que permite leer la información de categorias de productos de una tienda
    //buscando información por medio del id_proveedor
    public function categorias_productos($idp){
        $resul=$this->obj_proveedor->read_categorias_tienda($idp);
         return $resul; 
    }

    //Función que permite asignar categoria a tienda de proveedor
    public function insert_categoria_pro($idu,$categoria){//ok

        $feedback="";
        $resul=$this->obj_proveedor->read_tiendas_user($idu);

        $id_proveedor= $resul[0]['id_proveedor'];

        $exist=$this->categoria_proveedor($id_proveedor,$categoria);

        if(empty($categoria)){
            $feedback='cate';//no seleccionó categoria

        }else if($categoria>0 && $categoria<5){

            if(!$exist){
                if($resul=$this->obj_proveedor->insert_categoria_pro($id_proveedor,$categoria)==true){
                    $feedback='ok';
                }else{
                    $feedback='bad';
                    }
            }else{
                $feedback='yet';//categoria ya registrada
            }
        
        }else 
            $feedback='not';//categoria no valida

        return $feedback;

    }

    //Función que me permite validar si una categoria ya 
    //le pertenece a un proveedor
    public function categoria_proveedor($id_proveedor,$categoria){
        $exist=false;
        $resul=$this->obj_proveedor->read_categorias_byProv($id_proveedor,$categoria);

        for($i=0; $i<count($resul); $i++){
            if($resul[$i]['id_tipo_categoria'] == $categoria){
                $exist=true;
            }
        }
        return $exist;
    }

    //SECCION CULTIVOS


   //Metodo que permite agregar un cultivo, retorna ok cuando
   //se realizó el insert exitosamente
   public function addcultivo($idu, $cnombre, $fecha_registro, $estado){
        $feedback='';
        if($resul=$this->obj_cultivo->insert($idu, $cnombre, $fecha_registro, $estado) == true){
            $feedback='ok';
        }else{
        $feedback='bad';
        }
        return $feedback;
   }

   //Metodo que me ermite leer los cultivos registrado en la Base de datos
   public function read_all_cultivos(){ //ok
        $resul=$this->obj_cultivo->read_all();
        return $resul;
   }

    //Metodo que permite buscar los cultivos seleccionados de un usuario mediante su id
    public function read_cultivos_byuser($idu){
        $resul=$this->obj_cultivo->read_cultivos_user($idu);
        return $resul; 
    }

     //Metodo que permite el ingreso de cultivos para que estos sean elegidos por los usuarios cultivadores 
     public function addcultivostochoose($id_culti,$cnombre,$luminosidadop,$humedadop,$temperaturaop,$tiempo_siembra,$primera_fecha_registro,$id_tipo){
        $feedback='';
        if($resul=$this->obj_cultivo->insert_cultivos_tochooose($id_culti,$cnombre,$luminosidadop,$humedadop,$temperaturaop,$tiempo_siembra,$primera_fecha_registro,$id_tipo) == true){
            $feedback='ok';
        }else {
            $feedback='bad';
        }
        return $feedback;
    } 

    //Metodo que permite ingresar cultivos para que posteriormente sean elegidos por los usuarios cultivadores
    public function  add_especifications_ofcultivo($id_imagen,$cantidad_hojas_nuevas,$centimetros_obtenidos,$comentarios,$fecha_registro,$id_condiciones,$nro_registro_siembra){
        $feedback='';
        if($resul=$this->obj_cultivo->insert_especifications_cultivo($id_imagen,$cantidad_hojas_nuevas,$centimetros_obtenidos,$comentarios,$fecha_registro,$id_condiciones,$nro_registro_siembra) == true ){
              $feedback='ok';
        }else{
            $feedback='bad';
        }
        return $feedback;
   } 

    //Metodo que permite leer todos los tipos de cultivos que hay 
    public function read_tiposcultivo(){
        $resul=$this->obj_cultivo->read_tipos_cultivo();
        return $resul;
    }

    //Metodo que permite leer el mediante el id de cultivo cual es su tipo
    public function read_typeof_cultivo($id_culti){
        $resul=$this->obj_cultivo->read_tipo_byidcultivo($id_culti);
        return $resul;
    }

    //Metodo que permite leer todos los registros de seguimiento de un cultivo
    public function read_historialbynoregistro($nro_registro_siembra){
        $resul=$this->obj_cultivo->readallbynroregistro($nro_registro_siembra);
        return $resul;
    }

    //Metodo que permite leer el seguimiento de un cultivo por su numero de seguimiento
    public function read_seguimientobynumber($no_seguim){
        $resul=$this->obj_cultivo->readOneByNOSEG($no_seguim);
        return $resul; 
    }

    //Metodo que permite ingresar los datos para las imagenes que se subiran en cada uno de los seguimientos de cada cultivo
    //---->resolver esta seccion
    public function add_datosimagen($id_imagen,$nombre_imagen,$imagen,$tipo){
        $feedback='';
        if($resul=$this->obj_cultivo->insert_datos_IMAGEN($id_imagen,$nombre_imagen,$imagen,$tipo) == true){
            $feedback='ok';
        }else{
            $feedback='bad';
        }
        return $feedback;
   }

    //Metodo que permite ingresar los datos de las condiciones climaticas de nuestro cultivo para la tabla cultivo_registro_u
    public function insert_datos_condicionesclima($id_condiciones,$cantidad_humedad,$nivel_temperatura,$cantidad_luminosidad){
        $feedback='';
        if($resul=$this->obj_cultivo->insert_datos_condiciones_amb($id_condiciones,$cantidad_humedad,$nivel_temperatura,$cantidad_luminosida) == true){
            $feedback='ok';
        }else{
            $feedback='bad';
        }
        return $feedback;
    }

     //Metodo que permite leer todos los registros de siembra que hay en el sistema
     public function read_registros_siembra(){
        $resul=$this->obj_cultivo->read_reg_siembra();
        return $resul;
    }

    //Metodo que permite validar si un usuario tiene cultivos 
    public function validar_cultivos_user($idu){//ok
        $feedback="";
        $resul=$this->obj_cultivo->read_cultivos_user($idu);
        $exist=count($resul);

        if($exist==0){
            $feedback="no_exist";
        }else{
            $feedback="exist";
        }
        return $feedback;
    }

    //Metodo que permite leer los cultivos de un usuario
    public function read_cultivos_user($idu){//ok
        $resul=$this->obj_cultivo->read_cultivos_user($idu);
        return $resul;
    }

    //Metodo que permite leer registro de una siembra en especifico
    public function read_registro_siembra($registro_s){//ok
        $resul=$this->obj_cultivo->read_registro_c($registro_s);
        return $resul;
    }

    //Metodo que permite desactivar el registro de una siembra
    public function desactivar_registro_s($registro_s){
        $feedback="";
        $resul=$this->obj_cultivo->change_estado($registro_s);
        if($resul){
            $feedback="ok";
        }else{
            $feedback="bad";
        }
        
        return $resul;
    }


    //FIN SECCION CULTIVOS




   //Metodo que permite leer los roles del sistema 
   public function read_roles(){ 
       $resul=$this->obj_user->read_roles();
       return $resul;
   }

   //Metodo que permite leer el rol de un usuario
   public function read_rol_byId($id){
        $resul=$this->obj_user->read_rol($id);
        return $resul;
   }

   //Método que permite agregar telefono a un usuario en especifico
   public function agregar_telefono($idu,$tipo_telefono,$telefono){//ok
        $feedback="";
        $exist=$this->verificarIdUser($telefono);
        if($exist==0){
            if($this->obj_user->insert_telefono($idu,$tipo_telefono,$telefono)==true){
                $feedback='hecho';//Se inserto telefono

            }else $feedback='error';//No se inserto telefono

        }else{
            $feedback='tele';//telefono ya existe en la bd
        }
       
        return $feedback;
   }

   //Método que permite editar telefono de un usuario en especifico
   public function editar_telefono($idu,$telefono,$tel_anterior){ //ok
        $feedback="";
        $exist=$this->verificarIdUser($telefono);

        if($exist==0){
            $cant_nums= strlen($telefono);
            $tipo=0;
            if($cant_nums==10){
                $tipo=1;
            }if($cant_nums==7){
                $tipo=2;
            }
            if($tipo=1 or $tipo=2){
                if($this->obj_user->update_telefono($idu,$telefono,$tipo,$tel_anterior)==true){
                    $feedback='hecho';//Se actualizó telefono

                }else $feedback='error';//No se actualizó telefono

            }else{
                $feedback='not';//Telefono con longitud no valida
            }
                
        }else{
            $feedback='tele';//telefono ya existe en la bd
        }
       
        return $feedback;

   }

   
   //Metodo que permite ver las categorias de tiendas del sistema
   public function ver_categorias(){ //ok
       $resul=$this->obj_proveedor-> read_categorias();
       return $resul;
   }

   public function ver_tiendas(){//ok
       $resul= $this->obj_proveedor->read_alltiendas();
       return $resul;
   }

   //Metodo que permite enviar notificaciones al admon
   //para desactivar usuario
   public function desactivar_usuario($idu,$tipo_solicitud,$detalles){//ok

        $feedback="";

        $fecha_solicitud = date('Y-m-d');

        $resul= $this->obj_user->save_solicitud($idu,$tipo_solicitud,$detalles,$fecha_solicitud);

        $tipo = $this->obj_admon->read_tipo_solicitudes();
        
        if($resul){

            /*Configuracion de variables para enviar el correo*/
            $mail_username="croptech.admon@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
            $mail_userpassword="505Crop *606";//Tu contraseña de gmail
            $mail_addAddress="eyvegaf@gmail.com";//correo electronico que recibira el mensaje
          
                            
            
            $mail_setFromEmail="croptech.admon@gmail.com";
            $mail_setFromName="Croptech";

             //------Asunto
             for($i=0;$i<count($tipo);$i++){
                if($tipo[$i]['id_solicitud']==$tipo_solicitud){
                    $mail_subject=$tipo[$i]['tipo_solicitud'];
                    
                }
        
            }      

            $txt_message=$detalles." ID USER: ".$idu; 
            $estado_correo=$this->sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject);
            
            if($estado_correo=="Tu mensaje ha sido enviado!")
                $feedback="mensaje_ok";

            else
                $feedback=$estado_correo;


            //$feedback="ok";

        }/*else
            $feedback="bad";*/


        return $feedback;
   }

    //Funcion que me permite enviar correos de solicitudes al administrador
   private function sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject){
        $feedback="";

        $mail = new PHPMailer;
        date_default_timezone_set('Etc/UTC');

         //Server settings
        $mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
        $mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar 
        $mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
        $mail->Username = $mail_username;          // Correo electronico saliente ejemplo: tucorreo@gmail.com
        $mail->Password = $mail_userpassword; 		// Tu contraseña de gmail
        $mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
        $mail->Port = 587;                          // Puerto TCP  para conectarse 


        $mail->setFrom($mail_setFromEmail, $mail_setFromName);//Quien envia el mensaje
        $mail->addAddress($mail_addAddress);   // Receptor del mail

        //$body = file_get_contents('http://localhost/proyecto_grado/croptech/vista/plantilla_mail.php');
        
        //contenido
        $mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
        $mail->Subject = $mail_subject;

        /*----MENSAJE HTML---*/
        //incrustar imagen para cuerpo de mensaje(no confundir con Adjuntar)
        $mail->AddEmbeddedImage('../assets/img/logo.png', 'imagen'); //ruta de archivo de imagen

        //cargar archivo css para cuerpo de mensaje
        $rcss = "../assets/css/estilo.css";//ruta de archivo css
        $fcss = fopen ($rcss, "r");//abrir archivo css
        $scss = fread ($fcss, filesize ($rcss));//leer contenido de css
        fclose ($fcss);//cerrar archivo css
        //Cargar archivo html   
        $shtml = file_get_contents('../vista/plantilla_mail.php');
        //reemplazar sección de plantilla html con el css cargado y mensaje creado
        $incss  = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml);
        $cuerpo = str_replace('<p id="mensaje"></p>',$txt_message,$incss);
        $mail->Body = $cuerpo; //cuerpo del mensaje
        $mail->AltBody = '---';//Mensaje de sólo texto si el receptor no acepta HTML
        //$mail->Body = $body;
        //$mail->msgHTML($txt_message);
 
        if(!$mail->send()) {
            $feedback="No se pudo enviar el mensaje.. ". $mail->ErrorInfo;
            /*echo '<p style="color:red">No se pudo enviar el mensaje..';
            echo 'Error de correo: ' . $mail->ErrorInfo;
            echo "</p>";*/
        } else {
            $feedback="Tu mensaje ha sido enviado!";
        }
        return $feedback;
    }

   //Funcion que permite leer las solicitudes realizadas al admon, de la bd
   public function leer_solicitudes(){//ok
       $resul = $this->obj_admon->read_solicitudes();
       return $resul;
   }

}

?>