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
    <title>Editar cultivo - CropTech</title>
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
                <li class="nav-item"><a class="nav-link " 
                    href="http://localhost/proyecto_grado/croptech/vista/admon_usuarios.php">Adminstrar usuarios</a></li>
                <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/vista/admon_cultivo.php">Control cultivos</a></li>
                <li class="nav-item"><a class="nav-link active " 
                    href="http://localhost/proyecto_grado/croptech/vista/admon_cultivosBD.php">Listar cultivos</a></li>
            </ul>

            <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
                <a href="http://localhost/proyecto_grado/croptech/controlador/cerrar_sesion.php" 
                class="btn btn btn-dark" style="float: right;">Cerrar sesión</a>
            </form>
        </div>
    </div>
</nav>
<!--FIN NAVBAR-->
<?php
if(isset($_GET['idCrop'])){

    //TRAIGO LOS DATOS DE TIENDAS
    $id=$_SESSION['usuario']; 
    require '../modelo/facade.php';

    $fac1=new facade();
    $resul= $fac1->read_cultivo_byid($_GET['idCrop']);
    ?>


    <div class="container-lg pb-4 pt-4 "> 
    <!--FILA 1-->
    <div class="m-1 row justify-content-center">
        <!--COLUMNA 1-->
        <div class="col-8 p-5 text-center bg-light border border-success"> 
            <div class="jumbotron">
                <h1 class="display-5 text-success text-shadow h1">Editar datos de cultivo</h1>
                <hr>

                <form action="../controlador/validar_cultivos.php" method="post">
                    <h6 class="text-left h1" >Información del cultivo:</h6>
                    <div class="form-row row justify-content-center p-2">
                    
                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group col-md-6">
                                <p class="lead">Nombre del cultivo: <?php echo $resul[0]['nombre_cultivo']; ?> </p>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group col-md-6">
                                <p>Porcentaje de la humedad relativa ambiental min (%):</p>
                                <input type="number" id="humedadmin" class="form-control" name="humedadmin" step="any" 
                                placeholder="Ejemplo: 5.03" value='<?php echo $resul[0]['humedad_optima_min'];?>' requiered>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group col-md-6">
                                <p>Porcentaje de la humedad relativa ambiental max (%):</p>
                                <input type="number" id="humedadmax" class="form-control" name="humedadmax" step="any" 
                                placeholder="Ejemplo: 5.03" value='<?php echo $resul[0]['humedad_optima_max'];?>' requiered>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group col-md-6">
                                <p>Cantidad de horas luz diarias min (horas):</p>
                                <input type="number" id="luzmin" class="form-control" name="luzmin" 
                                placeholder="Ejemplo: 10" value='<?php echo $resul[0]['horas_luz_min'];?>' requiered>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group col-md-6">
                                <p>Cantidad de horas luz diarias max (horas):</p>
                                <input type="number" id="luzmax" class="form-control" name="luzmax"
                                placeholder="Ejemplo: 10" value='<?php echo $resul[0]['horas_luz_max'];?>' requiered>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group col-md-6">
                                <p>Nivel de temperatura ambiental min (grados Celsius (°C)):</p>
                                <input type="number" id="temperaturamin" class="form-control" name="temperaturamin" step="any" 
                                placeholder="Ejemplo: 16.5" value='<?php echo $resul[0]['temperatura_optima_min'];?>' requiered>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group col-md-6">
                                <p>Nivel de temperatura ambiental max (grados Celsius (°C)):</p>
                                <input type="number" id="temperaturamax" class="form-control" name="temperaturamax" step="any" 
                                placeholder="Ejemplo: 16.5" value='<?php echo $resul[0]['temperatura_optima_max'];?>' requiered>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group col-md-6">
                                <p>Tiempo de siembra (meses):</p>
                                <input type="number" id="tiempo" class="form-control" name="tiempo" 
                                placeholder="Ejemplo: 3" value='<?php echo $resul[0]['tiempo_siembra'];?>' requiered>
                            </div>
                        </div>
                    
                        <input type="hidden" name="id_cultivo" value='<?php echo $_GET['idCrop']; ?>'>

                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group col-md-8">
                                <button type="submit" value="EDIT_C" name="admon_c" class="btn btn-outline-secondary btn-lg" 
                                onclick="return validarInsertC();">Actualizar cultivo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
        <!--FIN COLUMNA 1-->

        <!--SECCIÓN CAJA TRASERA-->
        <div class="col ">
            <div class="caja_trasera"> 
                <div>
                    <h1 id="name" class="text-center text-white text-shadow">CropTech - Cultivo</h1>
                    <hr>
                    <br>
                    <h3 class="pt-5">Hola, </h3>
                    <p >En esta sección puedes editar los datos ambientales de los cultivos que asi lo requieran</p>
                <div>
            </div>
        </div>
        <!--FIN SECCIÓN CAJA TRASERA-->
    </div>
    <!--FIN FILA 1-->

</div>
    


<?php
}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! en el envio de datos');
    window.location='admon_cultivosBD.php';
    </script>";
}
?>
<hr>
<!--SECCIÓN SEPARADOR RIBON-->
<div class="p-3" id="separator-ribbon">
    <div class="bg-light">     
        <h4 class="text-center pb-3 pt-3"></h4></div>
    </div>
</div>
<!--FIN SECCIÓN SEPARADOR RIBON-->

<script src="../js/validaciones_form.js"></script>

<?php require '../footer.php';?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
    integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
    crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
    integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
    crossorigin="anonymous">
</script>
    
</body>
</html>

<?php }else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";
    }?>       