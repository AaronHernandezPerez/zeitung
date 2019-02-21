<style>
canvas {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
}
</style>
<div class="card shadow mb-3">
  <div class="card-body">
    <h1 class="card-title">Resumen de tu último año</h1>
  </div>
</div>

<div class="card shadow mb-3">
  <div class="card-body">
    <h3 class="card-title">Noticias publicadas</h3>
    <canvas id="notp"></canvas>
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-8">
    <div class="card shadow h-100">
      <div class="card-body">
        <h3 class="card-title">Noticias publicadas</h3>
        <canvas id="comentp"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card shadow h-100">
      <div class="card-body">
        <h3 class="card-title">Categorias publicadas</h3>
        <canvas id="catp" width="1" height="1"></canvas>
      </div>
    </div>
  </div>
</div>