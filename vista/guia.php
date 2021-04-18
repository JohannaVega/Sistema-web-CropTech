<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda documental - CropTech</title>

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

    <?php
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
    ?>
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

            <!--La clase colapsa los elementos del nav-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" 
                    href="http://localhost/proyecto_grado/croptech">Inicio</a> </li>
                    <li class="nav-item"><a class="nav-link" 
                    href="http://localhost/proyecto_grado/croptech/login/sing-up_p.php">Registra tu tienda</a></li>
                    <li class="nav-item"><a class="nav-link"
                    href="http://localhost/proyecto_grado/croptech/login/sing-up.php">Gestiona tu cultivo</a></li>
                    <li class="nav-item"><a class="nav-link active" id="link2"
                    href="http://localhost/proyecto_grado/croptech/vista/guia.php">Ayuda documental</a></li>     
                </ul>

                <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
                    <a href="http://localhost/proyecto_grado/croptech/login/sing-in.php" 
                    class="btn btn btn-dark" style="float: right;"> Iniciar sesión</a>
                </form>
            </div>
        </div>
    </nav>
    <!--FIN NAVBAR-->

    <!--SECCIÓN CAPACITATE-->
    <div class="caja_quienes m-3">
        <div class="container-md ">
            <div class="content-texto">
                <div class="row justify-content-center pt-5">
                    <h1 id="name" class="text-black text-center" >Capacitate</h1>
                    <hr>
                </div>
                    <div class="row pt-5 pb-5  text-center">
                        <p>El jardín Botánico de la ciudad de Bogotá te ofrece la oportunidad
                            de capacitarte, enseñandote técnicas de siembra y manejo de 
                            agricultura integral, según los lineamientos establecidos por esta 
                            institución. Si quieres aprender más, presiona el botón ver más 
                        </p>

                        <div class="text-center p-2">
                            <a href="https://www.jbb.gov.co/index.php/agricultura-urbana#tab2-b" target="_blank"> 
                            <button type="button"
                            class="btn btn-success">Ver más</button></a>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <hr>
    <!--FIN SECCIÓN CAPACITATE-->

    <!--SECCIÓN CONTENIDO-->
    <div class="container-md ">
         <!--FILA SECCIÓN TITIULO-->  
        <div class="row justify-content-center pt-5">
            <h1 id="name" class="text-black text-center" >Ayuda documental - CropTech.</h1>
        </div>
        <!--FIN FILA SECCIÓN TITIULO-->  
        <br>
        
         <!--FILA 1 SECCIÓN CARDS--> 
        <div class="row justify-content-md-center">
                <div class="col-sm-4">
                    <div class="card w-100 card-border mb-5" >
                        <img src="../assets/img/help6.jpg" class="card-img-top"  width="200" height="200"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#25B45F;">Aprende técnicas de siembra</h5>
                            <p class="card-text">Si deseas investigar un poco sobre como debes sembrar
                            desde tu huerto en casa y que variables ambientales debes tener en cuenta, 
                            te proporcionamos acceso a esta cartilla técnica que te guíara en el proceso.
                            </p>
                            <p class="card-text">  
                                Presiona el botón "Abrir".
                            </p>
                            <a href="../assets/document/Cartilla_tecnica_siembra_cosecha.pdf" target="_blank"
                            class="btn btn-outline-success text-center">Abrir</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card w-100 card-border mb-5">
                        <img src="../assets/img/help1.jpg" class="card-img-top" width="200" height="200"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#25B45F;">Catálogo plantas</h5>
                            <p class="card-text">Aprende un poco más sobre que tipo de plantas se siembran
                            en la agricultura urbana. Te mostramos un catálogo realizado por Jesica Guerra Licenciada
                            en Bilogía de la Universidad Distrital F.J.C.
                            </p>
                            <p class="card-text">  
                                Presiona el botón "Abrir".
                            </p>
                            <a href="../assets/document/Catalogo-plantas-agricultura-urbana.pdf" target="_blank"
                            class="btn btn-outline-success text-center">Abrir</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card w-100 card-border mb-5">
                        <img src="../assets/img/help4.jpg" class="card-img-top" width="200" height="200"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#25B45F;">Manejo de plagas y enfermedades</h5>
                            <p class="card-text">Nuestro cultivo está expuesto todo el tiempo a 
                            la posibilidad de contraer plagas y enfermedades en cualquier momento, 
                            por eso te debes asesorar sobre que tipos de plagas y enfermedades puede
                            contraer tu cultivo y así, prevenirlas y controlarlas.
                            </p>
                            <p class="card-text">  
                                Presiona el botón "Abrir".
                            </p>
                            <a href="../assets/document/Cartilla_manejo_plagas_enfermedades.pdf" target="_blank"
                            class="btn btn-outline-success text-center">Abrir</a>
                        </div>
                    </div>
                </div>
        </div>
        <!--FIN FILA 1 SECCIÓN CARDS--> 

        <!--FILA 2 SECCIÓN CARDS--> 
        <div class="row justify-content-md-center">
                <div class="col-sm-4">
                    <div class="card w-100 card-border mb-5" >
                        <img src="../assets/img/help3.jpg" class="card-img-top"  width="200" height="200"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#25B45F;">Proyecto Agricultura Urbana</h5>
                            <p class="card-text" >El documento que te mostramos a continuación, es la presentación
                            del proyecto de agricutura urbana del Jardín Botánico de Bogotá. Contiene
                            una guía de como llevar a cabo este proyecto, teniendo en cuenta
                            cada una de las especies de plantas que se promueven, tecnologías a utilizar y otros
                            datos interesantes que te servirán.
                            </p>
                            <p class="card-text">  
                                Presiona el botón "Abrir".
                            </p>
                            <a href="../assets/document/Especies_agricultura_urbana.pdf" target="_blank"
                            class="btn btn-outline-success text-center">Abrir</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card w-100 card-border mb-5">
                        <img src="../assets/img/help2.jpg" class="card-img-top" width="200" height="200"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#25B45F;">Conoce este blog interesante</h5>
                            <p class="card-text">Conoce un poco sobre que es la agricultura urbana 
                            a nivel mundial y las razones que motivan la expansión de esta técnica 
                            que esta abriendo puertas a nuevas posibilidades, generando ciudades sostenibles. 
                            </p>
                            <p class="card-text">  
                                Presiona el botón "Abrir".
                            </p>
                            <a href="https://blogs.iadb.org/ciudades-sostenibles/es/agricultura-urbana/" target="_blank"
                            class="btn btn-outline-success text-center">Abrir</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card w-100 card-border mb-5">
                        <img src="../assets/img/help5.jpg" class="card-img-top" width="200" height="200"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#25B45F;">Directorio de huertas urbanas</h5>
                            <p class="card-text">El jardín Botánico de la ciudad de Bogotá con el fin
                            de promover la agricultura urbana y potencializar el proyecto ha creado un 
                            directorio de huertas urbanas pertenecientes al proyecto de agricultura urbana.
                            Puedes hechar un vistazo para conocer los huertos que puedes encontrar alrededor
                            de la cuidad de Bogotá.
                            </p>
                            <p class="card-text">  
                                Presiona el botón "Abrir".
                            </p>
                            <a href="../assets/document/Especies_agricultura_urbana.pdf" target="_blank"
                            class="btn btn-outline-success text-center">Abrir</a>
                        </div>
                    </div>
                </div>
                
        </div>
        <!--FIN FILA 2 SECCIÓN CARDS--> 
    </div>
    <!--FIN SECCIÓN CONTENIDO-->
    <br>
    <hr>

    <?php include '../footer.php';?> 

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