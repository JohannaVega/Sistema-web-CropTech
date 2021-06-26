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
    <title>Visualizar datos - CropTech</title>

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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link " aria-current="page" 
                    href="http://localhost/proyecto_grado/croptech/vista/user_inicio.php">Inicio</a> </li>
                    <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/vista/user_perfil.php">Perfil</a></li>
                    <li class="nav-item">
                    <a class="nav-link active" 
                    href="http://localhost/proyecto_grado/croptech/vista/cultivo-activos.php">Mis cultivos</a></li>
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

<br>
<?php
if(isset($_GET['idSiembra']))
{
    require '../modelo/facade.php';
    $idu=$_SESSION['usuario'];
    $id_siembra = $_GET['idSiembra'];

    $obj=new facade();
    $exist=$obj->validar_exist_registro($id_siembra);
    ?>

    <div class="container bg-light ">
    <?php
    if($exist == 1){
        $obj1=new facade();
        $datos_actuales=$obj1-> read_registro_siembra_id($id_siembra);
        ?>


        <!--FILA CARDS-->
        <br>
        <div class="m-3 row">
            <?php 
            for($i=0; $i<1; $i++){
                ?>
            
                <!--SECCION CARD-->
                <div class="col-md-4"> 
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Humedad (%)
                        </div>
                            <div class="card-body">
                                <h5 class="h1 card-title"><?php echo $datos_actuales[$i]['cantidad_humedad']; ?></span> </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header">Temperatura (°C)
                        </div>
                            <div class="card-body">
                                <h5 class="h1 card-title"><?php echo $datos_actuales[$i]['nivel_temperatura']; ?></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Cantida Luz por día (Horas)
                        </div>
                            <div class="card-body">
                                <h5 class="h1 card-title"> <?php echo $datos_actuales[$i]['cantidad_luminosidad']; ?> </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                    </div>

                </div>
                <!--FIN SECCION CARD-->
            <?php
            }
            ?>
        </div>
        <!--FIN FILA CARDS-->

        <!--CONTEINER SECCION GRAFICAS-->
        <div class=" m-2 container-lg border bg-gradient-light text-dark"> 
            
                <!--FILA-->
                <div class="form-row row align-items-center p-2 " >
                
                    <div class="col-9 p-5 text-center  border border-secondary ">
                        <form action="../controlador/validar_cultivos.php" method="post">
                            <div class="form-row row justify-content-md-center p-2">
                                <div class="form-group col ">
                                    <p>Fecha inicio:</p>
                                    <input type="date" id="fecha_inicio" class="form-control" name="fecha_inicio" required>
                                </div>

                                <div class="form-group col ">
                                    <p>Fecha fin:</p>
                                    <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" required>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="id_siembra" value='<?php echo $id_siembra; ?>' required>
                            
                            <div class="form-row row justify-content-md-center p-2">
                                <div class="form-group col ">
                                    <button type="submit" value="TEMP" name="ver_datos" class="btn btn-info">
                                    Graficar Temperatura</button>
                                </div>
                                <div class="form-group col">
                                    <button type="submit" value="HUM" name="ver_datos" class="btn btn-info">
                                    Graficar Humedad</button>
                                </div>
                                <div class="form-group col ">
                                    <button type="submit" value="LUZ" name="ver_datos" class="btn btn-info">
                                    Graficar Luminosidad</button>
                                </div>
                            </div>
                        </form>


                        <div class="form-row row justify-content-md-center p-2">
                            <div class="col-auto"> 
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Humedad (%)
                                    </div>
                                        <div class="card-body">
                                            <h5 class="h1 card-title"> <span id="humedad">56643</span> </h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                        <div class="col p-1 text-center bg-gradient-light">
                            <div class="col-auto"> 
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Humedad (%)
                                    </div>
                                        <div class="card-body">
                                            <h5 class="h1 card-title"> <span id="humedad">055</span> </h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!--FIN FILA-->
        </div>
        <!--CONTEINER SECCION GRAFICAS-->

        <div class="container bg-light ">
            <div class="form-row row justify-content-around p-2">
                <div class="col-auto"> 
                    <div class="card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Humedad (%)
                        </div>
                            <div class="card-body">
                                <h5 class="h1 card-title"> <span id="humedad">055</span> </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                    </div>
                </div>

                <div class="col-auto"> 
                    <div class="card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Humedad (%)
                        </div>
                            <div class="card-body">
                                <h5 class="h1 card-title"> <span id="humedad">055</span> </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="m-3 row justify-content-center">
                                    <a href="#" class="btn btn-primary">Button</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--FILA GRAFICAS-->
        <div class="row my-3">
            <div class="col-md-12 text-center">
                <h2>Reporte de ventas</h2>
                <canvas id="idGrafica" class="grafica"></canvas>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12 text-center">
                <h2>Reporte de ventas</h2>
                <canvas id="idContTabla"></canvas>
            </div>
        </div>
        <!--FIN FILA GRAFICAS-->
        <?php
    }else
    {
    ?>
    <div class="m-5 container">
    <br>
    <br>
        <div class="  row justify-content-center">
            <h1>¡Aún no has ingresado información de la variables de tu cultivo!</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-auto text-center">
                <img src="http://localhost/proyecto_grado/croptech/assets/img/huert.gif" alt="Heyy"  height="200px" width="200px"></a>
            </div>
        </div>
        <br>
        <br>
    </div>

    <?php
    }
    ?>
    </div>

<?php
}else
{
    echo "<script type='text/javascript'>
    alert('ERROR!! En el envio de datos');
    window.history.go(-1);
    </script>";
}
?>
    
<div class="p-3" id="separator-ribbon">
    <div class="bg-light">     
        <h4 class="text-center pb-3 pt-3"></h4>
    </div>
</div>


<?php require '../footer.php';?>

<!--COMPLEMENTOS BOOSTRAP-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
    integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
    crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
    integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
    crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!--FIN COMPLEMENTOS BOOSTRAP-->
</body>
</html>
<?php 
}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";
} ?>  