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
    <p>Editar usuario</p>
    <form action="/actualizar/usuario" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        Admin: 
        <input type="text" placeholder='{{$usuario->admin}}' value='{{$usuario->admin}}' name="admin"><br>
        <input type="hidden" value="{{$usuario->id}}" name="userId">
        <input type="text" placeholder='{{$usuario->name}}' value='{{$usuario->name}}' name="name">
        <input type="email" placeholder='{{$usuario->name}}' value='{{$usuario->email}}' name="email">
        <input type="text" placeholder='{{$usuario->name}}' value='{{$usuario->ubicacion}}' name="ubicacion"><br>
        <input type="submit" name="update" value="Actualizar">
        @method('PATCH') 
    </form>

</body>
