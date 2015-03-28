<h2>Trabajar con Almacenes</h2>
<div class="col12 right clean">
  <a href="index.php?page=almacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd sdhide">
    <div class="col1 hd">Código</div>
    <div class="col1 hd">Nombre</div>
    <div class="col1 hd">RTN</div>
    <div class="col1 hd">Tipo de Almacen</div>
    <div class="col1 hd">Subalm</div>
    <div class="col1 hd">Direccion</div>
    <div class="col1 hd">Superalm</div>
    <div class="col1 hd">Telefono</div>
    
    <div class="col1 hd">Tipo de Material</div>
    <div class="col1 hd">Empresa</div>
    <div class="col2 hd">Acciones</div>
  </div>
  {{foreach almacenes}}
  <div class="row">
    <div class="col1 sdhide">{{almId}}</div>
    <div class="col1">{{almdsc}}</div>
    <div class="col1">{{almrtn}}</div>
    <div class="col1">{{tipoAlmIdBox}}</div>
    <div class="col1">{{almctd}}</div>
    <div class="col1">{{almdir}}</div>
    <div class="col1">{{almSupAlmBox}}</div>
    <div class="col1">{{almtel1}}</div>
    <div class="col1">{{tipoMatIdBox}}</div>
    <div class="col1">{{empresaIdBox}}</div>
    <div class="col2 right">
      <a href="index.php?page=almacen&acc=upd&almId={{almId}}">Update</a> |
      <a href="index.php?page=almacen&acc=dlt&almId={{almId}}">Delete</a>
    </div>
  </div>
  {{endfor almacenes}}
</div>