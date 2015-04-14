<?php
/* Registro Controller
 * 2014-11-03 
 * Created By OJBA
 * Last Modification 2014-11-02 20:22
 */
  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");
  function run(){
    $htmlData = array();
    $htmlData["mostrarErrores"] = false;
    $htmlData["errores"] = array();
    $htmlData["txtUserName"] = "";
    $htmlData["txtEmail"]="";
    $htmlData["MasSelected"]="selected";
    $htmlData["FemSelected"]="";
    
    if(isset($_POST["btnRegister"])){
      $htmlData["txtUserName"] = $_POST["txtUserName"];
      $htmlData["txtEmail"] =  $_POST["txtEmail"];
      $htmlData["txtuserLastname"] = $_POST["txtuserLastname"];
      $htmlData["txtgenero"] =  $_POST["txtgenero"];
      $htmlData["txtfechaNac"] = $_POST["txtfechaNac"];
      
      $htmlDatos["MasSelected"]=($_POST["txtgenero"] =="Masculino")?"selected":"";
      $htmlDatos["FemSelected"]=($_POST["txtgenero"] =="Femenino")?"selected":"";
      
      $pswd = $_POST["txtPswd"];
      $pswdCnf = $_POST["txtPswdCnf"];
      
      //print_r();
      echo $htmlData["txtfechaNac"];
      die();
      
      if($pswd == $pswdCnf){
        //seguir proceso de registro
        // verificar que el usuario no exista previamente
        $checkUser=array();
        $checkUser = obtenerUsuario( $htmlData["txtEmail"]);
        
        
        if(count($checkUser)!=0){
          $htmlData["mostrarErrores"] = true;
          $htmlData["errores"][]=array("errmsg"=>"Correo Electrónico ya Usado!");
        }else{
          // geenrar la contraseña salada (salting)
          $fchingreso = time(); //date("YmdHisu"); //20141104203730069785
          
          $pswdSalted = "";
          if($fchingreso % 2 == 0){
            $pswdSalted = $pswd . $fchingreso;
          }else{
            $pswdSalted = $fchingreso . $pswd;
          }
          /*
          echo time();
          echo "</br>";
          echo $pswdSalted;
          die();*/
          
          $pswdSalted = md5($pswdSalted);
          
          insertUsuario(   $htmlData["txtUserName"],$htmlData["txtuserLastname"],
                        $htmlData["txtgenero"], $htmlData["txtEmail"],
                        $fchingreso,$htmlData["txtfechaNac"], $pswdSalted);
                        
          // ingresar
          /*
        
          */
        }
        
        
      }else{
        $htmlData["mostrarErrores"] = true;
        $htmlData["errores"][]=array("errmsg"=>"Contraseñas no coinciden");
      }
    }
    
    renderizar("registro",$htmlData);
  }
 

  run();
?>