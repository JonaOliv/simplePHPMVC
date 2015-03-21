<h2>Trabajar con Tipos de Almacenes</h2>
<div class="col12 right clean">
  <a href="index.php?page=tipoalmacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col2 hd">Código</div>
    <div class="col4 hd">Tipo de Almacen</div>
    <div class="col4 hd">Estado</div>
    <div class="col2 hd">Acciones</div>
  </div>
  {{foreach tipoalmacenes}}
  <div class="row">
    <div class="col2">{{tipoAlmId}}</div>
    <div class="col4">{{tipoAlmdsc}}</div>
    <div class="col4">{{tipoAlmest}}</div>
    <div class="col2">
      <a href="index.php?page=tipoalmacen&acc=upd&tipoAlmId={{tipoAlmId}}">Update</a> |
      <a href="index.php?page=tipoalmacen&acc=dlt&tipoAlmId={{tipoAlmId}}">Delete</a>
    </div>
  </div>
  {{endfor tipoalmacenes}}
</div>