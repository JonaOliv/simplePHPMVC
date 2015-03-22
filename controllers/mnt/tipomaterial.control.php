<?php

  require_once("libs/template_engine.php");

  require_once("models/tipoMateriales.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.
    
    /*
    SELECT `tipoMaterial`.`tipoMatId`,
    `tipoMaterial`.`tipoMatdsc`,
    `tipoMaterial`.`tipoMatest`
FROM `nw201501`.`tipoMaterial`;
    */

    $htmlDatos = array();
    $htmlDatos["tipomaterialTitle"] = "";
    $htmlDatos["tipomaterialMode"] = "";
    $htmlDatos["tipoMatId"] = "";
    $htmlDatos["tipoMatdsc"]="";
    $htmlDatos["tipoMatest"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["disabled"]="";


    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["tipomaterialTitle"] = "Ingreso de Nuevo Tipo de Material";
          $htmlDatos["tipomaterialMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarTipoMaterial($_POST);
            if($lastID){
              redirectWithMessage("¡Tipo de material Ingresado!","index.php?page=tipomaterial&acc=upd&tipoMatId=".$lastID);
            }else{

              mergeArrayTo($_POST, $_htmlDatos);

              $htmlDatos["actSelected"]=($_POST["tipoMatest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["tipoMatest"] =="INA")?"selected":"";
            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("tipomaterial", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarTipoMaterial($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Tipo de material Actualizado!","index.php?page=tipomaterial&acc=upd&tipoMatId=".$_POST["tipoMatId"]);
            }
          }
          if(isset($_GET["tipoMatId"])){
            $tipomaterial = obtenerTipoMaterial($_GET["tipoMatId"]);
            if($tipomaterial){
              $htmlDatos["tipomaterialTitle"] = "Actualizar ".$tipomaterial["tipoMatdsc"];
              $htmlDatos["tipomaterialMode"] = "upd";

              // Esta funcion mergeArrayTo se encuentra en libs/utilities.php
              // utiliza parametros por referencia se usa para llenar los
              // datos comunes del primer arreglo segun llave en el segundo
              // si existen en el segundo. Asi podemos compiar los datos empresas directamente
              // en el arreglo htmlDatos sin tener que estar escribiendo cada asignación.

              mergeArrayTo($tipomaterial , $htmlDatos);

              $htmlDatos["actSelected"]=($tipomaterial["tipoMatest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($tipomaterial["tipoMatest"] =="INA")?"selected":"";


              renderizar("tipomaterial", $htmlDatos);
            }else{
              redirectWithMessage("¡Tipo de material No Encontrado!","index.php?page=tipomateriales");
            }
          }else{
            redirectWithMessage("¡Tipo de material No Encontrado!","index.php?page=tipomateriales");
          }
          break;
        //Manejando un delete
        case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(borrarTipoMaterial($_POST["tipoMatId"])){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Tipo de material Borrado!","index.php?page=tipomateriales");
            }
          }
          $imborrable=sePuedeBorrar($_GET["tipoMatId"]);
          if($imborrable){
            redirectWithMessage("¡Tipo de material Imborrable, modifique el tipo en los almacenes!","index.php?page=tipomateriales");
          }else{
            $tipomaterial = obtenerTipoMaterial($_GET["tipoMatId"]);
            if($tipomaterial){
              $htmlDatos["tipomaterialTitle"] = "Borrar ".$tipomaterial["tipoMatdsc"];
              $htmlDatos["tipomaterialMode"] = "dlt";
  
              mergeArrayTo($tipomaterial , $htmlDatos);
  
              $htmlDatos["actSelected"]=($tipomaterial["tipoMatest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($tipomaterial["tipoMatest"] =="INA")?"selected":"";
              $htmlDatos["disabled"]="disabled";
  
              renderizar("tipomaterial", $htmlDatos);
            }else{
                redirectWithMessage("¡Tipo de material No Encontrado!","index.php?page=tipomateriales");
            }
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=tipomateriales");
          break;
      }
    }


  }

  run();
?>
