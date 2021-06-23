<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atender solicitud - Croptech</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    </style>

    <link rel="stylesheet" href="../assets/css/estilos.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
    crossorigin="anonymous">
</head>
<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"> 
                    <img src="../assets/img/logo.png" alt="" width="100">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" 
                    href="http://localhost/proyecto_grado/croptech/vista/admon_inicio.php">Inicio</a> </li>
                    <li class="nav-item"><a class="nav-link active " 
                    href="http://localhost/proyecto_grado/croptech/vista/admon_usuarios.php">Adminstrar usuarios</a></li>
                    <li class="nav-item"><a class="nav-link " 
                    href="#">Control cultivos</a></li>
                </ul>

                <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
                    <a href="http://localhost/proyecto_grado/croptech/controlador/cerrar_sesion.php" 
                    class="btn btn btn-dark" style="float: right;">Cerrar sesión</a>
                </form>
            </div>
        </div>
    </nav>
    <!--FIN NAVBAR-->

    <!--SECCIÓN CONTENIDO-->
    <div class="container-lg pb-4 pt-4">
        <!--FILA 1-->
        <div class="m-1 row justify-content-center">
            <!--COLUMNA 1-->
            <div class="col-auto p-5 text-center bg-light border border-success">
                <h1 class="display-5 text-success text-shadow h1">Solicitud a atender</h1>
                <hr>
                <?php
                if(isset($_GET['ids'])){

                    require '../modelo/facade.php';
                   
                    $obj=new facade();
                    $datos=$obj-> leer_solicitud_atender($_GET['ids']);
                    ?>

        
                    <?php for($i=0;$i<1;$i++){
                        if( $datos[$i]['id_tipo_solicitud'] == 1 ){
                            ?> 
                            <p class="lead">Id tipo de solicitud: <?php echo $datos[$i]['id_tipo_solicitud']; ?> </p>
                            <p class="lead">Detalle de solicitud: <?php echo $datos[$i]['detalle_solicitud']; ?> </p>
                            <p class="lead">Id usuario: <?php echo $user=$datos[$i]['id_usuario']; ?> </p>
                            <p class="lead">Fecha de solicitud: <?php echo $datos[$i]['fecha_solicitud']; ?> </p>
                            <p class="lead">Estado de solicitud: <?php echo $datos[$i]['estado']; ?> </p>

                            <hr>
                            <div  class=" m-5" > 
                                <div class="pd-4">
                                    <a href="http://localhost/proyecto_grado/croptech/controlador/validar_updates.php?idu=<?php echo $user; ?>&ids=<?php $datos[$i]['id_solicitud_admon']; ?>" 
                                    class="btn btn-outline-danger">DESACTIVAR</a>
                                </div>
                            </div>
                            <?php 
                        } else if( $datos[$i]['id_tipo_solicitud'] == 2 ){
                            ?>
                            <p class="lead">Id tipo de solicitud: <?php echo $datos[$i]['id_tipo_solicitud']?> </p>
                            <p class="lead">Detalle de solicitud: <?php echo $nombre =$datos[$i]['detalle_solicitud']?> </p>
                            <p class="lead">Id usuario: <?php echo $user=$datos[$i]['id_usuario']?> </p>
                            <p class="lead">Fecha de solicitud: <?php echo $datos[$i]['fecha_solicitud']?> </p>
                            <p class="lead">Estado de solicitud: <?php echo $datos[$i]['estado']?> </p>

                            <hr>
                            <div  class=" m-5" > 
                                <div id="passwordHelpBlock" class="form-text">
                                    ¿Deseas agregar el cultivo?
                                </div>
                                <div class="pd-4">
                                    <a 
                                    href="http://localhost/proyecto_grado/croptech/vista/admon_add_crop.php?idAccount=<?php echo $user; ?>&idc=<?php echo $nombre; ?>" 
                                    class="btn btn-outline-danger">SI</a>
                                    
                                    <a href="http://localhost/proyecto_grado/croptech/vista/admon_cultivo.php" 
                                    class="btn btn-outline-warning">NO</a>
                                </div>
                            </div>

                         <?php
                        }
                        ?>
                        
                    <?php } ?>

                    
                    <!--SECCION DE ERROR-->
                    <?php
                    }else if(isset($_GET['iderror'])){
                        ?>
                        <?php
                        if(isset($_GET['iderror']) ){
                            if( $_GET['iderror']=='bad'){
                                ?>
                                <p  style="color:red;" >Error al desactivar cultivo, intentalo más tarde</p>
                                <?php
                            }else{
                                ?>
                                <p  style="color:green;" >Cultivo desactivado correctamente</p>
                                <div class="pd-4">
                                    <a href="http://localhost/proyecto_grado/croptech/vista/cultivo-historial.php" 
                                    class="btn btn-outline-success">Ir a mis cultivos</a>
                                </div>
                                <?php
                            }
                        }
                    }
                    else{
                        echo "<script type='text/javascript'>
                        alert('ERROR!! En el envio de datos, intentalo más tarde');
                        window.location='cultivo-historial.php';
                        </script>";
                 
                    }
                    ?>
                    <!--FIN SECCION DE ERROR-->
            </div>
            <!--FIN COLUMNA 1-->

            <!--SECCIÓN CAJA TRASERA-->
            <div class="col ">
                <div class="caja_trasera"> 
                    <div>
                        <h1 id="name" class="text-center text-white text-shadow">CropTech - Cultivo</h1>
                        <hr>
                        <br>
                        <h3  class="pt-5">Hola, </h3>
                        <p >En esta sección puedes desactivar cultivos que ya dieron cosecha, de esta 
                            manera nos permitirás gestionar tus cultivos, generando un análisis de los datos 
                            obtenidos durante la siembra.</p>
                    </div>
                </div>
            </div>
            <!--FIN SECCIÓN CAJA TRASERA-->
        </div>
        <!--FIN FILA 1-->
    </div>
    
    <!--FIN SECCIÓN CONTENIDO-->
    
</body>
</html>
<?php 
}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";
}?>       