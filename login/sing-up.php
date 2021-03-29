<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registro - CropTech </title>
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
    <div class="conteiner_todo">
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
            href="http://localhost/proyecto_grado/croptech/index.php">Inicio</a> </li>
           
        </ul>

            </div>
        </div>
        </nav>
            <!--FIN NAVBAR-->
            <?php 
             require '../modelo/facade.php';
             $obj_facade = new facade();
             $roles = $obj_facade->read_roles();  
            ?>

            <!--CONTENIDO-->
            <div class="container-md pb-4 pt-4 ">
                    <div class="m-1 row ">
                        <div class="col-auto p-5 bg-light border border-success">
                            <div class="jumbotron">
                                <div id= "contenedor-name">
                                    <h1 id="name" class="text-black text-center" >Regístrate</h1>
                                    <hr>
                                </div>
                                 <!--SECCIÓN FORMULARIO-->
                                <form action="../controlador/validarlogin.php" method="post">

                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Nombres:</label>
                                            <input type="text" class="form-control"  name="nombre" aria-label="Nombres" 
                                            id="pnombre" required>
                                        </div>
                                    </div>
                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Apellidos:</label>
                                            <input type="text" class="form-control" name="apellido" aria-label="Apellidos" 
                                            id="sapellido" required>
                                        </div>
                                    </div>
                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                        <label>Sexo:</label>
                                        <select class="form-select form-select-lg mb-1" id="sexo" name="sexo" required>
                                            <option value="0">Selecciona una opción</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Correo Electronico:</label>
                                            <input type="text" class="form-control"  name="correo" aria-label="Correo Electronico" 
                                            id="correo" required>
                                        </div>
                                    </div>
                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Telefono no. 1:</label>
                                            <input type="number" class="form-control" name="telefono"
                                            aria-label="Telefono" min="3000000000" max="3999999999" id="telefono" required>
                                        </div>
                                    </div>
                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Telefono no. 2:</label>
                                            <input type="number" class="form-control" name="telefono2"
                                            aria-label="Telefono" min="3000000000" max="3999999999" id="telefono2" >
                                        </div>
                                    </div>
                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Contraseña:</label>
                                            <input type="password" class="form-control"  name="contra"
                                            aria-label="Contraseña" id="pass1" required>
                                            <div id="passwordHelpBlock" class="form-text">
                                                La contraseña debe tener: 6-16 caracteres, letras y numeros, al menos una mayúscula y una minúscula.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Valida tu contraseña:</label>
                                            <input type="password" class="form-control"  name="contra2"
                                            aria-label="Contraseña" id="pass2" required>
                                        </div>
                                    </div>

                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Pregunta de seguridad:</label>
                                            <select class="form-select form-select-lg mb-1" id="ask" name="ask" required>
                                                <option value="0">Seleccione una opción</option>
                                                <option value="1">Nombre se su primer mascota</option>
                                                <option value="2">Direccion de su primer lugar de residencia</option>
                                                <option value="3">Nombre mejor amigo de la infancia</option>
                                                <option value="4">Nombre de su localidad de residencia</option>
                                                <option value="5">Color de su camisa favorita</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Respuesta:</label>
                                            <input type="password" class="form-control" id="answer" name="answer" 
                                            aria-label="Respuesta" required>
                                            <input type="hidden" name="estado" value='<?php echo "activo";?>'>
                                            <input type="hidden" name="rol" value='<?php echo $roles[0]['id_rol_usuario'];?>'>
                                        </div>
                                    </div>
                                     <!--SECCIÓN feedback-->
                                    <div class=" text-center p-2" id="error">
                                        <?php 
                                        if(isset($_GET['iderror'])){
                                            if($_GET['iderror'] == 'ok'){
                                            ?>
                                            <script>
                                                alert("Usuario registrado correctamente"); 
                                            </script>
                                            <p  style="color:green;">Usuario registrado correctamente </p>
                                            <?php
                                            }
                                            if($_GET['iderror'] == 'a'){
                                            ?>
                                            <script>
                                                alert("La clave debe tener al menos 6 caracteres"); 
                                            </script>
                                            <p  style="color:red;" >La clave debe tener al menos 6 caracteres</p>
                                            <?php
                                            }
                                            if($_GET['iderror'] == 'b'){
                                            ?>
                                            <script>
                                                alert("La clave no puede tener más de 16 caracteres"); 
                                            </script>
                                            <p  style="color:red;" >La clave no puede tener más de 16 caracteres</p>
                                            <?php
                                            }
                                            if($_GET['iderror'] == 'c'){
                                            ?>
                                            <script>
                                                alert("La clave debe tener al menos una letra minúscula"); 
                                            </script>
                                            <p style="color:red;" >La clave debe tener al menos una letra minúscula</p>
                                            <?php
                                            }
                                            if($_GET['iderror'] == 'd'){
                                            ?>
                                            <script>
                                                alert("La clave debe tener al menos una letra mayúscula"); 
                                            </script>
                                            <p style="color:red;" >La clave debe tener al menos una letra mayúscula</p>
                                            <?php
                                            }
                                            if($_GET['iderror'] == 'e'){
                                            ?>
                                            <script>
                                                alert("La clave debe tener al menos un caracter numérico"); 
                                            </script>
                                            <p  style="color:red;" >La clave debe tener al menos un caracter numérico</p>
                                            <?php
                                            }
                                            if($_GET['iderror'] == '1'){
                                            ?>
                                            <script>
                                                alert("Error en el sistema, vuelva a intentarlo mas tarde"); 
                                            </script>
                                            <p style="color:red;" >Error en el sistema, vuelva a intentarlo mas tarde</p>
                                            <?php
                                            }
                                            if($_GET['iderror'] == '2'){
                                            ?>
                                            <script>
                                                alert("El telefono ingresado, ya registrado en el sistema"); 
                                            </script>
                                            <p  style="color:red;" >El telefono ingresado, ya registrado en el sistema</p>
                                            <?php
                                            }
                                            if($_GET['iderror'] == '3'){
                                                ?>
                                                <script>
                                                alert("No selecciono sexo, vuelva a llenar el formualrio"); 
                                                </script>
                                                <p align="center" style="color:red;" >No selecciono sexo, vuelva a llenar el formualrio</p>
                                                <?php
                                            }
                                            if($_GET['iderror'] == '4'){
                                                ?>
                                                <script>
                                                alert("No selecciono pregunta, vuelva a llenar el formualrio"); 
                                                </script>
                                                <p align="center" style="color:red;" >No selecciono pregunta, vuelva a llenar el formualrio</p>
                                                <?php
                                            }
                                            if($_GET['iderror'] == '5'){
                                            ?>
                                            <script>
                                                alert("El email ingresado ya esta registrado en el sistema"); 
                                            </script>
                                            <p a style="color:red;" >El email ingresado ya esta registrado en el sistema</p>
                                            <?php
                                            }
                                            if($_GET['iderror'] == '6'){
                                            ?>
                                            <script>
                                                alert("Las contraseñas ingresadas no son iguales"); 
                                            </script>
                                            <p  style="color:red;" >Las contraseñas ingresadas no son iguales</p>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <!--FIN SECCIÓN feedback-->

                                    <div class=" text-center p-2">
                                    <button type="submit"  class="btn btn-outline-success btn-lg" value="CREAR_U" 
                                    name="Registro" onclick="return validar_insertU();">Registrarse </button>
                                    </div>
                                </form>
                                <!--FIN SECCIÓN FORMULARIO-->
                            </div> 
                        </div> 
                            <!--SECCIÓN CAJA TRASERA-->
                            <div class="col ">
                                <div class="caja_trasera"> 
                                    <div>
                                        <h1 id="name" class="text-black text-white text-shadow" >CropTech</h1>
                                        <hr>
                                        <br>
                                        <h3>¿Ya tienes una cuenta?</h3>
                                        <p>Inicia sesión para acceder a tu perfil de usuario</p>
                                        <button id="btn_iniciar-sesion" 
                                        onclick="location='../login/sing-in.php'" >Iniciar sesión</button>
                                    </div>
                                </div>
                            </div>
                             <!--FIN SECCIÓN CAJA TRASERA-->
                    </div>  
                        
            </div> 
            <!--FIN CONTENIDO-->
            <?php  require "../footer.php"; ?>
    </div> 
    <script src="../assets/js/validaciones_form.js"></script>
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