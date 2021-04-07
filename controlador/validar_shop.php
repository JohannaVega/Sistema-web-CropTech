<?php
session_start();
if($_SESSION['usuario']){
    require '../modelo/facade.php';

//-----               REGISTRAR TIENDA         -----
//Se valida que llegen los datos por el método post para instanciar
//el objeto Facade y hacer la posterior inserción de la tienda
if(isset($_POST['proveedor']) && $_POST['proveedor']=='INSERT_SHOP'){
  if(isset($_POST['name_shop']) && isset($_POST['address']) && isset($_POST['address_web']) 
    && isset($_POST['descripcion']) && isset($_POST['idu'])){
     $obj=new facade();

     $resul=$obj->insert_tienda($_POST['idu'],$_POST['name_shop'], 
                  $_POST['address'], $_POST['address_web'],$_POST['descripcion']);

     header("Location: http://localhost/proyecto_grado/croptech/vista/proveedor_registrar.php?iderror=$resul");

  }
}

//-----               EDITAR TIENDA         -----
//Se valida que llegen los datos por el método post para instanciar
//el objeto Facade y hacer la posterior edición de los datos de la tienda
if(isset($_POST['proveedor']) && $_POST['proveedor']=='EDIT_SHOP'){
  if(isset($_POST['name_shop']) && isset($_POST['address']) && isset($_POST['address_web']) 
  && isset($_POST['descripcion']) && isset($_POST['idp'])){

    $obj=new facade();

     $resul=$obj->editar_tienda($_POST['idp'],$_POST['name_shop'], 
                  $_POST['address'], $_POST['address_web'],$_POST['descripcion']);

     header("Location: http://localhost/proyecto_grado/croptech/vista/proveedor_mishop.php?iderror=$resul");
  }

}

//-----               AGREGAR CATEGORIA A TIENDA         -----
//Se valida que llegen los datos por el método post para instanciar
//el objeto Facade y posteriormente agregar una categoria a la tienda
if(isset($_POST['proveedor']) && $_POST['proveedor']=='ADDCAT'){
  if(isset($_POST['categoria']) && isset($_POST['idu'])){
    $obj=new facade();

    $resul= $obj->insert_categoria_pro($_POST['idu'],$_POST['categoria']);
    header("Location: http://localhost/proyecto_grado/croptech/vista/proveedor_addcat.php?iderror=$resul");
  }
}



}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";}
  ?>