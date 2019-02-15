<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <?php foreach ($noticias as $value) : ?>
      <!-- Blog Post -->
      <div class="card mb-3">
        <div class="card-body">
          <h2 class="card-title ">
            <a href="<?= base_url() ?>noticias/leer/<?= $value->id ?>" class="text-dark"><?= $value->titulo ?></a>
          </h2>
          <p class="card-text"><?= $value->cabecera ?> </p>
          <!-- <a href="<?= base_url() ?>noticias/leer/<?= $value->id ?>" class="btn btn-primary">Leer mas &rarr;</a> -->
        </div>
        <!-- <div class="card-footer text-muted">
          Publicada el <?= $value->fecha ?> Por
          <a href="#"><?= $value->nombre ?> </a>
        </div> -->
      </div>
      <?php endforeach; ?>

      <!-- Paginacion de las noticias -->
      <div class="d-flex justify-content-center mt-3">
        <?php echo $this->pagination->create_links(); ?>
      </div>

    </div>
    <?php 
    // Carga el menu aside
    $this->load->view('noticias/complementos/aside.php');
    ?>