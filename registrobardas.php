<!DOCTYPE html>
 <head>
   <LINK REL="stylesheet" TYPE="text/css" href="estilos.css">

  <title>Registro de eventos de campaña</title>

   <meta charset=UTF-8>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="none">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="">

  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="">
  </script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

</head>

 <body>
 <div class="container">
    <div style="margin: 0 auto; width: 100%;">

  <h3>Registro de eventos de campaña</h3><hr>
    <div id="map" style="width: 100%; height: 400px;"></div>
  <form>
        <input type=text name="ruta" id="ruta" placeholder ="Brigada">
        <input type=text name="origendestino" id="origendestino" placeholder ="Direccion">

     <select name="modulo" id="modulo">
           <option>Distrito</option>
           <option value=1>1</option>
           <option value=2>2</option>
           <option value=3>3</option>
           <option value=4>4</option>
           <option value=5>5</option>
           <option value=6>6</option>
           <option value=7>7</option>
        </select>

        <select name="modalidad" id="modalidad">
           <option>Actividad</option>
           <option value="o">Barda</option>
           <option value="a">Volanteo</option>
           <option value="ex">Periodico</option>
           <option value="ec">Comite seccional</option>
           <option value="se">Simpatizante</option>
       </select>

       <br>

      </form>


</div>



        <script>

 //const localizacion ="http://incidencias.rtp.gob.mx/" ;

    const localizacion ="http://localhost/~ferguez/dp/" ;

    var map = L.map('map').setView([19.41142,-99.13715], 18);

    var tiles = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 18,tileSize: 512,zoomOffset: -1}).addTo(map);

    var popup = L.popup();

    var iconMarker = L.icon({
        iconUrl : localizacion+'icono/bus.svg',
        iconSize: [30,30],
        iconAnchor: [15,30]
        })

    var iconParada = L.icon({
        iconUrl : localizacion+'icono/parada.svg',
        iconSize: [30,30],
        iconAnchor: [15,30]
        })

     $('.leaflet-container').css('cursor','crosshair');

    paradas();

    map.on('dblclick', onMapClick);

    function onMapClick(e) {

                    var modulo = document.getElementById("modulo").value;
                    var ruta = document.getElementById("ruta").value;
                    var modalidad = document.getElementById("modalidad").value;
                    var origendestino = document.getElementById("origendestino").value ;
                    var nombres = prompt("Ubicacion?");
                    var cruce = prompt("Nombre del Contacto?");
                    var latitud= e.latlng.lat;
                    var longitud= e.latlng.lng;

                    var data="nombres=" + nombres + "<br> cruce=" + cruce +"<br> modulo=" +modulo + "<br> ruta=" +ruta +"<br> modalidad=" +modalidad +"<br> origendestino=" +origendestino +"<br> latitud=" +e.latlng.lat +"<br> longitud=" + e.latlng.lng ;

            $.ajax({
            type: 'POST',
            url:  localizacion + 'accion.php',
            data: {modulo: modulo, ruta: ruta, modalidad: modalidad, origendestino: origendestino, nombres:nombres, cruce:cruce, longitud: longitud,latitud: latitud},
            success: function() {  actualizajson();  actualizatabla(); paradas();},
            error: function()   { alert("Error");   }
                   });

                    }


       function actualizajson() {
            var tabla = $.ajax({
                url: localizacion + 'creajson.php',
                dataType:'text',
                async:false
            }).responseText;
                }

       function actualizatabla() {
            var tabla = $.ajax({
                url: localizacion + 'listar.php',
                dataType:'text',
                async:false
            }).responseText;
            document.getElementById("Tabla").innerHTML = tabla;
                }

        function paradas() {
          $.ajax({
               type:"GET",
              url: localizacion + 'report/clientes.json',
               contentType : "application/json; charset=utf-8",
              dataType:"json",
            success: function(data){
                $.each(data,function(i,e) {

                  $modulo = e.modulo;
                  $ruta= e.ruta;
                  $modalidad= e.modalidad;
                  $origendestino= e.origendestino;
                  $nombres= e.nombres;
                  $cruce= e.cruce;

                 var marker= L.marker([e.latitud,e.longitud], {icon:iconParada}).bindPopup('Distrito:' + $modulo + '   <br>Seccion:' + $ruta + '<br>Actividad :' + $modalidad +'<br>Ubicacion: '+ $origendestino + '<br><b>Brigada :</b> '+$nombres+ ' Autorizacion: '+ $cruce+'<br>' ).addTo(map);

                });

            },
            failure: function (data) {
            },
            error: function (data) {
              }
             });
            }

        </script>

     <div id="Tabla"></div>

 </div>

  <div id="footer" class="color7"><br><div class="container">Registro de eventos de campaña</div><br></div>

 </body>

</html>
