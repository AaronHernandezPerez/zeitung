<style>
#cuerpo img {
  width: 100%;
}
</style>

<!-- Contenido -->
<div class="row">

  <!-- Columna de la noticia -->
  <div class="col-lg-8 ">

    <div class="bg-white p-3 shadow">
      <!-- Titulo -->
      <h1 class="mt-4"><?= $noticia->titulo ?> </h1>
      <!-- Autor -->
      <p class="lead">Por <a href="<?= base_url() ?>noticias/perfil/<?= $noticia->autor ?>"><?= $noticia->nombre ?></a>
        el <?= strftime('%A día %d de %B del %Y', strtotime($noticia->fecha)) ?>
      </p>
      <hr>
      <!-- Imagen de cabecera -->
      <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
        <hr> -->
      <!-- Cabecera de la noticia -->
      <p class="lead"><?= $noticia->cabecera ?> </p>
      <!-- Cuerpo de la noticia -->
      <div id="cuerpo">
        <?= $noticia->cuerpo ?>
      </div>
    </div>

    <!-- Formulario de opiniones -->
    <div class="shadow-sm bg-white mt-5 p-3">
      <h3>¡Déjanos tu opinión!</h3>
      <form id="fComentario" autocomplete="off">
        <input type="hidden" id="idNoticia" name="noticia" value="<?= $noticia->id ?>">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input required id="nombre" name="nombre" class="form-control" type="text">
        </div>
        <div class="form-group">
          <label for="texto">Comentario</label>
          <textarea required id="comentario" name="comentario" class="form-control" rows="3"></textarea>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
        </div>
      </form>
    </div>

    <div id="comentarios" class="bg-white shadow-sm p-3 mt-5">
      <h3>Comentarios:</h3>
      <!-- Comentarios -->
      <!-- <div class="media mb-4">
        <div class="media-body">
          <h5 class="mt-0"><strong>Pepito de mis palotes</strong></h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
          odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
          fringilla. Donec lacinia congue felis in faucibus.
        </div>
      </div>
      <hr> -->

      <?php foreach ($comentarios as $value) : ?>
      <div class="media mb-4">
        <div class="media-body">
          <h5 class="mt-0"><strong><?= $value->nombre ?></strong></h5>
          <?= $value->comentario ?>
        </div>
      </div>
      <hr>
      <?php endforeach; ?>

    </div>

  </div>
  <?php
// Carga el menu aside
  $this->load->view('noticias/complementos/aside.php');
  ?>