<?php
//Esto no lo intente en casa
//echo sha1("zacatac");
$activa = "home";
require_once "templates/header.php"; ?>
    <section class="container-fluid mt-5">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <span>Ingresar Rescatista</span>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" class="form-control" >
              </div>
              <div class="form-group">
                <label for="rut">Rut</label>
                <input type="text" id="rut" class="form-control" >
              </div>
              <div class="form-group">
                <label for="curso_rendido">Curso Rendido</label>
                <select class="form-control" id="curso_rendido">
                  <option value="1">Rendido</option>
                  <option value="0">No Rendido</option>
                </select>
              </div>
              <button type="button"
                class="btn btn-info"
                id="ingresar_btn">Ingresar</button>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <table class="tabla_rescatistas table table-hovered">
            <thead class="bg-dark text-white">
              <tr>
                <th>Rut</th><th>Nombre</th><th>Curso Rendido</th><th>Acciones</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </section>
    <?php require_once "templates/scripts.php"; ?>
    <script type="text/javascript" src="js/main.js">
    </script>
  </body>
</html>
