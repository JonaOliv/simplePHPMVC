<h2>{{almacenTitle}}</h2>
<a href="index.php?page=almacenes">Listado de Almacenes</a>
<form action="index.php?page=almacen&acc={{almacenMode}}" method="post">
  <div>
    <label class="col4" for="almId">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{almId}}"/>
    <input type="hidden" id="almId" name="almId" value="{{almId}}"/>
  </div>
  <div>
    <label class="col4" for="almdsc">Almacen</label>
    <input class="col8" type="text" id="almdsc" name="almdsc" value="{{almdsc}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almrtn">RTN</label>
    <input class="col8" type="text" id="almrtn" name="almrtn" value="{{almrtn}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="tipoAlmId">Tipo de Almacen</label>
    <select class="col8" id="tipoAlmId" name="tipoAlmId" {{disabled}}>
  {{foreach tipoAlmIdBox}}
      <option value="{{tipoAlmId}}" {{Selected}}>{{tipoAlmdsc}}</option>
  {{endfor tipoAlmIdBox}}
      <option value="0">Ninguno</option>
  </select>
  </div>
  <div>
    <label class="col4" for="almctd">Subalmacenes</label>
    <input class="col8" type="number" id="almctd" name="almctd" value="{{almctd}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almdir">Direccion</label>
    <input class="col8" type="text" id="almdir" name="almdir" value="{{almdir}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almSupAlm">Superalmacen</label>
    <select class="col8" id="almSupAlm" name="almSupAlm" {{disabled}}>
      <option value="0">Ninguno</option>
  {{foreach almSupAlmBox}}
      <option value="{{almIdSU}}" {{Selected}}>{{almdscSU}}</option>
  {{endfor almSupAlmBox}}
    </select>
  </div>
  <div>
    <label class="col4" for="almtel1">Teléfono</label>
    <input class="col8" type="text" id="almtel1" name="almtel1" value="{{almtel1}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="tipoMatId">Tipo de Material</label>
    <select class="col8" id="tipoMatId" name="tipoMatId" {{disabled}}>
  {{foreach tipoMatIdBox}}
      <option value="{{tipoMatId}}" {{Selected}}>{{tipoMatdsc}}</option>
  {{endfor tipoMatIdBox}}
      <option value="0">Ninguno</option>
  </select>
  </div>
  <div>
    <label class="col4" for="empresaId">Empresa</label>
    <select class="col8" id="empresaId" name="empresaId" {{disabled}}>
  {{foreach empresaIdBox}}
      <option value="{{empresaId}}" {{Selected}}>{{empdsc}}</option>
  {{endfor empresaIdBox}}
      <option value="0">Ninguno</option>
  </select>
  </div>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{almacenMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>