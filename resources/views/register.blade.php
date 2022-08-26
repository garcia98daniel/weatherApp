<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Registro</title> 


<div class="row">
    <div class="col-md-12">
     
            <!--Header-->
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <a class="navbar-brand">Registrate</a>
            </nav>

            <div class="row">

                <div class="w-350px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

                    <img src="img/miclima-logo.webp"></img>                   
                    
                    <!--Formulario-->   
                    <form class="form w-100" method="POST" action="register">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   

                        <div class="fv-row mb-10">

                            <label for="name" type="text" class="form-label fs-5 fw-bolder text-dark">Usuario</label>

                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control form-control-lg fs-5 form-control-solid" id="name" type="text" name="Usuario" required="required" autofocus="autofocus">

                        </div>

                        <div class="fv-row mb-10">

                            <label for="email" type="email" class="form-label fs-5 fw-bolder text-dark">Email</label>

                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control form-control-lg fs-5 form-control-solid" id="email" type="email" name="Email" required="required" autofocus="autofocus">

                        </div>                    

                        <div class="fv-row mb-10">

                            <label for="password" type="password" class="form-label fs-5 fw-bolder text-dark">Constraseña</label>

                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control form-control-lg fs-5 form-control-solid" id="password" type="password" name="Password" required="required" autofocus="autofocus">

                        </div>

                        <div class="fv-row mb-10">

                            <label for="Ubicacion" type="text" class="form-label fs-5 fw-bolder text-dark">Ubicación</label>

                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control form-control-lg fs-5 form-control-solid" id="ubicacion" type="text" name="Ubicacion" required="required" autofocus="autofocus">

                        </div>


                        <div class="text-center btn-group mt-5 d-flex justify-content-center align-items-center">                           
                            <input type="submit" class="btn btn-lg btn-newprimary  mb-4" value="Registrarse" name="Enviar">

                        </div>

                        <div class="text-center mt-4 mb-2">

                            <!-- Volver al login -->
                            <div class="text-grey fs-5 ">¿Ya tiene cuenta?
                                <a href="http://misclima.local/">Inicie Sesión</a>
                            </div>

                        </div>

                    </form>


                </div>
            </div> 
    </div>
</div>