<?php

  function iniciarSesion($usuario, $clave){
    $sql ="SELECT id,nombre,email,password FROM usuarios"
        ." WHERE email='$usuario' AND password='$clave'";
    $query = query($sql);
    $usuarioLogueado = null;
    if($rs = mysqli_fetch_array($query)){
       $usuarioLogueado = new stdClass();
       $usuarioLogueado->id=$rs["id"];
       $usuarioLogueado->nombre = $rs["nombre"];
       $usuarioLogueado->email = $rs["email"];
       $usuarioLogueado->password = $rs["password"];
    }
    return $usuarioLogueado;
  }


  function conectar(){
    $servidor = "localhost"; //ip del servidor
    $password = "skynux1234#";
    $usuario = "root";
    $bd = "rescatistasBase";
    $link = mysqli_connect($servidor
      ,$usuario, $password, $bd);
    return $link;
  }

  function desconectar($link){
     mysqli_close($link);
  }

  function query($sql){
     $link = conectar();
     //Si el $sql es INSERT,UPDATE o DELETE
     // devuelve La cantidad de filas afectadas
     // Sino (en el caso de SELECT)
     // devuelve los registros producto del SELECT
     // El retorno es polimorfico
     return mysqli_query($link, $sql);
  }
