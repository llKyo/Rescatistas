<?php
  require_once "../db.php";
  $id = $_POST["id"];
  $sql = "DELETE FROM rescatistas"
         . " WHERE id=$id";
  query($sql);

  $respuesta = new stdClass();
  $respuesta->resultado = true;
  $respuesta->mensaje = "Registro eliminado";
  echo json_encode($respuesta);
