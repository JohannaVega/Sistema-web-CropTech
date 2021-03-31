<?php
session_start();
if($_SESSION['usuario']){
    require '../modelo/facade.php';

//-----               REGISTRAR TIENDA         -----
//Se valida que llegen los datos por el método post para instanciar
//el objeto Facade y hacer la posterior inserción de la tienda
if(isset($_POST['proveedor']) && $_POST['proveedor']=='INSERT_SHOP'){
  if(isset($_POST['name_shop']) && isset($_POST['address']) && isset($_POST['descripcion'])
     && isset($_POST['idu']) && isset($_POST['name']) && isset($_POST['apellido'])){
     $obj=new facade();

     $resul=$obj->insert_tienda($_POST['idu'], $_POST['name'], $_POST['apellido'],$_POST['name_shop'], 
     $_POST['address'], $_POST['descripcion']);
     header("Location: http://localhost/proyecto_grado/croptech/vista/proveedor_registrar.php?iderror=$resul");


  }
}



}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";}
  ?>