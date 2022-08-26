<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Clima</title> 
<!--Menú-->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="#">MiClima</a>


      <!--Elementos del menú-->
      <div class="navbar-collapse">
        <ul class="navbar-nav ">

          <li class="nav-item">
            <a class="nav-link" href="prevision">Mis previsiones</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="http://miclima.local/ubicacionesVista">Ubicaciones</a>
          </li>
           @if(auth()->user()->admin == 1)
              <li class="nav-item"><a class="nav-link" href="listado">Listado usuarios</a></li>
            @endif
           <li class="nav-item">
            <a class="nav-link" href="/logout">Salir</a>
          </li>
        </ul>
         <!--Nombre de usuario-->
        <h1 class="badge-user">
          <span class="badge badge-primary">{{auth()->user()->name}}</span> 
        </h1>
      </div>
    </nav>


    <div class="header bg-dark">
        <div class="azul">

    <!--Google maps-->
    <div id="map-container-google-1" class="z-depth-1-half map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3075.6278769285063!2d2.6649103152978744!3d39.567997514741194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x129793b01716a01b%3A0x55bc574de040df4a!2sCIFP%20Francesc%20de%20Borja%20Moll!5e0!3m2!1ses!2sus!4v1656327791672!5m2!1ses!2sus" frameborder="0"
         allowfullscreen></iframe>
    </div>

<!--API Meteorologia-->

    <?php
            $_POST["humedad"]="";
            $_POST["presion"]="";
            $_POST["cielo"]="";
            $_POST["temp"]="";
            $Celsius = "";
            
            if(isset($_GET['EnviarC'])){
                
                $APIkey = "04d939a8a1d22c9a2ef172d82e0dcc7b";
                $lat = $_GET['lat'];
                $lon = $_GET['lon'];
                $s = 'https://api.openweathermap.org/data/2.5/onecall?lat='.$lat.'&lon='.$lon.'&appid='.$APIkey;
                $response = Http::post($s);
                $_POST["temp"] = $response["current"]["temp"];
                $_POST["humedad"] = $response["current"]["humidity"];
                $_POST["presion"] = $response["current"]["pressure"];
                $_POST["cielo"] = $response["current"]["weather"][0]['description'];
                
                $Kelvin=intval($_POST["temp"]);
                $Celsius=$Kelvin - 273.15;
            }
                      
            
        ?>
    
<!--Buscador meteorologico-->
<h1>Introduce las cordenadas del punto exacto donde quieras saber el tiempo</h1>
<br>
<div class="container-inputs">
    <form action="/clima" class="form-group" method="GET">
        <input class="form-control" type="text" name="lat" placeholder="Latitud">
        <input class="form-control" type="text" name="lon" placeholder="Longitud">
        <br>
        <input class="btn btn-warning" type="submit" name="EnviarC" value="Buscar">
    </form>  
</div>
    <div>
    
        <p>Temperatura: <?php echo $Celsius?> ºC</p>
        <p>Presión: <?php echo $_POST["presion"]?> mbar</p>
        <p>Humedad: <?php echo $_POST["humedad"]?> %</p>
        <p>Cielo: <?php echo $_POST["cielo"] ?></p>
        <form action="/clima" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
             <input type="hidden" name="temperatura" value="<?php echo $_POST["temp"]?>">
             <input type="hidden" name="cielo" value="<?php echo $_POST["cielo"]?>">
             <input type="hidden" name="ubicacion" value="<?php if(isset($_GET["lat"])){echo $_GET["lat"].", ".$_GET["lon"];}?>"> 
            <input  class="btn btn-warning" type="submit" name="Guardar" value="Guardar">
        </form>
    </div>
</div>

    <div class="container hero">
       <div class="funcionamiento">
                    <h1>Funcionamiento de la aplicación</h1>
                    <div class="azul"> </div>
                    <div class="amarillo"> </div>
                </div>
    </div>
        <br>
            <p>Abrir el Google Maps desde el mapa de la web (Ampliar el mapa)<p>
    
            <p>Buscar el lugar de donde queremos saber el tiempo y apretamos click derecho sobre el mapa</p>
    
            <p>Copiar las coordenadas</p>
    
            <p>Copiarlas en el buscador de la web</p>
            
            <br>
</div>
    
<!-- Footer -->
    <footer class="bg-warning">
      <div class="container py-3">
        <div class="row py-3">
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

              <img src="img/miclima-logo.webp"></img>
              
              <p class="text-muted mb-0 py-2">© 2022 Miquel Calafell. All rights reserved.</p>
          </div>
        

            <div class="col-lg-2 col-md-6 ">
                <h6 class="text-uppercase font-weight-bold mb-4"><a href="http://miclima.local/prevision">Previsiones</a></h6>
            </div>

            <div class="col-lg-2 col-md-6 ">
                <h6 class="text-uppercase font-weight-bold mb-4"><a href="http://miclima.local/api">API</a></h6>
            </div>

            <div class="col-lg-2 col-md-6 ">
                <h6 class="text-uppercase font-weight-bold mb-4"><a href="/logout">Salir</a></h6>
            </div>
            
        </div>
      </div>
    
     
    <!-- End -->
</body>        


<!-- CSS -->
<style>
.map-container{
  overflow:hidden;
  padding-bottom:50%;
  position:relative;
  height:0;
}
.map-container iframe{
  left:0;
  top:0;
  height:80%;
  width:100%;
  position:absolute;
}

body {
    color: antiquewhite;
    text-align: center;
}

div.azul {
    background-color: #0058B5;
    padding: 1%;
}

div.amarillo {
    background-color: #FFBC00;
    padding: 1%;
}

.container-inputs {
    margin-left: 20%;
    margin-right: 20%;
}

.funcionamiento {
    margin-left: 12px;
}

img {
    height: 50%;
    width: 20%;
}
 
</style>

