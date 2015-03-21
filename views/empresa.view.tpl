<h2>{{empresaTitle}}</h2>
<a href="index.php?page=empresas">Listado de Empresas</a>
<form action="index.php?page=empresa&acc={{empresaMode}}" method="post">
  <div>
    <label class="col4" for="empresaId">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{empresaId}}"/>
    <input type="hidden" id="empresaId" name="empresaId" value="{{empresaId}}"/>
  </div>
  <div>
    <label class="col4" for="empdsc">Empresa</label>
    <input class="col8" type="text" id="empdsc" name="empdsc" value="{{empdsc}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="emprtn">RTN</label>
    <input class="col8" type="text" id="emprtn" name="emprtn" value="{{emprtn}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="empdir">Dirección</label>
    <input class="col8" type="text" id="empdir" name="empdir" value="{{empdir}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="emptel">Teléfono</label>
    <input class="col8" type="text" id="emptel" name="emptel" value="{{emptel}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="emptel2">Otro Teléfono</label>
    <input class="col8" type="text" id="emptel2" name="emptel2" value="{{emptel2}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="empurl">Url de Empresa</label>
    <input class="col8" type="text" id="empurl" name="empurl" value="{{empurl}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="empest">Estado</label>
    <select class="col8" id="empest" name="empest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
    </select>
  </div>
  <div>
    <label class="col4" for="empctc">Contacto</label>
    <input class="col8" type="text" id="empctc" name="empctc" value="{{empctc}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="emptip">Tipo de Empresa</label>
    <select class="col8" id="emptip" name="emptip" {{disabled}}>
      <option value="SRV" {{srvSelected}}>Servicio</option>
      <option value="RTL" {{rtlSelected}}>Venta al Detalle</option>
      <option value="WRH" {{wrhSelected}}>Almacenaje</option>
    </select>
  </div>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{empresaMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
