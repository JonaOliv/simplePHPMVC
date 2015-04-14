<?php

    session_start();

    require_once("libs/utilities.php");

    $pageRequest = "home";

    if(isset($_GET["page"])){
        $pageRequest = $_GET["page"];
    }

    //Incorporando los midlewares son codigos que se deben ejecutar
    //Siempre
    require_once("controllers/site.mw.php");
    require_once("controllers/verificar.mw.php");

    //Este switch se encarga de todo el enrutamiento

    switch($pageRequest){
        case "home":
            //llamar al controlador
            require_once("controllers/home.control.php");
            break;
        case "login":
            require_once("controllers/login.control.php");
            break;
        case "registro":
            require_once("controllers/registro.control.php");
            break;
        case "cerrar":
            require_once("controllers/cierre.control.php");
            break;
        case "donaciones":
            require_once("controllers/donaciones.control.php");
            break;
        case "mensualidades":
            require_once("controllers/mensualidades.control.php");
            break;
        case "usuarios":
            require_once("controllers/usuarios.control.php");
            break;
        //lo anterior son los indices que he modificado y agregado
        //para agregar una nueva pagina
        // agregar otro case
        case "menu":
            require_once("controllers/menu.control.php");
            break;
        case "categorias":
            require_once("controllers/categorias.control.php");
            break;
        case "category":
            require_once("controllers/category.control.php");
            break;
        //Mantenimiento de Unidades
        case "unidades":
            require_once("controllers/mnt/unidades.control.php");
            break;
        case "unidad":
                require_once("controllers/mnt/unidad.control.php");
                break;
        //Mantenimiento de Unidades
        case "empresas":
            require_once("controllers/mnt/empresas.control.php");
            break;
        case "empresa":
            require_once("controllers/mnt/empresa.control.php");
            break;
        case "tipomateriales":
            require_once("controllers/mnt/tipomateriales.control.php");
            break;
        case "tipomaterial":
            require_once("controllers/mnt/tipomaterial.control.php");
            break;
        case "tipoalmacenes":
            require_once("controllers/mnt/tipoalmacenes.control.php");
            break;
        case "tipoalmacen":
            require_once("controllers/mnt/tipoalmacen.control.php");
            break;
        case "almacenes":
            require_once("controllers/mnt/almacenes.control.php");
            break;
        case "almacen":
            require_once("controllers/mnt/almacen.control.php");
            break;
        default:
            require_once("controllers/error.control.php");

    }


?>
