<?php

  require_once "../db.php";
  $sql = "SELECT id,nombre,rut_rescatista,rut,edad,estado,descripcion_suceso"
        . " FROM rescates";

  $query = query($sql);
  $rescates = array();
  while($rs = mysqli_fetch_array($query)){
      $rescate = new stdClass();
      $rescate->id = $rs["id"];
      $rescate->nombre = $rs["nombre"];
      $rescate->rut_rescatista = $rs["rut_rescatista"];
      $rescate->edad = $rs["edad"];
      $rescate->estado = $rs["estado"];
      $rescate->rut = $rs["rut"];
      $rescate->descripcion_suceso = $rs["descripcion_suceso"];
      array_push($rescates, $rescate);
  }

  echo json_encode($rescates);
