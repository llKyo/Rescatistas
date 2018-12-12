<?php
  require_once "../db.php";

  $sql = "SELECT id, rut,nombre, curso FROM rescatistas";
  //ejecuta la consulta con el SQL
  $query = query($sql); // resultset
  $rescatistas = array();
  while($rs = mysqli_fetch_array($query)){
     $rescatista = new stdClass();
     $rescatista->nombre = $rs["nombre"];
     $rescatista->id = $rs["id"];
     $rescatista->rut = $rs["rut"];
     $rescatista->curso = $rs["curso"];
     array_push($rescatistas,$rescatista);
}
echo json_encode($rescatistas);
