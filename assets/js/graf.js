    function index (){
        this.ini = fuction();


    }
    function ini(){
        console.log("iniciando grafica...");
    }
     
    function get_humedad(){
        console.log("iniciando grafica...");
        var fecha_inicio,fecha_fin,id_siembra;
        fecha_inicio = document.getElementById("fecha_inicio").value;
        fecha_fin = document.getElementById("fecha_fin").value;
        id_siembra = document.getElementById("id_siembra").value;

        $.ajax ({
            statusCode:{
                404:function(){
                    console.log("Esta pagina no existe");
                }
            },
            url:'../controlador/validar_cultivos.php',
            method:'POST',
            data:{
                req:"1",
                fecha_inicio: fecha_inicio,
                fecha_fin: fecha_fin,
                id_siembra: id_siembra
            }
        }).done(function(datos){
            //la logica de (response con los datos)
            if(datos!=''){
                var ctx = document.getElementById('idHumedad').getContext('2d');
                let etiquetas =new Array();
                let cantidad_humedad =new Array();
                let coloresH =new Array();

                var jsonData = $.parseJSON(datos);
                //self.replaceWith(jsonData.content);
                //self.replaceWith(jDatos.content);

                console.log("JSIN...".datos);
                //console.log("JSIN...".datos);
                //var jDatos = JSON.parse(JSON.stringify(jDatos));

                var myChart = new Chart(ctx, {
                    type: 'Chart',
                    data: {
                        labels: etiquetas,
                        datasets: [{
                            label: '% Humedad',
                            data: cantidad_humedad,
                            backgroundColor:coloresH
                        }]
                    }
                });

            }

        });

    }
    function get_temperatura(){
            
    }
    function get_luz(){
            
    }
