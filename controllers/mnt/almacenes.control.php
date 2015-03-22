<?php
  require_once("libs/template_engine.php");

  require_once("models/almacenes.model.php");

  function run(){
    $almacenes = array();
    $almacenes = obtenerAlmacenes();
    renderizar("almacenes", array("almacenes" => $almacenes));
  }

  run();
?>