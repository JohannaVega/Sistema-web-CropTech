<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Inicio usuario - CropTech </title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="../assets/css/estilos.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Inicio</a> </li>
        <li class="nav-item"><a class="nav-link" 
        href="http://localhost/proyecto_grado/croptech/vista/user_perfil.php?idU=<?php echo $_SESSION['usuario']; ?>">Perfil</a></li>
        <li class="nav-item"><a class="nav-link" href="#" >Acerca de nosotros</a></li>
      </ul>

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
          <button class="btn btn btn-dark"
            data-toggle="button" aria-pressed="false" autocomplete="off"
            style="float: right;" type="submit">Sing out</button>
         </form>

    </div>
  </div>
</nav>
        <!--FIN NAVBAR-->

        <!--CARROUSEL-->

        <div class="carrousel" id="mainSlider" data-bs-interval="3000" data-bs-ride="carousel" >
            <div class="carousel-inner"> 
                <div class="carousel-item active" >
                    <img src="../assets/img/slider01.jpg" class="d-block w-100" alt="..." width="1920" height="600">
                  </div>
                  <div class="carousel-item ">
                    <img src="../assets/img/slider02.jpg" class="d-block w-100" alt="..."  width="1920" height="600">
                  </div>
                  <div class="carousel-item">
                    <img src="../assets/img/slider03.png" class="d-block w-100" alt="..."  width="1920" height="600">
                  </div>
            </div>

         <!--menu cultivos-->
         <div id="cultivos">
            <div class="container-lg pb-4 pt-4">
                <div class="row pt-5">
                    <h3 class="text-center pb-5 pt-5 h1">¡Comienza a administrar tu huerta!</h3>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-sm">

                    <div class="card w-100 card-border mb-5" >
                        <img src="../assets/img/addcultivo.jpg" class="card-img-top"  width="200" height="200"
                        alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Agregar cultivo</h5>
                          <p class="card-text">¿Tienes un nuevo cultivo que aún no has registrado?
                              Presiona el botón "Agregar".
                          </p>
                          <a href="http://localhost/proyecto_grado/croptech/vista/cultivo-agregar.php" 
                          class="btn btn-outline-success">Agregar</a>
                        </div>
                      </div>
                </div>
                <div class="col-sm">
                    <div class="card w-100 card-border mb-5">
                        <img src="../assets/img/upcultivo.jpg" class="card-img-top" width="200" height="200"
                        alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Actualizar cultivo</h5>
                          <p class="card-text">Actualiza los datos de tu cultivo cada vez que lo desees,
                              de esta manera tendras control del mismo.
                          </p>
                          <a href="#" class="btn btn-outline-success">Actualizar</a>
                        </div>
                      </div>
                </div>

                <div class="col-sm">
                    <div class="card w-100 card-border mb-5">
                        <img src="../assets/img/viewcultivo.jpg" class="card-img-top" width="200" height="200"
                        alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Visualizar cultivo</h5>
                          <p class="card-text">¿Deseas visualizar los datos de tu cultivo? Presiona la opción
                              "Visualizar".
                          </p>
                          <a href="#" class="btn btn-outline-success">Visualizar</a>
                        </div>
                      </div>
                </div>
            </div>

            <div class="row justify-content-around ">
            <div class="col-4">
                    <div class="card w-100 card-border mb-5">
                        <img src="../assets/img/historial.jpg" class="card-img-top" width="100" height="200"
                        alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Historial de cultivos</h5>
                          <p class="card-text">Para ver el historial de tus cultivos. Presiona
                              la opción "Ver historial".
                          </p>
                          <a href="http://localhost/proyecto_grado/croptech/vista/cultivo-historial.php" class="btn btn-outline-success">Ver historial</a>
                        </div>
                      </div>
                </div>

                <div class="col-4">
                    <div class="card w-100 card-border mb-5">
                        <img src="../assets/img/ayuda.jpg" class="card-img-top" width="100" height="200"
                        alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Ayuda documental</h5>
                          <p class="card-text">¿Deseas saber más sobre como gestionar tu huerto en casa?.
                              Acá te ofrecemos asesoria. Presiona el botón "Ver ayuda".
                          </p>
                          <a href="#" class="btn btn-outline-success"
                          style="float: center;">Ver ayuda</a>
                        </div>
                      </div>
                </div>
            </div>

            
        </div>
    </div>
    <!--SEPARADOR RIBBON-->
    <div id="separator-ribbon">
            <div class=" bg-light">
            <h3 class="text-center pb-5 pt-5">Tiendas de suministros para tus cultivos:</h3></div>
          </div>

    <!--API leflet maps-->
    <div id="myMap" clas="container-md-center" ></div>

    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
    integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
    crossorigin=""></script>
    <script src="../assets/js/map.js"></script>
    <!--FIN API-->

    <div id="separator-ribbon">
            <div class="bg-light">
            <h3 class="text-center pb-5 pt-5"></h3></div>
          </div>
   </div>

    <?php include '../footer.php';?> 
   

  
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
        crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
       integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
       crossorigin="anonymous"></script>

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
