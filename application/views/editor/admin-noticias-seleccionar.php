<div class="card shadow">
  <div class="card-body">
    <h2 class="card-title mb-3 text-center">Listado de noticias:</h2>
    <?php foreach ($noticias as $key => $value) : ?>
    <!-- Division para cada autor -->
    <div class="mb-4">
      <h3 class="card-title">Noticias de: <?= $key ?> </h3>
      <!-- Header de la 'tabla' -->
      <div class="row filaNoticias thead">
        <div class="col-sm px-2">Titulo</div>
        <div class="col-6 col-sm-3 col-lg-2">Fecha</div>
        <div class="col-6 col-sm-2 col-md-1 d-flex justify-content-end">Eliminar</div>
      </div> <!-- Fin row -->
      <!-- Tabla con divs -->
      <?php foreach ($value as $value) : ?>
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
      <?php endforeach; // Fin foreach $value ?>
    </div>
    <?php endforeach; // Fin foreach $noticias ?>

  </div>
</div>

<div id="alertas">
</div>