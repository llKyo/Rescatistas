<?php
$activa = "rescates";
require_once "templates/header.php"; ?>
    <section class="container-fluid mt-5">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="errores">

          </div>
          <div class="card">
            <div class="card-header bg-info text-white">
              <span>Ingresar Rescate</span>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="rut">Rut</label>
                <input type="text" class="form-control" id="rut" value="">
              </div>
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" value="">
              </div>
              <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" class="form-control" id="edad" value="">
              </div>
              <div class="form-group">
                <label for="rescatista">Rescatista</label>
                <select class="form-control"  id="rescatista">

                </select>
              </div>
              <div class="form-group">
                <label for="estado">Estado del Afectado</label>
                <select class="form-control" id="estado">
                  <option value="0">Normal</option>
                  <option value="1">Grave</option>
                  <option value="2">Riesgo Vital</option>
                </select>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción del Suceso</label>
                <textarea id="descripcion"
                  class="form-control"
                rows="8" cols="80"></textarea>
              </div>
              <button type="button"
                  class="btn btn-info"
                  id="ingresar_rescate">Ingresar</button>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <table class="tabla_rescates table table-hovered table-striped">
            <thead class="bg-primary text-white">
              <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </section>
    <?php require_once "templates/scripts.php"; ?>
    <script type="text/javascript" src="js/rescates.js">
    </script>
  </body>
</html>
