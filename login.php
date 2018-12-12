<?php
    require_once "api/db.php";
    //Laracast: investigar Laravel
    //Views, Controller, Model
    //Angular, React javascript, Vue JS
    // como hacer plugin con jQuery
    session_start();//para guardar en sesión necesito esta linea
    if(count($_POST) > 0){ // hay algo en la petición POST?
      $correo = $_POST["correo"];
      $clave = sha1($_POST["clave"]);
      $usuario = iniciarSesion($correo,$clave);
      if($usuario != null){
        $_SESSION["usuario"] = $usuario;
        header("Location:index.php"); //location.href="index.php" javascript
        exit();
      } else {
        $error = "Error de Inicio de Sesión";
      }

    }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Iniciar Sesión</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="mx-auto col-lg-6 col-md-6 col-sm-12">
          <?php
               if(isset($error)){
                 ?>
                 <div class="alert alert-danger">
                   <span>Error de Acceso</span>
                 </div>
                 <?php
               }

           ?>
          <form  action="" method="post">
            <div class="card">
              <div class="card-header">
                <span>Ingrese sus credenciales</span>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="correo">Correo</label>
                  <input type="email" class="form-control" name="correo" value="">
                </div>
                <div class="form-group">
                  <label for="clave">Clave</label>
                  <input type="password" class="form-control"
                    name="clave" value="">
                </div>
                <button type="submit"
                  class="btn btn-primary"
                  name="ingresar_btn">Iniciar Sesión</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    <?php require_once "templates/scripts.php"; ?>

  </body>
</html>
