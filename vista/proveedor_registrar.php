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
    <title>Registro tienda - CropTech</title>

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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" 
                        href="http://localhost/proyecto_grado/croptech/vista/proveedor_registrar.php">Registrar tienda</a> </li>
                        <li class="nav-item"><a class="nav-link " aria-current="page" 
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
                        <h3 class="text-black text-shadow">¡Publicita tu tienda!</h3>
                        <p class="text-black text-shadow">Ingresa los datos de contacto de tu tienda junto con una 
                            descripción de los productos que ofreces para que nuestros 
                            usuarios te escogan como su proveedor de insumos. 
                        </p>
                        <h4 class="text-black">Recuerda, que solo puedes agregar una tienda</h4>
                    </div>
                </div>
            </div>
            <!--FIN SECCIÓN CAJA TRASERA-->
        </div>

        <!--SECCIÓN ERROR-->
        <div id="error" class="m-1 row justify-content-center">
            <div class="col-auto">
                <?php
                if(isset($_GET['iderror'])){
                    if($_GET['iderror'] == 'ok'){
                ?>
                    <script>
                        alert("Tienda registrada correctamente"); 
                    </script>
                    <p  style="color:green;" >Tienda registrada correctamente</p>
                <?php } 
                    else if ($_GET['iderror'] == 'bad'){
                        ?>
                        <script>
                            alert("Error al registrar la tienda, intentelo más tarde"); 
                        </script>
                        <p  style="color:red;" >Error al registrar la tienda, intentelo más tarde</p>
                <?php }
                    else if ($_GET['iderror'] == 'limit'){
                        ?>
                        <script>
                            alert("Lo sentimos,no es posible agregar más de una tienda"); 
                        </script>
                        <p  style="color:red;" >Lo sentimos,no es posible agregar más de una tienda</p>
                <?php }
                } ?>
            </div>
        </div>
        <!--FIN SECCIÓN ERROR-->
        <hr>
                    <!--COLUMNA 1-->
                    <div class="col-auto p-5  bg-light border border-success">
                        <div class="jumbotron">
                            <div id= "contenedor-name">
                                <h1 id="name" class="text-black text-center" >Registra tu tienda física</h1>
                                <hr>
                            </div>

                                <!--SECCIÓN FORMULARIO-->
                                <form action="../controlador/validar_shop.php" method="post">
                                        
                                        <div class="form-row row justify-content-center p-2">
                                            <div class="form-group col-md-12" >
                                                <input type="text" class="form-control" placeholder="Nombre establecimiento" 
                                                id="name_shop" name="name_shop" required>
                                            </div>
                                        </div>
                                        <div class="form-row row justify-content-center p-2">
                                            <div class="form-group col-md-12" >
                                                <input type="text" class="form-control" placeholder="Dirección física establecimiento" 
                                                id="address" name="address" required>
                                            </div>
                                        </div>
                                        <div class="form-row row justify-content-center p-2">
                                            <div class="form-group col-md-12" >
                                                <input type="url" class="form-control" placeholder="Dirección web" 
                                                id="address" name="address_web" title="Sólo se permiten URLs .com bien formadas">
                                                <div id="passwordHelpBlock" class="form-text">
                                                   Si cuenta con un enlace a la pagina web o un enlace a la página de
                                                   Facebook e Instagram de su tienda ingreselo aquí.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row justify-content-center p-2">
                                            <div class="form-group col-md-12" >
                                            <label>Descripción del establecimiento:</label>
                                                <textarea  class="form-control"  rows="5" cols="5" 
                                                id="descripcion" name="descripcion" required> </textarea>
                                                <div id="passwordHelpBlock" class="form-text">
                                                    Ingrese una descripción de los productos que ofrece su tienda para que 
                                                    nuestros usuarios sepan un poco más sobre su tienda.
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="idu" value='<?php echo $_SESSION['usuario'];?>'>
                                        <div class="col-auto text-center ">
                                            <button type="submit" value="INSERT_SHOP" name="proveedor" class="btn btn-outline-secondary btn-lg" 
                                            onclick="return validarinsertT();" >Registrar tienda</button>
                                        </div>
                                </form>
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