<?php
    //modelo de datos de productos
    require_once("libs/dao.php");
    
    function obtenerMensualidades(){
        $mensualidades=array();
        $sqlstr= sprintf("SELECT `Mensualidades`.`idMensualidad`,
    `Mensualidades`.`idUsuario`, `Usuarios`.`usuarionom`+`Usuarios`.`usuarioape` 'Nombre',
    `Usuarios`.`usuarioemail`,  `Mensualidades`.`monto`,
    `Mensualidades`.`fecha` FROM `Mensualidades`, `Usuarios` where `Mensualidades`.`idUsuario`=`Usuarios`.`idusuarios` order by `Mensualidades`.`fecha` desc;");
        $mensualidades = obtenerRegistros($sqlstr);
        return $mensualidades;
    }
    
    function insertMensualidad($idUsuario,$fecha, $monto){
        $strsql = "INSERT INTO Mensualidades
                    (`fecha`,`monto`,`idUsuario`)
                   VALUES
                    (FROM_UNIXTIME(%s),%01.2f,%d);";
        $strsql = sprintf($strsql,$fecha,floatval($monto),intval($idUsuario));
        //buscar flotante
        if(ejecutarNonQuery($strsql)){
            return getLastInserId();
        }
        return 0;
    }
?>