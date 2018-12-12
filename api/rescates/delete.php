<?php
  require_once "../db.php";

  $id = $_POST["id"];

  $sql = "DELETE FROM rescates WHERE id=$id";

  query($sql);

  $respuesta = new stdClass();
  $respuesta->resultado = true;
  echo json_encode($respuesta);
