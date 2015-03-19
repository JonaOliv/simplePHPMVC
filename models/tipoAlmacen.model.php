<?php
    //modelo de datos de tipo de materiales
    /*
    SELECT `tipoAlmacen`.`tipoAlmId`,
    `tipoAlmacen`.`tipoAlmdsc`,
    `tipoAlmacen`.`tipoAlmest`
FROM `nw201501`.`tipoAlmacen`;

    */

    require_once("libs/dao.php");

    function obtenerTipoAlmacenes(){
        $TipoAlmacenes = array();
        $sqlstr = "select * from tipoAlmacen;";
        $TipoAlmacenes = obtenerRegistros($sqlstr);
        return $TipoAlmacenes;
    }


    function obtenerTipoAlmacen($TipoAlmacenID){
      $TipoAlmacen = array();
      $sqlstr = "select * from tipoAlmacen where tipoAlmId = %d;";
      $sqlstr = sprintf($sqlstr, $TipoAlmacenID);
      $TipoAlmacen = obtenerUnRegistro($sqlstr);
      return $TipoAlmacen;
    }

    function insertarTipoAlmacen($TipoAlmacen){
      if($TipoAlmacen && is_array($TipoAlmacen)){

         $sqlInsert = "INSERT INTO `tipoAlmacen` (`tipoAlmdsc`, `tipoAlmest`) VALUES ('%s', '%s');";
         $sqlInsert = sprintf($sqlInsert,
                        $TipoAlmacen["tipoAlmdsc"],
                        $TipoAlmacen["tipoAlmest"]
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarTipoAlmacen($TipoAlmacen){
      if($TipoAlmacen && is_array($TipoAlmacen)){
        $sqlUpdate = "update tipoAlmacen set tipoAlmdsc='%s', tipoAlmest='%s' where tipoAlmId=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                              valstr($TipoAlmacen["tipoAlmdsc"]),
                              valstr($TipoAlmacen["tipoAlmest"]),
                              valstr($TipoAlmacen["tipoAlmId"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }


    function borrarTipoAlmacen($TipoAlmacenID){
      if($TipoAlmacenID){
        $sqlDelete = "delete from tipoAlmacen where tipoAlmId=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($TipoAlmacenID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>