<?php
session_start();
if($_SESSION['usuario']){
    require '../modelo/facade.php';

    //Validamos que hayan llegado los valores correctamente por el metodo POST
    //Y procedemos a instanciar el obj facade para iagregar cultivo nuevo
if(isset($_POST['user_c']) && $_POST['user_c']=='CREAR_C' ){
    if(isset($_POST['cnombre']) &&  isset($_POST['fecha_registro']) && isset($_POST['idu'])
    && isset($_POST['estado'])){
       $obj=new facade();
       $resul=$obj->addcultivo($_POST['idu'],$_POST['cnombre'],$_POST['fecha_registro'],$_POST['estado']);

      if($resul=="ok")
       header("Location: http://localhost/proyecto_grado/croptech/vista/cultivo-agregar.php?iderror=ok");
       else
       header("Location: http://localhost/proyecto_grado/croptech/vista/cultivo-agregar.php?iderror=bad");
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

}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";}
  ?>