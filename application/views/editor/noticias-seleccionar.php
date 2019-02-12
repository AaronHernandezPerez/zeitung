<style>
.tablaNoticias {
  background-color: #212529;
  margin: 0 .02em;
  color: white;
}

.thead {
  border-bottom: 3px solid #32383e;
  font-weight: bold;
}

.bt {
  border-top: 1px solid #32383e;
}

.tablaNoticias a {
  color: white !important;
  display: flex;
  align-items: center;
  height: 100%;
}

.tablaNoticias a:hover {
  color: red;
  background-color: rgba(255, 255, 255, .05);

  text-decoration: none;
}
</style>
<div class="card">
  <div class="card-body">
    <h3 class="card-title">Tus noticias</h3>
    <!-- Header de la 'tabla' -->
    <div class="row tablaNoticias thead">
      <div class="col-sm px-2">Titulo</div>
      <div class="col-6 col-sm-3 col-lg-2">Fecha</div>
      <div class="col-6 col-sm-2 col-md-1 d-flex justify-content-end">Eliminar</div>
    </div> <!-- Fin row -->

    <!-- Tabla con divs -->
    <?php foreach ($noticias as $value) : ?>
    <div class="tablaNoticias row bt">
      <div class="col-sm px-0">
        <a class="enlaceTitulo px-2"
          href="<?php echo base_url() . "editor/editarNoticias/{$value->id}" ?>"><?php echo $value->titulo ?></a>
      </div>

      <div class="col-6 col-sm-3 col-lg-2 d-flex align-items-center">
        <?php echo $value->fecha ?>
      </div>

      <div class="col-6 col-sm-2 col-md-1 d-flex justify-content-end">
        <button class="btn btn-outline-danger my-2" type="button"><i class="fas fa-trash-alt"></i></button>
      </div>
    </div> <!-- Fin row -->
    <?php endforeach ?>

  </div>
</div>