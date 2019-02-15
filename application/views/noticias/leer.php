<!-- Contenido -->
<div class="container">

  <div class="row">

    <!-- Columna de la noticia -->
    <div class="col-lg-8 ">

      <div class="bg-white px-3 shadow">
        <!-- Titulo -->
        <h1 class="mt-4"><?= $noticia->titulo ?> </h1>

        <!-- Autor -->
        <p class="lead">Por <a href=""><?= $noticia->nombre ?> </a></p>

        <hr>

        <!-- Fecha -->
        <p>Publicado el <?= $noticia->fecha ?></p>

        <hr>

        <!-- Imagen de cabecera -->
        <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
            <hr> -->

        <!-- Cabecera de la noticia -->
        <p class="lead"><?= $noticia->cabecera ?> </p>

        <!-- Cuerpo de la noticia -->
        <?= $noticia->cuerpo ?>
      </div>

      <!-- Comments Form -->
      <!-- <div class="card my-4"> -->
      <!-- <h5 class="card-header">Deja tu opinión!</h5> -->
      <!-- <div class="card-body"> -->
      <div class="shadow-sm bg-white mt-5">
        <form class="p-3">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" class="form-control" type="text">
          </div>
          <div class="form-group">
            <label for="texto">Comentario</label>
            <textarea id="texto" name="texto" class="form-control" rows="3"></textarea>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
          </div>
        </form>
      </div>
      <!-- </div> -->
      <!-- </div> -->

      <div class="bg-white shadow-sm p-3 mt-5">
        <h3>Comentarios:</h3>
        <!-- Comentarios -->
        <div id="comentarios" class="mt-5">
          <div class="media mb-4">
            <div class="media-body">
              <h5 class="mt-0"><strong>Pepito de mis palotes</strong></h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
              odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
              fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>
          <hr>
          <div class="media mb-4">
            <div class="media-body">
              <h5 class="mt-0"><strong>Carlito de mis palotes</strong></h5>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni rerum quasi deleniti obcaecati excepturi
              eveniet nobis? Necessitatibus voluptas consequuntur, explicabo voluptatum, vel sequi at illum incidunt
              earum
              eum modi dolore?
            </div>
          </div>
          <hr>
        </div>
      </div>

    </div>
    <?php
        // Carga el menu aside
    $this->load->view('noticias/complementos/aside.php');
    ?>