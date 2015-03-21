<h2>{{tipomaterialTitle}}</h2>
<a href="index.php?page=tipomateriales">Listado de Tipos de materiales</a>
<form action="index.php?page=tipomaterial&acc={{tipomaterialMode}}" method="post">
  <div>
    <label class="col4" for="tipoMatId">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{tipoMatId}}"/>
    <input type="hidden" id="tipoMatId" name="tipoMatId" value="{{tipoMatId}}"/>
  </div>
  <div>
    <label class="col4" for="tipoMatdsc">Tipo de Material</label>
    <input class="col8" type="text" id="tipoMatdsc" name="tipoMatdsc" value="{{tipoMatdsc}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="tipoMatest">Estado</label>
    <select class="col8" id="tipoMatest" name="tipoMatest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
    </select>
  </div>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{tipomaterialMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
