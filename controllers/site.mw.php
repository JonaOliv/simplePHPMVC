<?php
//middleware de configuración de todo el sitio

function site_init(){
    addToContext("page_title","Ejemplo Simple de MVC");
    
    addToContext("entradaLogin",true);
    
    addToContext("salidaLogin",false);
    addToContext("admin",false);
}

site_init();
?>
