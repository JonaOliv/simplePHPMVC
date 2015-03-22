<?php

  require_once("libs/template_engine.php");

  require_once("models/tipoAlmacen.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.
    
    /*
    SELECT `tipoAlmacen`.`tipoAlmId`,
    `tipoAlmacen`.`tipoAlmdsc`,
    `tipoAlmacen`.`tipoAlmest`
FROM `nw201501`.`tipoAlmacen`;
    */

    $htmlDatos = array();
    $htmlDatos["tipoalmacenTitle"] = "";
    $htmlDatos["tipoalmacenMode"] = "";
    $htmlDatos["tipoAlmId"] = "";
    $htmlDatos["tipoAlmdsc"]="";
    $htmlDatos["tipoAlmest"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["disabled"]="";


    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["tipoalmacenTitle"] = "Ingreso de Nuevo Tipo de Almacen";
          $htmlDatos["tipoalmacenMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarTipoAlmacen($_POST);
            if($lastID){
              redirectWithMessage("¡Tipo de Almacen Ingresado!","index.php?page=tipoalmacen&acc=upd&tipoAlmId=".$lastID);
            }else{

              mergeArrayTo($_POST, $_htmlDatos);

              $htmlDatos["actSelected"]=($_POST["tipoAlmest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["tipoAlmest"] =="INA")?"selected":"";
            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("tipoalmacen", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarTipoAlmacen($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Tipo de Almacen Actualizado!","index.php?page=tipoalmacen&acc=upd&tipoAlmId=".$_POST["tipoAlmId"]);
            }
          }
          if(isset($_GET["tipoAlmId"])){
            $tipoalmacen = obtenerTipoAlmacen($_GET["tipoAlmId"]);
            if($tipoalmacen){
              $htmlDatos["tipoalmacenTitle"] = "Actualizar ".$tipoalmacen["tipoAlmdsc"];
              $htmlDatos["tipoalmacenMode"] = "upd";

              // Esta funcion mergeArrayTo se encuentra en libs/utilities.php
              // utiliza parametros por referencia se usa para llenar los
              // datos comunes del primer arreglo segun llave en el segundo
              // si existen en el segundo. Asi podemos compiar los datos empresas directamente
              // en el arreglo htmlDatos sin tener que estar escribiendo cada asignación.

              mergeArrayTo($tipoalmacen , $htmlDatos);

              $htmlDatos["actSelected"]=($tipoalmacen["tipoAlmest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($tipoalmacen["tipoAlmest"] =="INA")?"selected":"";


              renderizar("tipoalmacen", $htmlDatos);
            }else{
              redirectWithMessage("¡Tipo de Almacen No Encontrado!","index.php?page=tipoalmacenes");
            }
          }else{
            redirectWithMessage("¡Tipo de Almacen No Encontrado!","index.php?page=tipoalmacenes");
          }
          break;
        //Manejando un delete
        case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(borrarTipoAlmacen($_POST["tipoAlmId"])){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Tipo de Almacen Borrado!","index.php?page=tipoalmacenes");
            }
          }
          $imborrable=sePuedeBorrar($_GET["tipoAlmId"]);
          if($imborrable){
            redirectWithMessage("¡Tipo de Almacen Imborrable, modifique el tipo en los almacenes!","index.php?page=tipoalmacenes");
          }else{
            $tipoalmacen = obtenerTipoAlmacen($_GET["tipoAlmId"]);
            if($tipoalmacen){
              $htmlDatos["tipoalmacenTitle"] = "Borrar ".$tipoalmacen["tipoAlmdsc"];
              $htmlDatos["tipoalmacenMode"] = "dlt";
  
              mergeArrayTo($tipoalmacen , $htmlDatos);
  
              $htmlDatos["actSelected"]=($tipoalmacen["tipoAlmest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($tipoalmacen["tipoAlmest"] =="INA")?"selected":"";
              $htmlDatos["disabled"]="disabled";
  
              renderizar("tipoalmacen", $htmlDatos);
            }else{
                redirectWithMessage("¡Tipo de Almacen No Encontrado!","index.php?page=tipoalmacenes");
            }
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=tipoalmacenes");
          break;
      }
    }


  }

  run();
?>
