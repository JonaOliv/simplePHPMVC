<?php
/* Empresas Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/donaciones.model.php");

  function run(){
    $bool=mw_estaLogueado();
    $donaciones = array();
    $donaciones = obtenerDonaciones();
    renderizar("donaciones", array("donaciones" => $donaciones));
  }

  run();
?>