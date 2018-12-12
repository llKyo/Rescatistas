<?php

  require_once "../db.php";
  //Arreglos super globales
//  $_GET -> Obtener datos de una petición GET
//  $_POST -> Obtener datos enviados desde un form (petición POST)
//  $_REQUEST -> $_POST + $_GET
//  $_FILES -> Recibir contenido binario (archivos)
//  $_SESSION->administración de la sesión del usuario
  //Arreglos asociativos
  $nombre = $_POST["nombre"]; //Propenso a SQL Injection
  $curso = $_POST["curso"];
  $rut = $_POST["rut"];
  //Para simular peticiones POST, extension Google Chrome
  //PostMan
  $sql = "INSERT INTO rescatistas(nombre,curso,rut)"
        ." VALUES ('$nombre',$curso,'$rut')";
  query($sql);

  $respuesta = new stdClass();
  $respuesta->resultado = true;
  $respuesta->mensaje = "Rescatista ingresado";
  echo json_encode($respuesta);
