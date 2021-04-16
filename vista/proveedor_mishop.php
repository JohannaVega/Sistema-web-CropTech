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
    <title>Mis tiendas - CropTech</title>

    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    </style>

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
                        href="http://localhost/proyecto_grado/croptech/vista/proveedor_inicio.php">Inicio</a> </li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" 
                        href="http://localhost/proyecto_grado/croptech/vista/proveedor_registrar.php">Registrar tienda</a> </li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" 
                        href="http://localhost/proyecto_grado/croptech/vista/proveedor_mishop.php">Tu tienda</a> </li>
                    </ul>
                <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
                        <a href="http://localhost/proyecto_grado/croptech/controlador/cerrar_sesion.php" 
                        class="btn btn btn-dark" style="float: right;">Cerrar sesión</a>
                </form>

                 </div>
            </div>
        </nav>
        <!--FIN NAVBAR-->

        <!--TRAIGO LOS DATOS DE USUARIO-->
        <?php 
            require '../modelo/facade.php';
            $fac=new facade();
            $resul=$fac->read_tiendas_user($_SESSION['usuario']);
        ?>
        <br>

        <!--CONTEINER CONTENIDO-->
        <div class="container-lg pb-4 pt-4">
            <div class="m-1 row justify-content-center pb-4">
                <!--SECCIÓN CAJA TRASERA-->
                <div class="col ">
                    <div class="caja_trasera-shop"> 
                        <div>
                            <h1 id="name" class="text-white text-shadow" >CropTech</h1>
                            <hr>
                            <br>
                            <h3 class="text-black text-shadow">¡Tu tienda!</h3>
                            <p class="text-black text-shadow">En esta sección puedes ver y administrar la 
                            información de tus tiendas registradas.
                            </p>
                        </div>
                    </div>
                </div>
                 <!--FIN SECCIÓN CAJA TRASERA-->
            </div>
            
            <div id="error" class="m-1 row justify-content-center">
                <!--SECCIÓN ERROR-->
                <div class="col-auto">
                    <?php
                    if(isset($_GET['iderror'])){
                        if($_GET['iderror'] == 'ok'){
                    ?>
                        <script>
                            alert("Datos de tienda editados correctamente"); 
                        </script>
                        <p  style="color:green;" >Datos de tienda editados correctamente</p>
                    <?php } 
                        else if ($_GET['iderror'] == 'bad'){
                            ?>
                            <script>
                                alert("Error al editar datos, intentelo más tarde"); 
                            </script>
                            <p  style="color:red;" >Error al editar datos, intentelo más tarde</p>
                    <?php }
                        else if ($_GET['iderror'] == 'void'){
                            ?>
                            <script>
                                alert("Error! .. El único campo que se admite vacio es: dirección web, los demás deben diligenciarse"); 
                            </script>
                            <p  style="color:red;" >Error! .. El único campo que se admite vacio es: dirección web, los demás deben diligencarse</p>
                    <?php }
                       
                    } ?>
                </div>
            </div>
            <!--FIN SECCIÓN ERROR-->
            <hr>

            <!--VERIFICO QUE USUARIO TENGA TIENDA REGISTRADA-->
            <!--SI LA CONSULTA ES VACIA ENVIAMOS AL USUARIO A REGISTRAR TIENDA-->
            <?php
            if(count($resul)==0){
            ?>
                <!--COLUMNA 1-->
                <div class="col-auto p-5  bg-light border border-success">
                    <div class="jumbotron">
                        <div id= "contenedor-name">
                            <h1 id="name" class="text-black text-center" >¡Aún no tienes tu tienda registrada!</h1>
                            <div class="text-black text-center">
                                <label >¿Qué esperas? Registrala.</label>
                            </div>
                            <hr>
                        </div>
                        <br>
                    </div>

                    <!--CONTENEDOR CARDS-->
                    <div id="cards">
                        <!--FILA 2-->
                        <div class="row justify-content-md-center">
                            <!--COLUMNA 2.1-->
                            <div class="col-4 ">
                                <div class="card w-100 card-border mb-5">
                                        <img src="../assets/img/categoria.jpg" class="card-img-top" width="100" height="200"
                                        alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Registrar mi tienda</h5>
                                            <p class="card-text">Para iniciar el proceso de registro de tu tienda.
                                            <br>
                                            Seleciona la opción "Registrar tienda"
                                            </p>
                                            <a href="http://localhost/proyecto_grado/croptech/vista/proveedor_registrar.php" 
                                            class="btn btn-outline-success">Registrar tienda</a>
                                        </div>
                                </div>
                            </div>
                            <!--FIN COLUMNA 2.1-->
                            <!--COLUMNA 2.2-->
                            <div class="col-4 ">
                                <div class="card w-100 card-border mb-5">
                                    <img src="../assets/img/ver_tiendas.png" class="card-img-top" width="100" height="200"
                                     alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Ver otros proveedores</h5>
                                        <p class="card-text">Si deseas ver la información de otros proveedores
                                        registrados.
                                        <br>
                                        Seleciona la opción "Ver"
                                        </p>
                                        <a href="http://localhost/proyecto_grado/croptech/vista/proveedor_ver.php" 
                                        class="btn btn-outline-success">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN FILA 2-->
                    </div>
                    <!--FIN CONTENEDOR CARDS-->

                </div>
                <!--FIN COLUMNA 1-->

            <!--VERIFICO QUE USUARIO TENGA TIENDA REGISTRADA-->
            <!--SI LA CONSULTA NO ES VACIA MOSTRAMOS DATOS DE TIENDA-->
            <?php
            }else{
            ?>
                <div class="col-auto p-5  bg-light border border-success">
                    <div class="jumbotron">
                        <div id= "contenedor-name">
                            <h1 id="name" class="text-black text-center" >Tu tienda</h1>
                            
                            <hr>
                        </div>

                        <br>
                        <?php for($i=0;$i<1;$i++){?> 
                            <label class="pb-2"> Nombre establecimiento:</label>   
                            <p class="lead"><?php echo $name=$resul[$i]['nombre_establecimiento']?> </p>
                            <label class="pb-2"> Dirección física:</label>   
                            <p class="lead"><?php echo $resul[$i]['direccion_fisica']?> </p>
                            <label class="pb-2"> Dirección web:</label>  
                            <p class="lead">
                            <a href="<?php echo $resul[$i]['direccion_web']?>"><?php echo $resul[$i]['direccion_web']?></a>
                            </p>
                            <label class="pb-2"> Descripción:</label>  
                            <p class="lead"><?php echo $resul[$i]['descripcion_tienda']?> </p>
                            <?php
                            }
                            ?>
                            <br>
                            <div class="pd-4 text-center">
                                <a href="http://localhost/proyecto_grado/croptech/vista/proveedor_edit.php" 
                                class="btn btn-success">EDITAR DATOS</a>
                            </div>
                        <hr>
                        <div class="row justify-content-md-center">
                            <div class="col-4 ">
                                <div class="p-3 text-center border border-secondary">
                                    <h1 id="name" class="text-dark text-shadow">Teléfonos contacto</h1>
                                </div>
                                <div id="passwordHelpBlock" class="form-text text-center">
                                    A continuación visualizarás los teléfonos de contacto de
                                    la tienda.
                                </div>
                                <div class="p-3 text-center">
                                    <?php $cant_telefonos=count($resul);
                                        for($i=0;$i<count($resul);$i++){?>
                                            <label class="pb-2"> Teléfono <?php echo $i+1 ?>:</label>    
                                            <p class="lead">
                                            <?php echo $resul[$i]['telefono_usuario']?> 
                                            </p>
                                                
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-4 m-5 bg-success ">
                                <br><br>
                                <div  id="passwordHelpBlock" class=" pt-3 text-white text-center">
                                    Si desea actualizar el número de telefono registrado , <br>
                                    Dirigase a la sección de inicio en donde dispone de la opción 
                                    para hacerlo.
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <!--FIN COLUMNA 1-->

                <hr>
                <br>

                <!--CONTENEDOR CARDS-->
                <div>
                    <!--FILA 1-->
                    <div class="row justify-content-md-center">
                        <div class="col-4 ">
                            <div class="card w-100 card-border mb-5">
                                    <img src="../assets/img/categoria.jpg" class="card-img-top" width="100" height="200"
                                    alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Agregar categoria de mi tienda</h5>
                                        <p class="card-text">Para que nuestros usuarios puedan ver tu tienda
                                        de acuerdo a categorias especificas a la hora de buscar proveedores.
                                        <br>
                                        Seleciona la opción "Añadir categoria"
                                        </p>
                                        <a href="http://localhost/proyecto_grado/croptech/vista/proveedor_addcat.php?us=<?php echo $resul[0]['id_usuario']; ?>" 
                                        class="btn btn-outline-success">Añadir categoria</a>
                                    </div>
                            </div>
                        </div>
                        <div class="col-4 ">
                            <div class="card w-100 card-border mb-5">
                                    <img src="../assets/img/ver_tiendas.png" class="card-img-top" width="100" height="200"
                                    alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Ver otros proveedores</h5>
                                        <p class="card-text">Si deseas ver la información de otros proveedores
                                        registrados.
                                        <br>
                                        Seleciona la opción "Ver"
                                        </p>
                                        <a href="http://localhost/proyecto_grado/croptech/vista/proveedor_ver.php" 
                                        class="btn btn-outline-success">Ver</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--FIN FILA 1-->
                </div>
                <!--FIN CONTENEDOR CARDS-->

            <?php
            }
            ?>

        </div>
        <!--FIN CONTEINER CONTENIDO-->

        <hr>
        <!--CONTEINER SEPARADOR RIBBON-->
        <div class="p-3" id="separator-ribbon">
            <div class="bg-light">     
                <h4 class="text-center pb-3 pt-3"></h4>
             </div>
        </div>
        <!--FIN CONTEINER SEPARADOR RIBBON-->

        <?php  require "../footer.php"; ?>

        <!--COMPLEMENTOS BOOTSTRAP-->
        <script src="../assets/js/validaciones_form.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
            integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
            crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
            integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
            crossorigin="anonymous">
        </script>
        <!--FIN COMPLEMENTOS BOOTSTRAP-->
    
</body>
</html>

<?php
 } else {
  echo "<script type='text/javascript'>
  alert('ERROR!! al iniciar sesion');
  window.location='../index.php';
  </script>";
  }
?>