<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cultivos - croptech</title>
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
                    <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/vista/admon_usuarios.php">Adminstrar usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/vista/admon_cultivo.php">Control cultivos</a></li>
                    <li class="nav-item"><a class="nav-link active" 
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

    <?php require '../modelo/facade.php';
        $obj=new facade();
        $resul=$obj->read_all_cultivos();
    ?>
    <br>
    <div class="container"> 
        <!--FILA 1-->
        <div class="m-1 row justify-content-center">
            <div class="col-auto p-5 text-center bg-light border border-success">
                <h3 class="display-5 text-success text-shadow h1">Lista de cultivos</h3>
                <hr>
                
                <br>
                <br>
                
                <div  id="error">
                    <?php 
                    if(isset($_GET['iderror']))
                    {
                        if($_GET['iderror'] == 'ok'){
                        ?>
                            <p style="color:green;" >Cultivo actualizado correctamente</p>
                        <?php
                        }else if($_GET['iderror'] == 'bad'){
                        ?>
                            <p style="color:red;" >Error en el sistema, vuelva a intentarlo más tarde</p>
                        <?php
                        }
                        //echo !extension_loaded('openssl')?"Not Available":"Available"; 
                    }
                    ?>
                </div>
                
                <div class="table-responsive">
            
                    <table id="tmedicos" class="table table-bordered table-success">
                        <thead>
                            <tr class="text-success">
                            <th scope="col">Nombre cultivo</th>
                            <th scope="col">Horas luz min (Día)</th>
                            <th scope="col">Horas luz max (Día)</th>
                            <th scope="col">Humedad relativa min (%)</th>
                            <th scope="col">Humedad relativa max (%)</th>
                            <th scope="col">Temperatura optima min (C°)</th>
                            <th scope="col">Temperatura optima max (C°)</th>
                            <th scope="col">Tiempo de siembra (Meses)</th>
                           
                            <th scope="col"></th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0;$i<count($resul);$i++){
                                ?>
                                <tr>
                                    <td><?php echo $resul[$i]['nombre_cultivo'];?></td>
                                    <td><?php echo $resul[$i]['horas_luz_min'];?></td>
                                    <td><?php echo $resul[$i]['horas_luz_max'];?></td>
                                    <td><?php echo $resul[$i]['humedad_optima_min'];?></td>
                                    <td><?php echo $resul[$i]['humedad_optima_max'];?></td>
                                    <td><?php echo $resul[$i]['temperatura_optima_min'];?></td>
                                    <td><?php echo $resul[$i]['temperatura_optima_max'];?></td>
                                    <td><?php echo $resul[$i]['tiempo_siembra'];?></td>

                                    <!--editar datos-->
                                    <td> <a href="http://localhost/proyecto_grado/croptech/vista/admon_editCrop.php?idCrop=<?php echo $resul[$i]['id_cultivo'];?>"
                                    class="btn btn-outline-success">
                                    EDITAR</a></td>
                            
                            <?php } ?>
                            </tr>
                        
                        </tbody>
                    </table>
            
                <br><br>
                </div>
                <div class="jumbotron bg-transparent">
                    </div>

            </div> 
        </div>
        <!--FIN FILA 1-->
    </div>

    <hr>
    <!--SECCIÓN SEPARADOR RIBON-->
    <div class="p-3" id="separator-ribbon">
        <div class="bg-light">     
            <h4 class="text-center pb-3 pt-3"></h4></div>
        </div>
    </div>
    <!--FIN SECCIÓN SEPARADOR RIBON-->

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