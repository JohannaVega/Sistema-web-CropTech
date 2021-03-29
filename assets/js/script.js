/*cuando el boton iniciar sesion se presione se le añade el evento click
  que redirecciona a la función iniciar_sesion*/
document.getElementById("btn_iniciar-sesion").addEventListener("click",iniciar_sesion);
/*cuando el boton registrase se presione se le añade el evento click
  que redirecciona a la función register*/
document.getElementById("btn_registrarse").addEventListener("click",register);
window.addEventListener("resize", ancho_pagina );

//Declaración de variables
var contenedor_login_register = document.querySelector(".contenedor_login-register");
var formulario_login = document.querySelector(".formulario_login");
var formulario_register = document.querySelector(".formulario_register");
var caja_trasera_login = document.querySelector(".caja_trasera-login");
var caja_trasera_register = document.querySelector(".caja_trasera-register");


//sirve cuando se haga resize en la pag
function ancho_pagina(){
    if(window.innerWidth > 850){
        caja_trasera_login.style.display = "block";
        caja_trasera_register.style.display = "block";
    }else{
        
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        contenedor_login_register.style.left="0px";
    }
}
//Se ejecta cada vez que se recargue la pagina
//evitando porblemas en la forma en que se muestra el contenido
ancho_pagina();

function iniciar_sesion(){
//cuando clickeamos el botor de login el formulario login se posiciona en pantalla

    /*si el ancho de la pantalla es mayor a 850px*/
    if(window.innerWidth > 850){
    /* quitamos el formulario registro de la pantalla */
    formulario_register.style.display = "none";
    /*Movemos 10px a la izq del contenedor para que de la transicion */
    contenedor_login_register.style.left = "10px";
    /*posiciono el formulario login*/
    formulario_login.style.display = "block";
    //desaparece caja trasera de login
    caja_trasera_register.style.opacity = "1";
    caja_trasera_login.style.opacity = "0";

    }else{
        formulario_register.style.display = "none";
        /*No haremos la trancisión a la izq */
        contenedor_login_register.style.left = "0px";
        /*posiciono el formulario login*/
        formulario_login.style.display = "block";
        //desaparece caja trasera de login
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
    
}

function register(){
    //cuando clickeamos el botor de registrarse el formulario registro se posiciona en pantalla

    if(window.innerWidth > 850){
    formulario_register.style.display = "block";
    /*Movemos 410px a la izq del contenedor para que de la transicion */
    contenedor_login_register.style.left = "410px";
    /*oculto el formulario login*/
    formulario_login.style.display = "none";
    //desaparece caja trasera de registro
    caja_trasera_register.style.opacity = "0";
    caja_trasera_login.style.opacity = "1";

    }else{
        formulario_register.style.display = "block";
        /*No haremos la trancisión a la izq */
        contenedor_login_register.style.left = "0px";
        /*oculto el formulario login*/
        formulario_login.style.display = "none";
        //desaparece caja trasera de registro
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity="1";

    }
}
