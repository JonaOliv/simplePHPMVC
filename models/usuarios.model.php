<?php
    //modelo de datos de productos
    require_once("libs/dao.php");
    
    function obtenerUsuario($userName){
        $usuario = array();
        $sqlstr = sprintf("SELECT `idusuarios`, `usuarionom`, `usuarioape`, `usuariogenero`, 
                          UNIX_TIMESTAMP(`usuariofching`) as `usuariofching`, `fechaNac`, `usuarioemail`,  `usuariopwd`, `usuarioest`,
                          `usuariolstlgn`, `usuariofatm`, `usuariofchlp` FROM `Usuarios` where `usuarioemail` = '%s';",$userName);

        $usuario = obtenerUnRegistro($sqlstr);
        return $usuario;
    }
    
    function obtenerIDUsuario($userName){
        $sqlstr = sprintf("SELECT `idusuarios` FROM `Usuarios` where `usuarioemail` = '%s';",$userName);
        $usuario = array();
        $usuario = obtenerUnRegistro($sqlstr);
        return $usuario["idusuarios"];
    }
    
    function insertUsuario($userName, $userLastname,$genero, $userEmail,
                           $timestamp, $nacimiento,$password){
        $strsql = "INSERT INTO Usuarios
                    (`usuarionom`,
                    `usuarioape`,
                    `usuariogenero`,
                    `usuariofching`,
                    `fechaNac`,
                    `usuarioemail`,
                    `usuariopwd`,
                    `usuarioest`,
                    `usuariolstlgn`,
                    `usuariofatm`,
                    `usuariofchlp`)
                   VALUES
                    ('%s','%s','%s',FROM_UNIXTIME(%s),'%s','%s','%s','ACT', null, 0, null);";
                    //revisar lo de fecha
        $strsql = sprintf($strsql,valstr($userName),valstr($userLastname),valstr($genero),$timestamp,$nacimiento,
                          valstr($userEmail),$password);
        
        if(ejecutarNonQuery($strsql)){
            
            
            $IDUser=obtenerIDUsuario($userEmail);
            $IDRol=obtenerIDRol("padrino");
            $strsql2="INSERT INTO `rolesXusuario`
                (`idUsuario`,`idRoles`,`estado`) VALUES
                (%d,%d,'ACT');";
            $strsql2 = sprintf($strsql2,intval($IDUser),intval($IDRol));
            
            if(ejecutarNonQuery($strsql2)){
                echo "Pasa por aqui </br>";
                echo "$IDUser </br>";
                echo "$IDRol </br>";
                die();
                return getLastInserId();
            }
            return 0;
        }
        return 0;
    }
    
    function obtenerRolesActivos(){
        $roles= array();
        $sqlstr = "Select * from Roles where estado='ACT';";
        $roles = obtenerRegistros($sqlstr);
        return $roles;
    }

    function obtenerRevisarRol($usuarioID,$rol){
        $rol= array();
        $sqlstr = "Select Roles.rol from rolesXusuario, Roles where rolesXusuario.idUsuario=%d and rolesXusuario.estado='ACT' and Roles.rol='%s';";
        $sqlstr = sprintf($sqlstr, $usuarioID,$rol);
        $rol = obtenerUnRegistro($sqlstr);
        return $rol;
    }
    
    function obtenerIDRol($rolBuscado){
        $rol= array();
        $sqlstr = "Select Roles.idrol 'idrol' from Roles where Roles.estado='ACT' and Roles.rol='%s';";
        $sqlstr = sprintf($sqlstr, $rolBuscado);
        $rol = obtenerUnRegistro($sqlstr);
        return $rol["idrol"];
    }
    
    function obtenerRolesForCombo($selectedRolId){
        $roles = obtenerRolesActivos();
        for($i=0;$i<count($roles); $i++){
          if($roles[$i]["idrol"]==$selectedRolId){
            $roles[$i]["selected"] = "selected";
          } else {
            $roles[$i]["selected"] = "";
          }
        }
        return $roles;
    }
    
    function obtenerRolAdmin($userName){
        $usuarioID=obtenerIDUsuario($userName);
        $rol=obtenerRevisarRol($usuarioID,"administrador");
        if($rol){
            return 2;
        }else{
            return 1;
        }
    }
?>