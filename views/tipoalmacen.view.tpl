<h2>{{tipoalmacenTitle}}</h2>
<a href="index.php?page=tipoalmacenes">Listado de Tipos de Almacenes</a>
<form action="index.php?page=tipoalmacen&acc={{tipoalmacenMode}}" method="post">
  <div>
    <label class="col4" for="tipoAlmId">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{tipoAlmId}}"/>
    <input type="hidden" id="tipoAlmId" name="tipoAlmId" value="{{tipoAlmId}}"/>
  </div>
  <div>
    <label class="col4" for="tipoAlmdsc">Tipo de Almacen</label>
    <input class="col8" type="text" id="tipoAlmdsc" name="tipoAlmdsc" value="{{tipoAlmdsc}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="tipoAlmest">Estado</label>
    <select class="col8" id="tipoAlmest" name="tipoAlmest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
    </select>
  </div>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{tipoalmacenMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
