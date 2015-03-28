<?php

  require_once("libs/template_engine.php");

  require_once("models/almacenes.model.php");

  /*

    SELECT almacenes.almId,
    almacenes.almdsc,
    almacenes.almrtn,
    (select tipoAlmacen.tipoAlmdsc from nw201501.tipoAlmacen where tipoAlmacen.tipoAlmId=almacenes.tipoAlmId) 'tipoAlmId',
    almacenes.almctd,
    almacenes.almdir,
    (select alm2.almdsc from nw201501.almacenes as alm2 where alm2.almId = almacenes.almSupAlm) 'almSupAlm',
    almacenes.almtel1,
    (select tipoMaterial.tipoMatdsc from nw201501.tipoMaterial where tipoMaterial.tipoMatId=almacenes.tipoMatId) 'tipoMatId',
    (select empresa.empdsc from nw201501.empresa where empresa.empresaId=almacenes.empresaId) 'empresaId'
FROM nw201501.almacenes;

*/
  
  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["almacenTitle"] = "";
    $htmlDatos["almacenMode"] = "";
    $htmlDatos["almId"] = "";
    $htmlDatos["almdsc"]="";
    $htmlDatos["almrtn"]="";
    $htmlDatos["tipoAlmId"]="";
    $htmlDatos["tipoAlmIdBox"]=obtenerTipoAlmacenes();
    $htmlDatos["almctd"]="";
    $htmlDatos["almdir"]="";
    $htmlDatos["almSupAlm"]="";
    $htmlDatos["almSupAlmBox"]= obtenerAlmacenes();
    $htmlDatos["almtel1"]="";
    //$htmlDatos["actSelected"]="selected";
    //$htmlDatos["inaSelected"]="";
    $htmlDatos["tipoMatId"]="";
    $htmlDatos["tipoMatIdBox"]= obtenerTipoMateriales();
    $htmlDatos["empresaId"]="";
    $htmlDatos["empresaIdBox"]=obtenerEmpresas();
    $htmlDatos["disabled"]="";


    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["almacenTitle"] = "Ingreso de Nuevo Almacen";
          $htmlDatos["almacenMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarAlmacen($_POST);
            if($lastID){
              redirectWithMessage("¡Almacen Ingresado!","index.php?page=almacen&acc=upd&almId=".$lastID);
            }else{

              mergeArrayTo($_POST, $_htmlDatos);
            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("almacen", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarAlmacen($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Almacen Actualizado!","index.php?page=almacen&acc=upd&almId=".$_POST["almId"]);
            }
          }
          if(isset($_GET["almId"])){
            $Almacen = obtenerAlmacen($_GET["almId"]);
            if($Almacen){
              $htmlDatos["almacenTitle"] = "Actualizar ".$Almacen["almdsc"];
              $htmlDatos["almacenMode"] = "upd";
              

              // Esta funcion mergeArrayTo se encuentra en libs/utilities.php
              // utiliza parametros por referencia se usa para llenar los
              // datos comunes del primer arreglo segun llave en el segundo
              // si existen en el segundo. Asi podemos compiar los datos empresas directamente
              // en el arreglo htmlDatos sin tener que estar escribiendo cada asignación.
                
              mergeArrayTo($Almacen , $htmlDatos);
              
              
              $htmlDatos["empresaIdBox"]=obtenerEmpresa($Almacen["empresaId"]);

              renderizar("almacen", $htmlDatos);
            }else{
              redirectWithMessage("¡Almacen No Encontrado!","index.php?page=almacenes");
            }
          }else{
            redirectWithMessage("¡Almacen No Encontrado!","index.php?page=almacenes");
          }
          break;
        //Manejando un delete
        case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(borrarAlmacen($_POST["almId"])){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Almacen Borrado!","index.php?page=almacenes");
            }
          }

          $imborrable=sePuedeBorrar($_GET["almId"]);
          if($imborrable){
            redirectWithMessage("¡Almacen Imborrable, modifique el tipo en los almacenes!","index.php?page=almacenes");
          }else{
            
            
            $Almacen = obtenerAlmacen($_GET["almId"]);
            if($Almacen){
              $htmlDatos["almacenTitle"] = "Borrar ".$Almacen["almdsc"];
              $htmlDatos["almacenMode"] = "dlt";
  
              mergeArrayTo($Almacen , $htmlDatos);
  /*
              $htmlDatos["actSelected"]=($empresa["empest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($empresa["empest"] =="INA")?"selected":"";
              $htmlDatos["srvSelected"]=($empresa["emptip"] =="SRV")?"selected":"";
              $htmlDatos["rtlSelected"]=($empresa["emptip"] =="RTL")?"selected":"";
              $htmlDatos["wrhSelected"]=($empresa["emptip"] =="WRH")?"selected":"";*/
              $htmlDatos["disabled"]="disabled";
  
              renderizar("almacen", $htmlDatos);
            }else{
                redirectWithMessage("¡Almacen No Encontrado!","index.php?page=almacenes");
            }
               
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=almacenes");
          break;
      }
    }


  }

  run();
?>
