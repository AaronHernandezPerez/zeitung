<style>
.pagination>li>a {
  color: #212529;
}

.pagination>li>a:focus,
.pagination>li>a:hover,
.pagination>li>span:focus,
.pagination>li>span:hover {
  color: #212529;
}

.pagination>.active>a {
  background-color: #212529 !important;
  border: solid 1px #212529 !important;
}

.pagination>.active>a:hover {
  background-color: #171a1c !important;
  border: solid 1px #171a1c !important;
}
</style>

<div class="card">
  <div class="card-body">
    <h3 class="card-title">Tus noticias</h3>
    <!-- Header de la 'tabla' -->
    <div class="row filaNoticias thead">
      <div class="col-sm px-2">Titulo</div>
      <div class="col-6 col-sm-3 col-lg-2">Fecha</div>
      <div class="col-6 col-sm-2 col-md-1 d-flex justify-content-end">Eliminar</div>
    </div> <!-- Fin row -->

    <!-- Tabla con divs -->
    <?php foreach ($noticias as $value) : ?>
    <div class="filaNoticias row bt">
      <div class="col-sm px-0">
        <a class="enlaceTitulo px-2"
          href="<?php echo base_url() . "editor/modificarNoticia/{$value->id}" ?>"><?php echo $value->titulo ?></a>
      </div>

      <div class="col-6 col-sm-3 col-lg-2 d-flex align-items-center">
        <?php echo $value->fecha ?>
      </div>

      <div class="col-6 col-sm-2 col-md-1 d-flex justify-content-end">
        <button data-id="<?php echo $value->id ?>" data-titulo="<?php echo $value->titulo ?>"
          class="btn btn-outline-danger my-2 btnBorrar" type="button"><i class="fas fa-trash-alt"></i></button>
      </div>
    </div> <!-- Fin row -->
    <?php endforeach ?>

    <!-- Paginacion de las noticias -->
    <div class="d-flex justify-content-center mt-3">
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>
</div>

<div id="alertas">
</div>