<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Iniciar sesion</title> 

<div class="row">
    <div class="col-md-12">

            
            <!--Header-->
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <a class="navbar-brand">Inicia sesión</a>
            </nav>

            <div class="row">
                <div class="w-450px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

                    <!--Formulario-->
                    <form class="form w-100" method="POST" enctype="multipart/form-data" action="login">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <img src="img/miclima-logo.webp"></img>
                        <br>
                        <div class="fv-row mb-10">

                            <label name="Usuario" type="text" class="form-label fs-5 fw-bolder text-dark">Usuario</label>

                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control form-control-lg fs-5 form-control-solid" id="name" type="text" name="name" autocomplete="off" required="required" autofocus="autofocus">

                        </div>
                        <br>
                        <div class="fv-row mb-10">

                            <label for="password" type="password" class="form-label fs-5 fw-bolder text-dark">Password</label>

                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control form-control-lg fs-5 form-control-solid" id="password" type="password" name="password" autocomplete="off" required="required" autofocus="autofocus">

                        </div>                    


                        <div class="text-center btn-group mt-5 d-flex justify-content-center align-items-center">

                            <input type="submit" class="btn btn-lg btn-newprimary  mb-4" name="Enviar" value="Log in">

                        </div>

                        <div class="text-center mt-4 mb-2">

                            <!-- Volver al login -->
                            <div class="text-grey fs-5 ">¿No tiene cuenta?
                                <a href="http://miclima.local/register">Registrate</a>
                            </div>

                        </div>

                    </form>


                </div>
            </div> 
        </div>
</div> 