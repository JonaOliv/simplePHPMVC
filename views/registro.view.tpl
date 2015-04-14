{{if mostrarErrores}}
<ul class="error">
    {{foreach errores}}
        <li>{{errmsg}}</li>
    {{endfor errores}}
</ul>
{{endif mostrarErrores}}
<form action="index.php?page=registro" method="post">
    <label>Nombre</label><input type="text" name="txtUserName" value="{{txtUserName}}"/>
    <br>
    <label>Apellido</label><input type="text" name="txtuserLastname" value="{{txtuserLastname}}"/>
    <br>
    <label>Genero</label><!--
    <select class="col8" id="txtgenero" name="txtgenero">
      <option value="Masculino" {{MasSelected}}>Masculino</option>
      <option value="Femenino" {{FemSelected}}>Femenino</option>
    </select>-->
    <input type="radio" name="txtgenero" value="Masculino" {{MasChecked}}><label>Masculino</label>
    <input type="radio" name="txtgenero" value="Femenino" {{FemChecked}}><label>Femenino</label>
    <br>
    <label>Fecha de Nacimiento</label><input type="date" name="txtfechaNac" value="{{txtfechaNac}}"/>
    <br>
    <label>Correo Electrónico</label><input type="email" name="txtEmail" value="{{txtEmail}}"/>
    <br>
    <label>Contraseña</label><input type="password" name="txtPswd" />
    <br>
    <label>Confirme Contraseña</label><input type="password" name="txtPswdCnf" />
    <br>
    <input type="submit" name="btnRegister" value="Regístrate" />
</form>