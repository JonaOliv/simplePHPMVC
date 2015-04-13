<?php
require_once("libs/template_engine.php");
require_once("models/usuarios.model.php");

mw_setEstaLogueado($userName, false);
header("Location:index.php"."?page=home");
die();
?>