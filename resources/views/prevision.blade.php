<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <meta charset="utf-8" />

    <title>Previsiones</title>    
    
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand" href="#">MiClima</a>

            <div class="navbar-collapse">
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://miclima.local/clima">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://miclima.local/ubicacionesVista">Ubicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Salir</a>
                    </li>
                </ul>
                <!--Nombre de usuario-->
                <!--<h1 class="badge-user">
                    <span class="badge badge-primary"><?php /*echo $_SESSION['usu'];*/ ?></span>
                </h1>-->
            </div>
        </nav>
    
<table class="table">
  <thead class="table-warning">
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Tiempo(Cº)</th>
      <th scope="col">Cielo</th>
       <th scope="col">Lat, Lon</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="table-primary">
    <tr>
       
        @foreach ($datos as $v) 
            
            <tr>
            <td>{{$v->fecha}}</td>

            <td>{{$v->hora}}</td>
            <td>{{$v->Temperatura  - 273.15}}</td>
            <td>{{$v->cielo}}</td>
            <td>{{$v->ubicacion}}</td>
            <td><a href="/prevision{{$v->id}}">Borrar</a></td>
            </tr>
        @endforeach
    </tr>
  </tbody>
</table>

</body>



