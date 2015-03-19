<?php

  require("./models/empresas.model.php");
  require("./models/tipoMateriales.model.php");
  require("./models/tipoAlmacen.model.php");
  /*
  $Empresa=array();
  $Empresa["empdsc"] = "La antorcha";
  $Empresa["emprtn"] = "2450-982345098";
  $Empresa["empdir"] = "ASdasdf asdf asdfklj Honduras";
  $Empresa["emptel"] = "12341234134";
  $Empresa["emptel2"] = "123412342345";
  $Empresa["empurl"] = "http://someurl.com.hn";
  $Empresa["empusring"] = "obtancourthunicah@gmail.com";
  $Empresa["empest"] ="ACT";
  $Empresa["empctc"] = "Somebody";
  $Empresa["emptip"] = "RTL";
  $Empresa["empresaId"] = 3;

  echo actualizarEmpresa($Empresa)."</br>";
  print_r(obtenerEmpresa(3));*/
  
  //echo insertarEmpresa($Empresa);
  //print_r(obtenerEmpresas());
  /*
  $TipoMaterial=array();
  $TipoMaterial["tipoMatdsc"]="madera";
  $TipoMaterial["tipoMatest"]="ACT";*/
/*
  echo insertarTipoMaterial($TipoMaterial)."</br>";
  //print_r(obtenerTipoMaterial(3));
  print_r(obtenerEmpresas());*/

  $TipoAlmacen=array();
  $TipoAlmacen["tipoAlmdsc"]="Madera de roble";
  $TipoAlmacen["tipoAlmest"]="ACT";
  $TipoAlmacen["tipoAlmId"]=2;
  /*
  echo insertarTipoAlmacen($TipoAlmacen)."</br>";
  print_r(obtenerTipoAlmacen(1));*/
  
  echo actualizarTipoAlmacen($TipoAlmacen)."</br>";
  print_r(obtenerTipoAlmacen(2));
?>
