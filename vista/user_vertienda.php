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
    <title>Ver tienda - CropTech</title>

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
                    href="http://localhost/proyecto_grado/croptech/vista/user_inicio.php">Inicio</a> </li>
                    <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/vista/user_perfil.php">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/vista/cultivos-activos.php" >Mis cultivos</a></li>
                    <li class="nav-item"><a class="nav-link active" 
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

        
        <?php 
        if(isset($_GET['idp'])){
            require '../modelo/facade.php';
            /*--  TRAIGO LOS DATOS DE TIENDA  --*/
            $fac=new facade();
            $resul=$fac->ver_tienda_byidp($_GET['idp']);
            /*--  TRAIGO CATEGORIA DE PRODUCTOS DE LA TIENDA  --*/
            $obj2=new facade();
            $categorias=$obj2->categorias_productos($_GET['idp']);
        ?>
        <br>

         <!--CONTEINER CONTENIDO-->
         <div class="container-lg pb-4 pt-4">
             <!--FILA 1-->
            <div class="m-1 row justify-content-center pb-4">
                <!--SECCIÓN CAJA TRASERA-->
                <div class="col ">
                    <div class="caja_trasera-shop"> 
                        <div>
                            <h1 id="name" class="text-white text-shadow" >CropTech</h1>
                            <hr>
                            <br>
                            <h3 class="text-black text-shadow">Tienda: <?php echo $resul[0]['nombre_establecimiento'] ?></h3>
                            <p class="text-black text-shadow">En esta sección puedes ver la información completa de 
                                la tienda que acabas de seleccionar.
                                <br> 
                                Si deseas contactarte con este proveedor aquí dispones de 
                                los datos de contacto.
                            </p>
                        </div>
                    </div>
                </div>
                 <!--FIN SECCIÓN CAJA TRASERA-->
            </div>

            <!--FIN FILA 1-->
             <div class="m-1 row justify-content-center">
                <!--COLUMNA 1-->
                <div class="col-auto p-5  bg-light border border-success">
                    <div class="jumbotron">
                        <div id= "contenedor-name">
                            <h1 id="name" class="text-black text-center text-shadow" >Datos tienda</h1>
                            
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
                        <hr>
                        <div class="row justify-content-md-center">
                            
                            <div class="col-4 ">
                                <div class="p-3 text-center border border-secondary">
                                    <div id= "contenedor-name">
                                        <h1 id="name" class="text-dark text-shadow">Teléfonos contacto</h1>
                                    </div>
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

                            <div class="col-4 ">
                                <div class="p-3 text-center border border-secondary">
                                        <div id= "contenedor-name">
                                            <h1 id="name" class="text-dark text-shadow">Categoría productos</h1>
                                        </div>
                                </div>
                                <div id="passwordHelpBlock" class="form-text text-center">
                                   A continuación visualizarás las categorías en que se clasifican los productos que ofrece
                                   la tienda.
                                </div>
                                <div class="p-3 text-center">
                                    <?php 
                                    
                                    $cant_cat=count($categorias);
                                        if($cant_cat>0){
                                            for($i=0;$i<count($categorias);$i++){?>
                                                <label class="pb-2"> Categoría <?php echo $i+1 ?>:</label>    
                                                    <p class="lead">
                                                    <?php echo $categorias[$i]['name_categoria']?> 
                                                    </p>
                                                
                                            <?php
                                            }
                                        }else{
                                            ?>


                                        <?php
                                        }
                                        ?>
                                </div>
                            </div>

                            <br>
                            <div class="form-row row justify-content-center m-3">
                                <div class="form-group text-center col-md-12">
                                    <a href="http://localhost/proyecto_grado/croptech/vista/user_shops.php" 
                                    class="btn btn-outline-dark btn-lg"> Volver a tiendas</a>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <!--FIN COLUMNA 1-->
            </div>
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
        <?php
        }else{
            echo "<script type='text/javascript'>
            alert('ERROR! Al visualizar datos,por favor intentelo más tarde');
            window.location='user_shops.php';
            </script>";
        }
        ?>

    
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