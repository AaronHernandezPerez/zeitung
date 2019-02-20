<!-- Page Content -->
<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">
    <h1 class="mb-4">Mostrando resultados de "<?= $busqueda ?>"</h1>

    <?php if (count($noticias) == 0) : ?>
    <h4 class="text-danger">No hay resultados que coincidan con la búsqueda</h4>
    <?php else : ?>

    <?php foreach ($noticias as $value) : ?>
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

    <?php endif; ?>

  </div>
  <?php 
    // Carga el menu aside
  $this->load->view('noticias/complementos/aside.php');
  ?>