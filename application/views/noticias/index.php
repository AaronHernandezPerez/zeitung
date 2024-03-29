<!-- Page Content -->
<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">

    <?php foreach ($noticias as $value) : ?>
    <!-- Blog Post -->
    <!-- <div class="mb-3 rounded-0 shadow-sm bg-white p-2">
      <h2>
        <a href="<?= base_url() ?>noticias/leer/<?= $value->id ?>" class="text-dark"><?= $value->titulo ?></a>
      </h2>
      <p class="card-text"><?= $value->cabecera ?> </p>
    </div> -->

    <div class="card mb-4">
      <div class="card-body">
        <h2 class="card-title"><a href="<?= base_url() ?>noticias/leer/<?= $value->id ?>"
            class="text-dark"><?= $value->titulo ?></a></h2>
        <p class="card-text"><?= $value->cabecera ?> </p>
      </div>
      <div class="card-footer p-0 px-2">
        <div class="row">
          <div class="col-lg-6">Autor
            <a href="<?= base_url('noticias/perfil/' . $value->autor) ?>"><?= $value->nombre ?></a></div>
          <div class="col-lg-6 d-flex align-items-center justify-content-lg-end">
            <i class="far fa-comments text-primary mx-1"></i> <?= $value->comentarios ?> Comentarios
          </div>
        </div>
      </div>
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