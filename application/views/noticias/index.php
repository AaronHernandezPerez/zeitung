<!-- Page Content -->
<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">

    <?php foreach ($noticias as $value) : ?>
    <!-- Blog Post -->
    <div class="mb-3 rounded-0 shadow-sm bg-white p-2">
      <h2>
        <a href="<?= base_url() ?>noticias/leer/<?= $value->id ?>" class="text-dark"><?= $value->titulo ?></a>
      </h2>
      <p class="card-text"><?= $value->cabecera ?> </p>
      <!-- <a href="<?= base_url() ?>noticias/leer/<?= $value->id ?>" class="btn btn-primary">Leer mas &rarr;</a> -->
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