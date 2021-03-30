<?php
session_start();
if($_SESSION['usuario']){
    require '../modelo/facade.php';

    //Validamos que hayan llegado los valores correctamente por el metodo POST
    //Y procedemos a instanciar el obj facade para iagregar cultivo nuevo
if(isset($_POST['user_c']) && $_POST['user_c']=='CREAR_C' ){
    if(isset($_POST['cnombre']) &&  isset($_POST['fecha_registro']) && isset($_POST['idu'])){
       $obj=new facade();
       $resul=$obj->addcultivo($_POST['idu'],$_POST['cnombre'],$_POST['fecha_registro']);

      if($resul=="ok")
       header("Location: http://localhost/proyecto_grado/croptech/vista/cultivo-agregar.php?iderror=ok");
       else
       header("Location: http://localhost/proyecto_grado/croptech/vista/cultivo-agregar.php?iderror=bad");
    }
   }

}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";}
  ?>