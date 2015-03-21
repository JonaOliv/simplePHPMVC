<h2>Trabajar con Empresas</h2>
<div class="col12 right clean">
  <a href="index.php?page=empresa&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd sdhide">
    <div class="col1 hd">Código</div>
    <div class="col2 hd">Empresa</div>
    <div class="col2 hd">Teléfono</div>
    <div class="col2 hd">Teléfono 2</div>
    <div class="col2 hd">Contacto</div>
    <div class="col1 hd">Tipo</div>
    <div class="col2 hd">Acciones</div>
  </div>
  {{foreach empresas}}
  <div class="row">
    <div class="col1 sdhide">{{empresaId}}</div>
    <div class="col2"><a href="{{empurl}}" target="_blank">{{empdsc}}</a></div>
    <div class="col2">{{emptel}}</div>
    <div class="col2">{{emptel2}}</div>
    <div class="col2">{{empctc}}</div>
    <div class="col1">{{emptip}}</div>
    <div class="col2 right">
      <a href="index.php?page=empresa&acc=upd&empresaId={{empresaId}}">Update</a> |
      <a href="index.php?page=empresa&acc=dlt&empresaId={{empresaId}}">Delete</a>
    </div>
  </div>
  {{endfor empresas}}
</div>
