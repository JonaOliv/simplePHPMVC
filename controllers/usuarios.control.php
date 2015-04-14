<?php
/* Empresas Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/usuarios.model.php");

  function run(){
    $bool=mw_estaLogueado();
    $usuarios = array();
    $usuarios = obtenerUsuarios();
    renderizar("usuarios", array("usuarios" => $usuarios));
  }

  run();
?>