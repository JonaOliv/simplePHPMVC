<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>{{page_title}}</title>
            <link rel="stylesheet" href="public/css/smvc.css" />
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
        </head>
        <body>
            <h1>{{page_title}}</h1>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?page=categorias">Categorias</a></li>
                <li><a href="index.php?page=unidades">Unidades</a></li>
                <li><a href="index.php?page=empresas">Empresas</a></li>
                <li><a href="index.php?page=tipomateriales">Tipos de Materiales</a></li>
                <li><a href="index.php?page=tipoalmacenes">Tipos de Almacenes</a></li>
                <li><a href="index.php?page=almacenes">Almacenes</a></li>
                
                {{if entradaLogin}}
                <li><a href="index.php?page=login">Inicia Sesión</a></li>
                <li><a href="index.php?page=registro">Regístrate</a></li>
                {{endif entradaLogin}}
                
                {{if salidaLogin}}
                    {{if admin}}
                    <li><a href="index.php?page=usuarios">Usuarios</a></li>
                    <li><a href="index.php?page=mensualidades">Mensualidades</a></li>
                    <li><a href="index.php?page=donaciones">Donaciones</a></li>
                    {{endif admin}}
                <li><a href="index.php?page=perfil">{{usuario}}</a></li>
                <li><a href="index.php?page=cerrar">Cerrar Sesión</a></li>
                {{endif salidaLogin}}
                
                <li><a href="index.php?page=menu">Menu</a></li>
            </ul>
            {{{page_content}}}
            <div class="footer">
              Todos los derechos Reservados 2015
            </div>
        </body>
    </html>
