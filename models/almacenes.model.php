<?php
    /*

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
  PRIMARY KEY (`almId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


    */
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

    require_once("libs/dao.php");
    //La de otros modelos
    function obtenerTipoAlmacenes(){
        $TipoAlmacenes = array();
        $sqlstr = "select * from tipoAlmacen;";
        $TipoAlmacenes = obtenerRegistros($sqlstr);
        return $TipoAlmacenes;
    }
    
    function obtenerTipoMateriales(){
        $TipoMateriales = array();
        $sqlstr = "select * from tipoMaterial;";
        $TipoMateriales = obtenerRegistros($sqlstr);
        return $TipoMateriales;
    }
    
    function obtenerEmpresas(){
        $Empresas = array();
        $sqlstr = "select * from empresa;";
        $Empresas = obtenerRegistros($sqlstr);
        return $Empresas;
    }
    
    function obtenerTipoAlmacen($ID){
        $TipoAlmacenes = array();
        $sqlstr = "select * from tipoAlmacen;";
        $TipoAlmacenes = obtenerRegistros($sqlstr);
        
        for($i=0; $i<count($TipoAlmacenes); $i++){
            if($TipoAlmacenes[$i]["tipoAlmId"]==$ID){
                $TipoAlmacenes[$i]["Selected"]="Selected";
            }else{
                $TipoAlmacenes[$i]["Selected"]="";
            }
            
        }
        
        return $TipoAlmacenes;
    }
    
    function obtenerTipoMaterial($ID){
        $TipoMateriales = array();
        $sqlstr = "select * from tipoMaterial;";
        $TipoMateriales = obtenerRegistros($sqlstr);
        
        for($i=0; $i<count($TipoMateriales); $i++){
            if($TipoMateriales[$i]["tipoMatId"]==$ID){
                $TipoMateriales[$i]["Selected"]="Selected";
            }else{
                $TipoMateriales[$i]["Selected"]="";
            }
            
        }
        
        return $TipoMateriales;
    }
    
    function obtenerEmpresa($ID){
        $Empresas = array();
        $sqlstr = "select * from empresa;";
        $Empresas = obtenerRegistros($sqlstr);
    
        for($i=0; $i<count($Empresas); $i++){
            if($Empresas[$i]["empresaId"]==$ID){
                $Empresas[$i]["Selected"]="Selected";
            }else{
                $Empresas[$i]["Selected"]="";
            }
            
        }
        /*
        print_r($Empresas);
              echo '</br>';
              echo $ID;
              die();*/
        
        return $Empresas;
    }
    //fin otros modelos

    function obtenerAlmacenes(){
        $Almacenes = array();
        $sqlstr = "SELECT almacenes.almId, almacenes.almdsc, almacenes.almrtn,";
        $sqlstr .= " (select tipoAlmacen.tipoAlmdsc from tipoAlmacen where tipoAlmacen.tipoAlmId=almacenes.tipoAlmId) 'tipoAlmIdBox',";
        $sqlstr .= " almacenes.almctd, almacenes.almdir,";
        $sqlstr .= " (select alm2.almdsc from almacenes as alm2 where alm2.almId = almacenes.almSupAlm) 'almSupAlmBox',";
        $sqlstr .= " almacenes.almtel1,";
        $sqlstr .= " (select tipoMaterial.tipoMatdsc from tipoMaterial where tipoMaterial.tipoMatId=almacenes.tipoMatId) 'tipoMatIdBox',";
        $sqlstr .= " (select empresa.empdsc from empresa where empresa.empresaId=almacenes.empresaId) 'empresaIdBox'";
        $sqlstr .= " FROM almacenes;";
        $Almacenes = obtenerRegistros($sqlstr);
        return $Almacenes;
    }


    function obtenerAlmacen($AlmacenID){
        $Almacen = array();
        $sqlstr = "SELECT almacenes.almId, almacenes.almdsc, almacenes.almrtn,";
        $sqlstr .= " almacenes.tipoAlmId 'tipoAlmId',";
        $sqlstr .= " almacenes.almctd, almacenes.almdir,";
        $sqlstr .= " (select alm2.almId from almacenes as alm2 where alm2.almId = almacenes.almSupAlm) 'almSupAlm',";
        $sqlstr .= " almacenes.almtel1,";
        $sqlstr .= " almacenes.tipoMatId 'tipoMatId',";
        $sqlstr .= " almacenes.empresaId 'empresaId'";
        $sqlstr .= " FROM almacenes where almacenes.almId = %d;";
        $sqlstr = sprintf($sqlstr, $AlmacenID);
        $Almacen = obtenerUnRegistro($sqlstr);
        return $Almacen;
    }
    
    function sePuedeBorrar($AlmacenID){
        $Almacen = array();
      $sqlstr = "select tipoAlmId,tipoMatId,empresaId from almacenes where almId = %d;";
      $sqlstr = sprintf($sqlstr, $AlmacenID);
      $Almacen = obtenerUnRegistro($sqlstr);
      return ($Almacen["tipoAlmId"] && $Almacen["tipoMatId"] && $Almacen["empresaId"]);
    }
    
    function insertarAlmacen($Almacen){
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

    function actualizarAlmacen($Almacen){
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


    function borrarAlmacen($AlmacenID){
      if($AlmacenID){
        $sqlDelete = "delete from almacenes where almId=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($AlmacenID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>