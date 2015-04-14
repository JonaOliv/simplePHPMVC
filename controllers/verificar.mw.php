<?php
//middleware de verificación

    function mw_estaLogueado(){
        if( isset($_SESSION["userLogged"])
            &&
            $_SESSION["userLogged"] == true){
            
            addToContext("entradaLogin",false);
            addToContext("salidaLogin",true);
            
            $bool=mw_IsAdmin();
            
            return true;
        }
        return false;
    }
    
    function mw_setEstaLogueado($usuario, $logueado){
        $salir=1;
        if($logueado){
            $_SESSION["userLogged"] = true;
            $_SESSION["userName"] = $usuario;
            addToContext("entradaLogin",false);
            addToContext("salidaLogin",true);
            addToContext("usuario",$usuario);
        }else{
            $_SESSION["userLogged"] = false;
            unset($_SESSION["userName"]);
            addToContext("entradaLogin",true);
            addToContext("salidaLogin",false);
            
            mw_setAdmin($salir);
        }
    }
    
    function mw_setAdmin($logueado){
        switch($logueado){
            //salir
            case 1:
                $_SESSION["admin"] = false;
                addToContext("admin",false);
                break;
            //admin
            case 2:
                $_SESSION["admin"] = true;
                addToContext("admin",true);
                break;
            default:
                $_SESSION["admin"] = false;
                addToContext("admin",false);
                break;
        }
    }
    
    function mw_IsAdmin(){
        if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
            addToContext("admin",true);
            return true;
        }else{
            addToContext("admin",false);
            return false;
        }
    }
    
    function mw_redirectToLogin($to){
        $loginstring = urlencode("?".$to);
        $url = "index.php?page=login&returnUrl=".$loginstring;
        header("Location:" . $url);
    }
?>