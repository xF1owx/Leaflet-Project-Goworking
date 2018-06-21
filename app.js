
// ICONE WIFI POINTS //
var geojsonMarkerOptions = {
    radius: 8,
    fillColor: "#ff7800",
    color: "#000",
    weight: 1,
    opacity: 1,
    fillOpacity: 0.8
};
// ICONE WIFI POINTS //





var points = new L.LayerGroup();

var map = L.map('map',{
    zoom: 12,
        layers: [points]}).setView([47.234415, 5.9238639999999805], 8);
L.tileLayer('https://korona.geog.uni-heidelberg.de/tiles/roads/x={x}&y={y}&z={z}', {
    maxZoom: 20
}).addTo(map);

map.addLayer(points);


// Si Localisation Ok  // 
function onLocationFound(e) {
    var radius = e.accuracy / 2;
    var iconeLoc = L.icon({
        iconUrl: "urhere.png",
iconSize: [20, 20]
    });
     
    L.marker(e.latlng,{icon:iconeLoc}).addTo(map);
   
    L.circle(e.latlng, radius).addTo(map);
    map.initlat = e.latlng.lat;
    map.initlng = e.latlng.lng;
 
    document.getElementById("lat").value =  e.latlng.lat;
    document.getElementById("long").value =  e.latlng.lng;
    
    
}
map.on('locationfound', onLocationFound); 
map.locate({setView: true, maxZoom: 16});

// RECENTRAGE SUR POS USER //
document.getElementById("recentrer").addEventListener("click", function (e){

     
    var latitude = document.getElementById("lat").value; 
    var longitude = document.getElementById("long").value;

    console.log(latitude);

    if (latitude != null){
    map.setView([latitude, longitude, 13]);

    }
    else {
        console.log("pas de données");
    }
    

})








   





map.on('click', function (e) {
        var container = L.DomUtil.create('div'),
        startBtn = createButton('Start from this location', container),
        destBtn = createButton('Go to this location', container);
        
        L.popup()
        .setContent(container)
        .setLatLng(e.latlng)
        .openOn(map);
        });
        
        map.locate({
        setView: true,
        maxZoom: 15
        });    


    

       



        document.querySelector("form").addEventListener("submit", function (e) {
            
        e.preventDefault();
        points.clearLayers();
        
        var selection = document.querySelectorAll(".selection:checked");
        var city = document.getElementById("cityfind").value;
        var data = new FormData();
        
        for (i=0;i< selection.length; i++){
            console.log(selection[i].getAttribute("name"));
            data.append(selection[i].getAttribute("name"),selection[i].getAttribute("value"));
        }
        data.append("lat", lat.value);
        data.append("long", long.value);
        data.append("city",city);
        var paramAjax = {
        method: "POST",
        body: data
        };

        

        

        fetch("jsonPoints.php", paramAjax).then(function (response) {
            return response.json();
            
        })
        

        .then(function(reponse){
          
        if (reponse[0].city_long != null){

            map.setView([reponse[0].city_lat, reponse[0].city_long, 1]);
            document.getElementById("lat").value = reponse[0].city_lat; 
            document.getElementById("long").value = reponse[0].city_long;
            document.getElementById("cityfind").value = null;
            document.getElementById("que");
            

            
            
        } else {
            
        var geojson = {
            "type": "FeatureCollection",
            "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
            "features":reponse
        }


        
        
                   
             L.geoJSON(geojson, {               
            onEachFeature: function (feature, latlng) {
                if (feature.properties.Addresse != null){
               latlng.bindPopup('<h1>'+feature.properties.Name+'</h1><p> Adresse:</br> '+feature.properties.Addresse+'</br>'+feature.properties.cp+' '+feature.properties.city+'</p>'+'<p> Site web: <a href=http://'+feature.properties.website+'>Site</a></p>');
            }
            else {
                latlng.bindPopup('<h1>'+feature.properties.Name+'</h1>');                
            }
            return   L.circleMarker(latlng, geojsonMarkerOptions);
            
            
            
        }
        })


        
        .addTo(points); 



       
        
    }});
});


