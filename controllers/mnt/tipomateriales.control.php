<?php
  require_once("libs/template_engine.php");

  require_once("models/tipoMateriales.model.php");

  function run(){
    $tipomateriales = array();
    $tipomateriales = obtenerTipoMateriales();
    renderizar("tipomateriales", array("tipomateriales" => $tipomateriales));
  }

  run();
?>