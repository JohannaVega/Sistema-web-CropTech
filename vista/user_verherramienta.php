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
    <title>Tienda herramientas - CropTech</title>

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

       <!--TRAIGO LOS DATOS DE TIENDAS-->
       <?php 
            if(isset($_GET['idc'])){
                $id=$_SESSION['usuario']; //la varible int es un entero
                require '../modelo/facade.php';
                $fac=new facade();
                $resul=$fac->ver_tiendas_bycategoria($_GET['idc']);
        ?>
        <br>

        <div id="wrapper" class="toggled">
            <div class="container-lg pb-4 pt-4">
                <div class=" row">
                    <!--COLUMNA 1-->
                    <div class="col-auto">
                        <!--SIDERBAR-->
                        <div class="caja_trasera"> 
            
                            <div class="d-flex flex-column p-3 text-white" style="width: 280px;">
                                    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                                        <span class="fs-4">
                                            <h1>Categorias</h1>
                                        </span>
                                    </a>
                                    <hr>
                                    <ul class="nav nav-pills flex-column mb-auto">
                                        <li class="nav-item">
                                        <a href="http://localhost/proyecto_grado/croptech/vista/user_shops.php" class="nav-link text-white">
                                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                                            Cualquier categoria
                                        </a>
                                        </li>
                                        <li>
                                        <a href="http://localhost/proyecto_grado/croptech/vista/user_verplantas.php?idc=1" class="nav-link text-white">
                                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                                            Plantas
                                        </a>
                                        </li>
                                        <li>
                                        <a href="http://localhost/proyecto_grado/croptech/vista/user_versemilla.php?idc=2" class="nav-link text-white">
                                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                                            Semillas
                                        </a>
                                        </li>
                                        <li>
                                        <a href="http://localhost/proyecto_grado/croptech/vista/user_verinsumo.php?idc=3" class="nav-link text-white">
                                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                                            Insumos
                                        </a>
                                        </li>
                                        <li>
                                        <a href="http://localhost/proyecto_grado/croptech/vista/user_verherramienta.php?idc=4" class="nav-link active">
                                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                                            Herramientas
                                        </a>
                                        </li>
                                    </ul>
                                    <hr>
                            </div>
                        </div>
                        <!--FIN SIDERBAR-->
                    </div>
                    <!--FIN COLUMNA 1-->

                    <!--COLUMNA 2-->
                    <div class="col p-5 text-center bg-light border border-success">
                        <!-- Page Content -->
                        <div id="page-content-wrapper">
                            <div class="container-fluid">
                                <h1>Tiendas categoría herramientas</h1>
                                <hr>
                                <?php   
                                for($i=0;$i<count($resul);$i++)
                                {
                                ?>  
                                    <!--FILA 1.1-->
                                    <div class=" row">
                                        <!--COLUMNA 1.1.-->
                                        <div class="col-auto">
                                            
                                            <label for="nombre">
                                                Nombre establecimiento:
                                            </label>
                                            <a class="lead" 
                                            href="http://localhost/proyecto_grado/croptech/vista/user_vertienda.php?idp=<?php echo $resul[$i]['id_proveedor']; ?>" 
                                            tittle="Ver más">
                                                <?php echo $name=$resul[$i]['nombre_establecimiento']?> </a>
                                            <div id="passwordHelpBlock" class="form-text ">
                                                <?php echo $resul[$i]['descripcion_tienda']; ?>
                                            </div>

                                            <hr>
                                        </div>
                                    </div>
                                <?php          
                                }
                                ?>

                                
                                
                            </div>
                        </div> <!-- /#page-content-wrapper -->
                    </div>
                    <!--FIN COLUMNA 2-->

                </div>
            </div>
        </div> <!-- /#wrapper -->

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