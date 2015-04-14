<?php
/* Login Controller
 * 2014-10-14 
 * Created By OJBA
 * Last Modification 2014-10-14 20:04
 */
  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");
  
  
  function run(){
    
    $userName = "";
    $returnUrl = "";
    $errores = array();
    if(isset($_POST["btnLogin"])){
        $userName = $_POST["txtUser"];
        $pswd = $_POST["txtPswd"];
        $returnUrl = $_POST["returnUrl"];
        $usuario = array();
        $usuario = obtenerUsuario($userName);
        
        if($usuario){
          $salt = $usuario["usuariofching"];
          if ($salt % 2 == 0){
            $pswd = $pswd . $salt;
          }else {
            $pswd = $salt . $pswd;
          }
          /*
          echo $pswd;
          echo "</br>";*/
          
          $pswd = md5($pswd);
          /*
          echo $salt;
          echo "</br>";
          echo $pswd;
          echo "</br>";
          echo $usuario["usuariofching"];
          echo "</br>";
          echo $usuario["usuariopwd"];
          die();*/
          
          if($usuario["usuariopwd"] == $pswd){
            mw_setEstaLogueado($userName, true);
            mw_setAdmin(obtenerRolAdmin($userName));
            header("Location:index.php" . $_POST["returnUrl"]);
            die();
          }else{
            $errores[] = array("errmsg"=>"Credenciales Incorrectas");
          }
        }else{
          $errores[] = array("errmsg"=>"Credenciales Incorrectas");
        }
    }
    
    if(isset($_GET["returnUrl"])){
      $returnUrl = urldecode($_GET["returnUrl"]);
    }
    //si llega aqui algo sucedio asi que hay que rendizar nuevamente el login
    $datos = array("txtUser" => $userName,
                   "returnUrl" => $returnUrl,
                   "mostrarErrores" => (count($errores)>0),
                   "errores" => $errores);
    
    renderizar("login", $datos);
    
  }
 
  run();
?>