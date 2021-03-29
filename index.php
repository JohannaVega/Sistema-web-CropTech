<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - CropTech</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="assets/css/estilos.css">
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
                        <img src="assets/img/logo.png" alt="" width="100">
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
                    <li class="nav-item"><a class="nav-link" id="link1"
                    href="#quienes_somos" >Acerca de nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/login/sing-up_p.php">Registra tu tienda</a></li>
                    <li class="nav-item"><a class="nav-link"
                    href="http://localhost/proyecto_grado/croptech/login/sing-up.php">Gestiona tu cultivo</a></li>
                    <li class="nav-item"><a class="nav-link" id="link2"
                    href="#separator-ribbon">Proveedores</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" 
                    href="http://localhost/proyecto_grado/croptech/login/sing-up_a.php">Administradores</a> </li>
                </ul>

                <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
                    <a href="http://localhost/proyecto_grado/croptech/login/sing-in.php" 
                    class="btn btn btn-dark" style="float: right;"> Iniciar sesión</a>
                </form>
            </div>
        </div>
    </nav>
    <!--FIN NAVBAR-->

    <!--SECCIÓN CARROUSEL-->
    <div class="carrousel" id="mainSlider" data-bs-interval="3000" data-bs-ride="carousel" >
        <div class="carousel-inner"> 
            <div class="carousel-item active" >
                <img src="assets/img/slider01.jpg" class="d-block w-100" alt="..." width="1920" height="600">
            </div>
            <div class="carousel-item ">
                <img src="assets/img/slider02.jpg" class="d-block w-100" alt="..."  width="1920" height="600">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slider03.png" class="d-block w-100" alt="..."  width="1920" height="600">
            </div>
    </div>
    <!--FIN SECCIÓN CARROUSEL-->

    <!--SECCIÓN ACERCA DE NOSOTROS-->
    <div class="caja_quienes m-3" id="quienes_somos">
        <div class="container-md ">
            <div class="conteiner-texto">
                <div class="row justify-content-center pt-5">
                    <h1 id="name" class="text-black text-center" >¿Quiénes somos?</h1>
                </div>
                    <div class="row pt-5 pb-5">
                        <p>Somos un sistema web completo que pretende ayudar a cada uno de 
                            los agricultores urbanos a gestionar y optimizar sus huertos urbanos.
                
                            Encontrarás una sección de gestión documental en donde te compartimos
                            una guía completa con toda la información necesaria para iniciar tu huerto
                            u optimizarlo.
                        </p>

                        <p>
                            Tus huertos urbanos contarán con características de calidad 
                            gracias al análisis de las variables de tus cultivos y a la guía que te ofrecemos,
                            todo esto sin necesidad de ser un experto. También podrás contactar a nuestros
                            proveedores registrados quiénes te dotarán de los insumos necesarios en tu huerto.
                        </p>
                    </div>
            </div>
        </div>
    </div>
    <hr>
    <!--FIN SECCIÓN ACERCA DE NOSOTROS-->

    <!--SECCIÓN MENÚ CULTIVOS-->
    <div id="cultivos">
        <div class="container-md p-5">
                <div class="row">
                    <h3 class="text-center pb-5 pt-5 h1">¡Comienza ahora!</h3>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-sm-4">

                    <div class="card w-100 card-border mb-5" >
                        <img src="assets/img/addcultivo.jpg" class="card-img-top"  width="200" height="200"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Administra tus cultivos</h5>
                            <p class="card-text">¿Deseas comenzar a administrar tu cultivos?
                                Crea tu cuenta y podrás acceder a todas las opciones que tenemos disponibles
                                para ti con solo un click.
                            </p>
                            <p class="card-text">  
                                Presiona el botón "Comenzar".
                            </p>
                            <a href="http://localhost/proyecto_grado/croptech/login/sing-up.php" 
                            class="btn btn-outline-success text-center">Comenzar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card w-100 card-border mb-5">
                        <img src="assets/img/upcultivo.jpg" class="card-img-top" width="200" height="200"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Unirte como un proveedor</h5>
                            <p class="card-text">¿Eres un proveedor?
                                Si deseas ofrecer tus productos en nuestra plataforma para que
                                nuestros agricultores urbanos tengan acceso a los mejores insumos,
                                crea tu cuenta e inicia como un proveedor, la informacion de tu tienda
                                se publicará en el sistema.
                            </p>
                            <p class="card-text">  
                                Presiona el botón "Registrarme".
                            </p>
                            <a href="http://localhost/proyecto_grado/croptech/login/sing-up_p.php" class="btn btn-outline-success text-center">Registrarme</a>
                        </div>
                      </div>
                </div>
            </div>

            <div class="row justify-content-around ">

            <div class="col-sm-4">
                    <div class="card w-100 card-border mb-5">
                        <img src="assets/img/viewcultivo.jpg" class="card-img-top" width="200" height="200"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Guía técnica</h5>
                            <p class="card-text">¿Deseas aprender un poco más sobre como gestionar tu huerto? 
                                Si necesitas información técnica respecto a como gestionar tus cultivos en casa,
                                ¿Qué contenedores usar?, ¿Cuál es la cantidad óptima de agua para mi cultivo?, etc.
                            </p>
                            <p class="card-text">   
                                Presiona el botón:
                                "Visualizar guía".
                            </p>
                            <p class="card-text">   
                                Encontrarás documentos que te ofrecerán la información necesaria para tu huerto.
                            </p>
                            <a href="http://localhost/proyecto_grado/croptech/vista/guia.php" class="btn btn-outline-success text-center">Visualizar guía</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                        <div class="card w-100 card-border mb-5">
                            <img src="assets/img/historial.jpg" class="card-img-top" width="100" height="200"
                            alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Contáctanos</h5>
                                <p class="card-text">Si deseas obtener nuestra información de contácto. 
                                </p>
                                <p class="card-text">  
                                    Presiona el botón: "Contácto".
                                </p>
                                <a href="http://localhost/proyecto_grado/croptech/contacto.php" 
                                class="btn btn-outline-success text-center">Contácto</a>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
    <!--FIN SECCIÓN MENÚ CULTIVOS-->
    <hr>

    <!--SECCIÓN SEPARADOR-->
    <div id="separator-ribbon">
            <div class="bg-light">     
            <h4 class="text-center pb-5 pt-5">Tiendas de suministros para cultivos:</h4></div>
          </div>
    </div>
    <!--FIN SECCIÓN SEPARADOR-->

    <!--API leflet maps-->
    <div id="myMap" clas="container-md-center" ></div>
        <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
        crossorigin=""></script>
        <script src="assets/js/map.js"></script>
    <!--FIN API-->
    <hr>

    <!--SECCIÓN SEPARADOR-->
    <div id="separator-ribbon">
            <div class="bg-light">
            <h3 class="text-center pb-5 pt-5"></h3></div>
          </div>
    </div>
    <!--FIN SECCIÓN SEPARADOR-->
    <hr>

    <?php include 'footer.php';?> 

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

    <!--JS LE BRINDA TRANSICIÓN DEL LINK-->
    <script>
        $('#link1').on('click', function(e) {
        e.preventDefault();
        $("html, body").animate({scrollTop: $('#section1').offset().top }, 1000);
    });
    </script>
    <!--FIN JS LE BRINDA TRANSICIÓN DEL LINK-->

</body>
</html>