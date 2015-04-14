<h2>Trabajar con Donaciones</h2>
<div>
  <div class="rowhd sdhide">
    <div class="col4 hd">Código</div>
    <div class="col4 hd">Fecha</div>
    <div class="col4 hd">Monto</div>
  </div>
  {{foreach donaciones}}
  <div class="row">
    <div class="col4 sdhide">{{idDonaciones}}</div>
    <div class="col4">{{fechaDon}}</div>
    <div class="col4">{{monto}}</div>
  </div>
  {{endfor donaciones}}
</div>