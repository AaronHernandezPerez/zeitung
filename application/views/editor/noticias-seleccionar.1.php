<style>
th {
  text-align: center;
}


td:nth-child(2) {
  text-align: center;
}

.thead {
  border-bottom: 3px solid #32383e;
  font-weight: bold;
}

.bt {
  border-top: 1px solid #32383e;
}

.filaNoticias {
  background-color: #212529;
  margin: 0 .02em;
  color: white;
}

.filaNoticias a {
  color: white !important;
  display: flex;
  align-items: center;
  height: 100%;
}

.filaNoticias a:hover {
  color: red;
  background-color: rgba(255, 255, 255, .05);
  text-decoration: none;
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

    <table class="table tablle-sm table-light">
      <thead class="thead-light">
        <tr>
          <th>Titulo</th>
          <th style="width:8em;">Fecha</th>
          <th>Comentarios</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($noticias as $value) : ?>
        <tr>
          <td>
            <a class="enlaceTitulo px-2"
              href="<?php echo base_url() . "editor/modificarNoticia/{$value->id}" ?>"><?php echo $value->titulo ?></a>
          </td>
          <td><?= date('d-m-Y', strtotime($value->fecha)) ?></td>
          <td>
            <div class="d-flex justify-content-center">
              <a href="" class="btn btn-outline-primary" role="button">
                <i class="far fa-comments"></i> <span class="badge badge-light">9</span>
              </a>
            </div>
          </td>
          <td>
            <div class="d-flex justify-content-center">
              <button data-id="<?php echo $value->id ?>" data-titulo="<?php echo $value->titulo ?>"
                class="btn btn-outline-danger my-2 btnBorrar" type="button"><i class="fas fa-trash-alt"></i></button>
            </div>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <!-- Tabla con divs -->
    <?php foreach ($noticias as $value) : ?>
    <!-- <div class="filaNoticias row bt">
      <div class="col-sm px-0">
        <a class="enlaceTitulo px-2"
          href="<?php echo base_url() . "editor/modificarNoticia/{$value->id}" ?>"><?php echo $value->titulo ?></a>
      </div>

      <div class="col-6 col-sm-3 col-lg-2 d-flex align-items-center">
        <?= date('d-m-Y', strtotime($value->fecha)) ?>
      </div>

      <div class="col-6 col-sm-2 col-md-1 d-flex justify-content-end">
        <button data-id="<?php echo $value->id ?>" data-titulo="<?php echo $value->titulo ?>"
          class="btn btn-outline-danger my-2 btnBorrar" type="button"><i class="fas fa-trash-alt"></i></button>
      </div>
    </div> -->
    <!-- Fin row -->
    <?php endforeach ?>

    <!-- Paginacion de las noticias -->
    <div class="d-flex justify-content-center mt-3">
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>
</div>

<div id="alertas">
</div>