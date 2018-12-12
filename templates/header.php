<?php
   session_start();
   if(!isset($_SESSION["usuario"]) ){ // no hay sessión activa?
     header("Location:login.php");
     exit();
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

    <title>Admin Rescatistas</title>
  </head>
  <body>
    <header class="bg-dark text-white text-center">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class='nav-item <?php echo $activa == "home"?"active":""; ?>'>
              <a class="nav-link" href="index.php">Admin Rescatistas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo $activa == "rescates"?"active":""; ?>">
              <a class="nav-link" href="rescates.php">Admin Rescates</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cerrar_sesion.php">Cerrar Sesión</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
