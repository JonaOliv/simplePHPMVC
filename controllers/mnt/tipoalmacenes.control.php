<?php
  require_once("libs/template_engine.php");
  require_once("models/tipoAlmacen.model.php");

  function run(){
    $tipoalmacenes = array();
    $tipoalmacenes = obtenerTipoAlmacenes();
    renderizar("tipoalmacenes", array("tipoalmacenes" => $tipoalmacenes));
  }

  run();
?>