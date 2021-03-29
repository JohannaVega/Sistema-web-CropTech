<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar rol - CropTech</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

            <!--Boton que se muestra cuando 
            disminuyan las dimensiones del ancho de pantalla
            id del navbar= "navbarSupportedContent"-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!--La clase colapsa los elementos del nav-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" 
                    href="http://localhost/proyecto_grado/croptech">Inicio</a> </li>
                </ul>

                <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
                    <button class="btn btn btn-dark"
                        data-toggle="button" aria-pressed="false" autocomplete="off"
                        style="float: right;"  onclick="location='login/sing-in.php'">
                        Iniciar sesión</button>
                </form>
            </div>
        </div>
    </nav>
    <!--FIN NAVBAR-->

    <!--CONTENEDOR TIPO DE USUARIO-->
    <div id="cultivos">
        <div class="container-md p-5">
                <div class="row">
                    <h1 class="text-center pb-5 ">Elige tu relación con nosotros</h1>
                    <hr>
                </div>
               
                <div class="row justify-content-md-center">
                    <div class="col-sm-4">
                        <div class="card w-100 card-border border-success mb-5" >
                            
                            <img src="../assets/img/cultivador.png" class="card-img-top"  width="200" height="200"
                            alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-success">Unirte como cultivador</h5>
                                <a href="http://localhost/proyecto_grado/croptech/login/sing-up.php"
                                class="btn btn-outline-secondary text-center">Unirme</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card w-100 card-border border-success mb-5" >
                           
                            <img src="../assets/img/shop.png" class="card-img-top"  width="200" height="200"
                            alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-success">Unirte como proveedor</h5>
                                <a href="http://localhost/proyecto_grado/croptech/login/sing-up_p.php"
                                class="btn btn-outline-secondary text-center">Unirme</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card w-100 card-border border-success mb-5" >
                            
                            <img src="../assets/img/admon.png" class="card-img-top"  width="200" height="200"
                            alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-success">Unirte como administrador</h5>
                                <a href="http://localhost/proyecto_grado/croptech/login/sing-up_a.php"
                                class="btn btn-outline-secondary text-center">Unirme</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!--FIN CONTENEDOR TIPO DE USUARIO-->
    <hr>

    <!--SECCIÓN SEPARADOR-->
    <div class="p-3" id="separator-ribbon">
        <div class="bg-light">     
            <h4 class="text-center pb-3 pt-3"></h4></div>
        </div>
    </div>
    <!--FIN SECCIÓN SEPARADOR-->
    <hr>

    <?php require '../footer.php';?>

    <!--COMPLEMENTOS BOOTSTRAP-->
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