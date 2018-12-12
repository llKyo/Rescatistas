<?php

  require_once "../db.php";

  $nombre = $_POST["nombre"];
  $rut = $_POST["rut"];
  $rutRescatista = $_POST["rut_rescatista"];
  $edad = $_POST["edad"];
  $estado = $_POST["estado"];
  $descripcionSuceso = $_POST["descripcion_suceso"];
  $sql = "INSERT INTO rescates (nombre"
    .",rut,rut_rescatista,edad,estado,descripcion_suceso)"
    . " VALUES('$nombre','$rut'"
    .",'$rutRescatista',$edad,$estado,'$descripcionSuceso')";

  query($sql);
  $respuesta = new stdClass();
  $respuesta->resultado = true;
  echo json_encode($respuesta);
