<h3 class="card-title"><?= $titulo ?></h3>

<table class="table table-sm  table-hover table-dark">
  <thead class="">
    <tr>
      <th>Editar noticia</th>
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
      <td>
        <p class="my-2">
          <?= date('d-m-Y', strtotime($value->fecha)) ?>
        </p>
      </td>
      <td>
        <div class="d-flex justify-content-center my-2">
          <?php if ($value->comentarios == 0) : ?>
          <button class="btn btn-outline-primary btn-coment" type="button">
            <i class="far fa-comments"></i> <span class="badge badge-dark"><?= $value->comentarios ?></span>
          </button>
          <?php else : ?>
          <a href="<?php echo base_url() . "editor/moderarComentarios/{$value->id}" ?>" class="btn btn-outline-primary"
            role="button">
            <i class="far fa-comments"></i> <span class="badge badge-dark"><?= $value->comentarios ?></span>
          </a>
          <?php endif; ?>
        </div>
      </td>
      <td>
        <div class="d-flex justify-content-center my-2">
          <button data-id="<?php echo $value->id ?>" data-titulo="<?php echo $value->titulo ?>"
            class="btn btn-outline-danger btnBorrar" type="button"><i class="fas fa-trash-alt"></i></button>
        </div>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>