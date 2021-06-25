<?php
session_start();
if($_SESSION['usuario']){
    require '../modelo/facade.php';

    //Validamos que hayan llegado los valores correctamente por el metodo POST
    //Y procedemos a instanciar el obj facade para iagregar cultivo nuevo
if(isset($_POST['user_c']) && $_POST['user_c']=='CREAR_C' ){
    if(isset($_POST['cnombre']) &&  isset($_POST['fecha_registro']) && isset($_POST['idu'])
    && isset($_POST['estado']) && isset($_POST['otro'])){
       $obj=new facade();
       $resul=$obj->addcultivo($_POST['idu'],$_POST['cnombre'],$_POST['fecha_registro'],$_POST['estado'],
                                $_POST['otro']);

       header("Location: http://localhost/proyecto_grado/croptech/vista/cultivo-agregar.php?iderror=$resul");
       
    }
}
//Validamos que llegue el POST de Crear Cultivo, generado por el admon
if(isset($_POST['admon_c']) && $_POST['admon_c']=='CREAR_C' )
{
    if(isset($_POST['name']) &&  isset($_POST['tipo']) && isset($_POST['humedadmin']) && isset($_POST['humedadmax'])
    && isset($_POST['luzmin']) && isset($_POST['luzmax']) && isset($_POST['temperaturamin'])
    && isset($_POST['temperaturamax']) && isset($_POST['tiempo']) && isset($_POST['idu']) && isset($_POST['ids']))
    {

       $obj=new facade();
       $resul=$obj->addcultivo_new($_POST['name'],$_POST['tipo'],$_POST['humedadmin'],$_POST['humedadmax'],
       $_POST['luzmin'],$_POST['luzmax'],$_POST['temperaturamin'],$_POST['temperaturamax'],$_POST['tiempo'],
       $_POST['idu'],$_POST['ids']);

       header("Location: http://localhost/proyecto_grado/croptech/vista/admon_cultivo.php?iderror=$resul");
       
    }
}

//Validamos que llegue el POST de Editar Cultivo, generado por el admon
if(isset($_POST['admon_c']) && $_POST['admon_c']=='EDIT_C' )
{
    if(isset($_POST['humedadmin']) && isset($_POST['humedadmax'])&& isset($_POST['luzmin']) 
    && isset($_POST['luzmax']) && isset($_POST['temperaturamin']) && isset($_POST['temperaturamax']) 
    && isset($_POST['tiempo']) && isset($_POST['id_cultivo']) )
    {

       $obj=new facade();
       $resul=$obj->edit_cultivo($_POST['humedadmin'],$_POST['humedadmax'],$_POST['luzmin'],
       $_POST['luzmax'],$_POST['temperaturamin'],$_POST['temperaturamax'],$_POST['tiempo'],
       $_POST['id_cultivo']);

       header("Location: http://localhost/proyecto_grado/croptech/vista/admon_cultivosBD.php?iderror=$resul");
       
    }
}

//Validamos que llegue el id_c del registro del cultivo a desactivar
if(isset($_GET['idc'])){
    $obj= new facade();
    $resul= $obj ->desactivar_registro_s($_GET['idc']);

    header("Location: http://localhost/proyecto_grado/croptech/vista/cultivo_desactivar.php?iderror=$resul");

}

//Validamos que vengan los datos ara agregar variables ambientales
if(isset($_POST['cultivo_edit']) && $_POST['cultivo_edit']=='ADDCONAMBIENT' ){
    if(isset($_POST['temperatura']) &&  isset($_POST['luminosidad']) && isset($_POST['humedad'])
    && isset($_POST['idSiembra'])){

       $obj=new facade();
       //$on= $_FILES['uploadedfile']['name'];
       //$resul= $_FILES[$on]['name'];

      
       $resul=$obj->add_condiciones_ambientales ($_POST['idSiembra'],$_POST['temperatura'],$_POST['luminosidad'],$_POST['humedad'],
                                                $_POST['centimetros'],$_POST['cantidad_hojas'],
                                                $_FILES['img_crop'],$_POST['comentarios']);
    
       header("Location: http://localhost/proyecto_grado/croptech/vista/cultivo-historial.php?iderror=$resul");
    }
}
//Validamos POST de atender agregar cultivo, generado por el admon
if(isset($_GET['idAccount'])){
    $obj= new facade();
    $resul= $obj->atender_agregar_cultivo($_GET['idAccount']);

}

//Validamos POST de atender agregar cultivo (No agregar), generado por el admon
if(isset($_GET['id_user']) && isset($_GET['ids'])){//ok
    $obj= new facade();
    $resul= $obj->informar_user($_GET['id_user'],$_GET['ids']);

    header("Location: http://localhost/proyecto_grado/croptech/vista/admon_cultivo.php?iderror=$resul");
}


}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";}
  ?>