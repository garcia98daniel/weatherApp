<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Clima</title> 
</head>
<body>
<!--Menú-->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="#">MiClima</a>


      <!--Elementos del menú-->
      <div class="navbar-collapse">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link" href="http://miclima.local/clima">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://miclima.local/prevision">Mis previsiones</a>
          </li>
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

<!--Editar usuario-->
    <?php 
        if(isset($_GET['e'])){
            echo '<p>Editar usuario '.$_GET['e'].':</p>';
            ?>
                <form action="/listado" method="GET">
                    <input type="hidden" value="<?php echo $_GET['e']; ?>" name="edit">
                    <input type="text" placeholder='Nombre' name="nombre">
                    <input type="email" placeholder='Correo' name="correo">
                    <input type="text" placeholder='Ubicacion' name="ubicacion"><br>
                    Admin: <input type="checkbox" name="admin"><br>
                    <input type="submit" name="update" value="Actualizar">
                </form>
            <?php
        }
    ?>
    <table class="table">
        <tbody class="table-primary">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Ubicación</th>
            <th>Admin</th>
            <th>Borrar</th>
            <th>Editar</th>
        </tr>
        
    <!--Editar y borrar usuario-->    


@foreach ($usuarios as $v) 
       
       <tr>
            <td>{{$v->name}}</td>

            <td>{{$v->email}}</td>
            <td>{{$v->ubicacion}}</td>
            <td>{{$v->admin}}</td>
            <td><a href="/borrar/usuario/{{$v->id}}">Borrar</a></td>
            <td><a href="/editar/usuario/{{$v->id}}">Editar</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>

</body>
