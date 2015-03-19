<?php
    //modelo de datos de empresa
    /*
    `empresaId`
    `empdsc`
    `emprtn`
    `empdir`
    `emptel`
    `emptel2`
    `empurl`
    `empfching`
    `empusring`
    `empest`
    `empctc`
    `emptip`

    CREATE TABLE `nw201501`.`almacenes` (
  `almId` bigint(10) NOT NULL AUTO_INCREMENT,
  `almdsc` varchar(45) COLLATE utf8_bin NOT NULL,
  `almrtn` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `tipoAlmId` bigint(10) COLLATE utf8_bin DEFAULT NULL,
  `almctd` bigint(10) COLLATE utf8_bin DEFAULT NULL,
  `almdir` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `almSupAlm` bigint(10) COLLATE utf8_bin DEFAULT NULL,
  `almtel1` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `tipoMatId` bigint(10) COLLATE utf8_bin DEFAULT NULL,
  `empresaId` bigint(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`empresaId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


    */
    /*
    SELECT `almacenes`.`almId`,
    `almacenes`.`almdsc`,
    `almacenes`.`almrtn`,
    `almacenes`.`tipoAlmId`,
    `almacenes`.`almctd`,
    `almacenes`.`almdir`,
    `almacenes`.`almSupAlm`,
    `almacenes`.`almtel1`,
    `almacenes`.`tipoMatId`,
    `almacenes`.`empresaId`
FROM `nw201501`.`almacenes`;
    */

    require_once("libs/dao.php");

    function obtenerAlmacenes(){
        $Almacenes = array();
        $sqlstr = "select * from almacenes;";
        $Almacenes = obtenerRegistros($sqlstr);
        return $Almacenes;
    }


    function obtenerEmpresa($AlmacenID){
      $Almacen = array();
      $sqlstr = "select * from almacenes where almId = %d;";
      $sqlstr = sprintf($sqlstr, $AlmacenID);
      $Almacen = obtenerUnRegistro($sqlstr);
      return $Almacen;
    }

    function insertarEmpresa($Almacen){
      if($Almacen && is_array($Almacen)){

         $sqlInsert = "INSERT INTO `almacenes` (`almdsc`, `almrtn`, `tipoAlmId`, `almctd`, `almdir`, `almSupAlm`, `almtel1`, `tipoMatId`, `empresaId`) VALUES ('%s', '%s', %d, %d, '%s', %d, '%s', %d, %d);";
         $sqlInsert = sprintf($sqlInsert,
                        $Almacen["almdsc"],
                        $Almacen["almrtn"],
                        $Almacen["tipoAlmId"],
                        $Almacen["almctd"],
                        $Almacen["almdir"],
                        $Almacen["almSupAlm"],
                        $Almacen["almtel1"],
                        $Almacen["tipoMatId"],
                        $Almacen["empresaId"]
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarEmpresa($Almacen){
      if($Almacen && is_array($Almacen)){
        $sqlUpdate = "update almacenes set almdsc='%s', almrtn='%s', tipoAlmId=%d, almctd=%d, almdir='%s' , almSupAlm=%d, almtel1='%s', tipoMatId=%d, empresaId=%d where almId=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                              valstr($Almacen["almdsc"]),
                              valstr($Almacen["almrtn"]),
                              valstr($Almacen["tipoAlmId"]),
                              valstr($Almacen["almctd"]),
                              valstr($Almacen["almdir"]),
                              valstr($Almacen["almSupAlm"]),
                              valstr($Almacen["almtel1"]),
                              valstr($Almacen["tipoMatId"]),
                              valstr($Almacen["empresaId"]),
                              valstr($Almacen["almId"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }


    function borrarEmpresa($AlmacenID){
      if($AlmacenID){
        $sqlDelete = "delete from Empresa where empresaid=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($AlmacenID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>