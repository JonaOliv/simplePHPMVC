<?php
/* Empresas Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/mensualidades.model.php");

  function run(){
    $bool=mw_estaLogueado();
    $mensualidades = array();
    $mensualidades = obtenerMensualidades();
    renderizar("mensualidades", array("mensualidades" => $mensualidades));
  }

  run();
?>