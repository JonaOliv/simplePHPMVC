<?php
    //modelo de datos de productos
    require_once("libs/dao.php");
    
    function obtenerDonaciones(){
        $donaciones=array();
        $sqlstr= sprintf("SELECT * FROM `Donaciones` order by `Donaciones`.`fechaDon` desc;");
        $donaciones = obtenerRegistros($sqlstr);
        return $donaciones;
    }
    
    function insertDonacion($fecha, $monto){
        $strsql = "INSERT INTO Donaciones
                    (`fechaDon`,
                    `monto`)
                   VALUES
                    (FROM_UNIXTIME(%s),%01.2f);";
        $strsql = sprintf($strsql,$fecha,floatval($monto));
        //buscar flotante
        if(ejecutarNonQuery($strsql)){
            return getLastInserId();
        }
        return 0;
    }
?>