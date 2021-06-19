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
    <title>Desactivar cultivo - Croptech </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../assets/css/estilos.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    </style>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />

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

            <!--La clase colapsa los elementos del nav-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link " aria-current="page" 
                    href="http://localhost/proyecto_grado/croptech/vista/user_inicio.php">Inicio</a> </li>
                    <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/vista/user_perfil.php">Perfil</a></li>
                    <li class="nav-item">
                    <a class="nav-link active" 
                    href="http://localhost/proyecto_grado/croptech/vista/cultivos-activos.php">Mis cultivos</a></li>
                    <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/vista/user_shops.php" >Proveedores</a></li>
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
                <h1 class="display-5 text-success text-shadow h1">Cultivo a desactivar</h1>
                <hr>
                <?php
                if(isset($_GET['idc'])){

                    require '../modelo/facade.php';
                    $idu=$_SESSION['usuario'];

                    $obj=new facade();
                    $datos=$obj-> read_registro_siembra($_GET['idc']);
                    ?>

        
                    <?php for($i=0;$i<1;$i++){?> 
                        <p class="lead">Nombre cultivo: <?php echo $name=$datos[$i]['nombre_cultivo']?> </p>
                        <p class="lead">Fecha de registro: <?php echo $datos[$i]['fecha_siembra']?> </p>
                        <p class="lead">Estado del cultivo: <?php echo $datos[$i]['estado']?> </p>
                    <?php } ?>

                    <hr>
                    <div  class=" m-5" > 
                        <div id="passwordHelpBlock" class="form-text">
                            ¿Deseas desactivar el cultivo?
                        </div>
                        <div class="pd-4">
                            <a href="http://localhost/proyecto_grado/croptech/controlador/validar_cultivos.php?idc=<?php echo $_GET['idc'];?>" 
                            class="btn btn-outline-danger">SI</a>
                            
                            <a href="http://localhost/proyecto_grado/croptech/vista/cultivo-historial.php" 
                            class="btn btn-outline-warning">NO</a>
                        </div>
                    </div>
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
    <hr>
 
    <!--SECCIÓN SEPARADOR-->
    <div class="p-3" id="separator-ribbon">
        <div class="bg-light">     
            <h4 class="text-center pb-3 pt-3"></h4></div>
        </div>
    </div>
    <!--FIN SECCIÓN SEPARADOR-->

    <?php require '../footer.php';?>

    <!--SECCIÓN COMPLEMENTOS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
        crossorigin="anonymous">
    </script>
    <!--FIN SECCIÓN COMPLEMENTOS BOOTSTRAP-->


    
</body>
</html>
<?php 
}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";
    } ?>    