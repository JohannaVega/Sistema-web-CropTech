<?php

include '../modelo/facade.php';
//iniciamos la variable sesion
session_start();

//----------------------INICIO DE SESION ---------------------------//
if(isset($_POST['user']) && isset($_POST['pass'])){
  $user=$_POST['user'];
    //$pass=hash('sha256',$_POST['pass']);
    $pass=$_POST['pass'];
    $obj_fecade=new facade();
    //llamamos a validarCredencial para que nos diga que 
    //tipo de usuario inicia sesion
    $tipo_user=$obj_fecade->validarCredencial($user,$pass);   
    //tipo_user 1= cultivador, tipo_user 2= proveedor, tipo_user 3= administrador
    $iddef=0;
    //definimos id de la sesion 
    $iddef=$obj_fecade->idDefinitivo($user);
    //a la variable sesion le asignamos el usuario correspondiente 
    $_SESSION["usuario"]= $iddef;

    if($tipo_user==1){
        //redireccionamos a la pagina de inicio del cultivador
        header("Location: http://localhost/proyecto_grado/croptech/vista/user_inicio.php?id=$iddef");
    }else
    if($tipo_user==2){
        //redireccionamos a la pagina de inicio del proveedor
        header("Location: http://localhost/proyecto_grado/croptech/vista/proveedor_inicio.php?id=$iddef"); 
    }else
    if($tipo_user==3){
        //redireccionamos a la pagina de inicio del admin
        header("Location: http://localhost/proyecto_grado/croptech/vista/admon_inicio.php?id=$iddef"); 
    }
    else{
        echo "<script type='text/javascript'>
        alert('Usuario o contraseña invalido..');
        window.location='http://localhost/proyecto_grado/croptech';
        </script>"; 
    }
}
//Validamos que mediante el metodo post hayan sido enviados los datos del input cuyo valor sea CREAR_U
//para luego validar los valores ingresados por el usuario en el formulario de registro
//y hacer una instancia del obj facade para acceder al metodo que valida el registro
//----------------------REGISTRO DE USUARIO CULTIVADOR---------------------------//
if(isset($_POST['Registro']) && $_POST['Registro']=='CREAR_U' ){

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['sexo']) && isset($_POST['correo'])
 &&  isset($_POST['tipo_telefono']) && isset($_POST['telefono']) && isset($_POST['contra']) && isset($_POST['contra2'])
  && isset($_POST['ask']) && isset($_POST['answer']) && isset($_POST['estado']) && isset($_POST['rol']) ){
    $obj=new facade();
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
    $correo = $_POST['correo'];
    $tipo_telefono = $_POST['tipo_telefono'];
    $telefono = $_POST['telefono'];
    $contra = $_POST['contra'];
    $contra2 = $_POST['contra2'];
    $ask = $_POST['ask'];
    $answer = $_POST['answer'];
    $estado = $_POST['estado'];
    $rol = $_POST['rol'];
    $resul=$obj->validarRegistroUser($nombre,$apellido,$sexo,$correo,$tipo_telefono,$telefono,
        $contra,$contra2,$ask,$answer,$estado,$rol);

    if($rol==1){
        header("Location: http://localhost/proyecto_grado/croptech/login/sing-up.php?iderror=$resul");
    }else if($rol==2){
        header("Location: http://localhost/proyecto_grado/croptech/login/sing-up_p.php?iderror=$resul");
    }else if($rol==3){
        header("Location: http://localhost/proyecto_grado/croptech/login/sing-up_a.php?iderror=$resul");
    }
    
 }
}

//----------------------REGISTRO DE USUARIO PROVEEDOR ---------------------------//
if(isset($_POST['Registro']) && $_POST['Registro']=='CREAR_UP' ){

    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['sexo']) && isset($_POST['correo'])
    && isset($_POST['telefono']) && isset($_POST['contra']) && isset($_POST['contra2']) 
    && isset($_POST['ask']) && isset($_POST['answer']) && isset($_POST['estado']) && isset($_POST['rol']) ){
        $obj=new facade();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sexo = $_POST['sexo'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $telefono2 = $_POST['telefono2'];
        $contra = $_POST['contra'];
        $contra2 = $_POST['contra2'];
        $ask = $_POST['ask'];
        $answer = $_POST['answer'];
        $estado = $_POST['estado'];
        $rol = $_POST['rol'];
        $resul=$obj->validarRegistroUser($nombre,$apellido,$sexo,$correo,$telefono,$telefono2,$contra,
        $contra2,$ask,$answer,$estado,$rol);
    
        header("Location: http://localhost/proyecto_grado/croptech/login/sing-up_p.php?iderror=$resul");
     }
}

//----------------------REGISTRO DE USUARIO ADMINISTRADOR ---------------------------//
if(isset($_POST['Registro']) && $_POST['Registro']=='CREAR_UA' ){

    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['sexo']) && isset($_POST['correo'])
    && isset($_POST['telefono']) && isset($_POST['contra']) && isset($_POST['contra2']) 
    && isset($_POST['ask']) && isset($_POST['answer']) && isset($_POST['estado']) && isset($_POST['rol']) ){
        $obj=new facade();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sexo = $_POST['sexo'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $telefono2 = $_POST['telefono2'];
        $contra = $_POST['contra'];
        $contra2 = $_POST['contra2'];
        $ask = $_POST['ask'];
        $answer = $_POST['answer'];
        $estado = $_POST['estado'];
        $rol = $_POST['rol'];
        $resul=$obj->validarRegistroUser($nombre,$apellido,$sexo,$correo,$telefono,$telefono2,$contra,
        $contra2,$ask,$answer,$estado,$rol);
    
        header("Location: http://localhost/proyecto_grado/croptech/login/sing-up_a.php?iderror=$resul");
     }
}
    
//----------------------REGISTRO DE USUARIO ---------------------------//
//Registro realizado por el usuario administrador
if(isset($_POST['edit_admon']) && $_POST['edit_admon']=='CREAR_U' ){

    if(isset($_POST['pnombre']) && isset($_POST['sapellido']) && isset($_POST['sexo']) && isset($_POST['correo'])
    && isset($_POST['telefono']) && isset($_POST['pass1']) && isset($_POST['pass2']) 
    && isset($_POST['ask']) && isset($_POST['answer']) ){
        $obj=new facade();
        $nombre = $_POST['pnombre'];
        $apellido = $_POST['sapellido'];
        $sexo = $_POST['sexo'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $contra = $_POST['pass1'];
        $contra2 = $_POST['pass2'];
        $ask = $_POST['ask'];
        $answer = $_POST['answer'];
        $resul=$obj->validarRegistroUser($nombre,$apellido,$sexo,$correo,$telefono,$contra,$contra2,$ask,$answer);
    
        header("Location: http://localhost/proyecto_grado/croptech/vista/admon_insert.php?iderror=$resul");
     }
    }



?>