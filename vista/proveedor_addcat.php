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
    <title>Categoria shop - CropTech</title>

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
                        <li class="nav-item"><a class="nav-link " aria-current="page" 
                        href="http://localhost/proyecto_grado/croptech/vista/proveedor_inicio.php">Inicio</a> </li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" 
                        href="http://localhost/proyecto_grado/croptech/vista/proveedor_registrar.php">Registrar tienda</a> </li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" 
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

        <?php
            $idu=$_SESSION['usuario'];
            require '../modelo/facade.php';
            $fac=new facade();
            $resul=$fac->ver_categorias();
        ?>

        <!--SECCIÓN CONTENIDO-->
        <div class="container-lg pb-4 pt-4">
            <div class="m-1 row ">
                <div class="col-auto p-5 bg-light border border-success"> 
                    <div class="jumbotron">
                        <h4 class="display-5 text-success text-shadow h1">Añade categoría de tu tienda</h4>
                        <hr>

                         <!--SECCIÓN ERROR-->
                        <div id="error" class="m-1 row justify-content-center">
                            <div class="col-auto">
                                <?php
                                if(isset($_GET['iderror'])){
                                    if($_GET['iderror'] == 'ok'){
                                ?>
                                    <script>
                                        alert("Categoría asignada correctamente"); 
                                    </script>
                                    <p  style="color:green;" >Categoría asignada correctamente</p>
                                <?php } 
                                    else if ($_GET['iderror'] == 'bad'){
                                        ?>
                                        <script>
                                            alert("Error al asignar categoría, intentelo más tarde"); 
                                        </script>
                                        <p  style="color:red;" >Error al asignar categoría, intentelo más tarde</p>
                                <?php }
                                    else if ($_GET['iderror'] == 'cate'){
                                        ?>
                                        <script>
                                            alert("No seleccionó categoría, vuelva a intentarlo"); 
                                        </script>
                                        <p  style="color:red;" >No seleccionó categoría, vuelva a intentarlo</p>
                                <?php }
                                    else if ($_GET['iderror'] == 'not'){
                                        ?>
                                        <script>
                                            alert("Categoría no valida, vuelva a intentarlo con categoría valida"); 
                                        </script>
                                        <p  style="color:red;" >No seleccionó categoría, vuelva a intentarlo con categoría valida</p>
                                <?php }
                                    else if ($_GET['iderror'] == 'yet'){
                                        ?>
                                        <script>
                                            alert("Categoría seleccionada registrada anteriormente, vuelva a intentarlo seleccionando una nueva categoría"); 
                                        </script>
                                        <p  style="color:red;" >Categoría seleccionada registrada anteriormente, vuelva a intentarlo seleccionando una nueva categoría</p>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <!--FIN SECCIÓN ERROR-->
                        
                        <!--FORMULARIO,SE MUESTRAN LOS DATOS DE CATEGORIAS DE PRODUCTOS-->
                        <form action="../controlador/validar_shop.php" method="POST">
                            
                        <div class="form-row p-2 pt-3">
                            <div class="form-group col-md-12" >
                                <label>Selecciona la categoria de productos que ofrece tu tienda:</label>
                            </div>
                            </div>
                        <div class="form-row p-2 pt-3">
                            <div class="form-group col-md-8" >
                                <?php for($i=0;$i<count($resul);$i++){ ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="categoria" 
                                        value="<?php echo $i+1; ?>" id="categoria">
                                        <label class="form-check-label" for="categoria">
                                            <?php echo $resul[$i]['name_categoria']; ?>
                                        </label>
                                        <div id="passwordHelpBlock" class="form-text ">
                                            <?php echo $resul[$i]['descripcion_cat']; ?>
                                        </div>
                                    </div>
                                                    
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center p-2 pt-3">
                            <div class="form-group text-center col-md-12">
                                <input type="hidden" name="idu" value='<?php echo $idu;?>'>
                                <button type="submit" value="ADDCAT" name="proveedor" class="btn btn-success " 
                                 >Agregar categoría</button>
                            </div>
                        </div>
                        <div class="form-row row justify-content-center p-2">
                            <div class="form-group text-center col-md-12">
                                <a href="http://localhost/proyecto_grado/croptech/vista/proveedor_mishop.php" 
                                class="btn btn-outline-dark"> Volver a tienda</a>
                            </div>
                        </div>
                        </form>
                        <!--FIN FORMULARIO,SE MUESTRAN LOS DATOS DE CATEGORIAS DE PRODUCTOS-->
                    </div>
                </div>
                <!--SECCIÓN CAJA TRASERA-->
                <div class="col ">
                    <div class="caja_trasera"> 
                        <div>
                        <h1 id="name" class="text-center text-white text-shadow">CropTech - Profile</h1>
                        <hr>
                        <br>
                        <h3  class="pt-5">Hola de nuevo, </h3>
                        <p >Puedes seleccionar varias opciones (Seleccionas una la envías y luego seleccionas la siguiente), selecciona la que sería una categoria de
                        productos que tu tienda ofrece.</p>
                        <div>
                    </div>
                </div>
                <!--FIN SECCIÓN CAJA TRASERA-->
            </div>
        </div>
        </div>
        </div>
        <!--FIN SECCIÓN CONTENIDO-->

        <!--SECCIÓN SEPARADOR-->
        <div class="p-3" id="separator-ribbon">
                <div class="bg-light">     
                <h4 class="text-center pb-3 pt-3"></h4>
                </div>
        </div>
        <!--FIN SECCIÓN SEPARADOR-->
    
        <?php  require "../footer.php"; ?>
        
        <!--COMPLEMENTOS BOOTSTRAP-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
        crossorigin="anonymous"></script>
        <!--FIN COMPLEMENTOS BOOTSTRAP-->

    
</body>
</html>

<?php
}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";
}
?>