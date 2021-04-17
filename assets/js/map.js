    //FUNCION DE AI QUE ERMITE VISUALIZAR MAA CON NUESTRA UBICACION
    let myMap = L.map('myMap').setView([4.5985683331191405, -74.11156456622547], 18)
    

    L.tileLayer(`https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png`, {  
        maxZoom: 20,
    }).addTo(myMap);


    let marker = L.marker([4.5985683331191405, -74.11156456622547]).addTo(myMap)
   


    let iconMarker = L.icon({
        iconUrl: '..assets/img/marker.png',
        iconSize: [60, 60],
        iconAnchor: [30, 60]
    })

