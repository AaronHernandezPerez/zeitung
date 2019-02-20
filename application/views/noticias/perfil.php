<style>
th {
  min-width: 6em;
}
</style>

<!-- Page Content -->
<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">

    <div class="card">
      <div class="card-body">
        <!-- <h3 class="card-title"><?= "$editor->nombre $editor->apellidos" ?> </h3> -->
        <div class="media">
          <img src="<?= base_url() ?>assets/img/<?= $editor->imagen_p ?>" class="mr-3" width="74px">
          <div class="media-body">
            <h3 class="mt-0"><?= "$editor->nombre $editor->apellidos" ?></h3>
            <?php if ($editor->administrador == 1) : ?>
            <p class="card-text">Editor senior</p>
            <?php else : ?>
            <p class="card-text">Editor junior</p>
            <?php endif; ?>
            <div class="form-group row">
              <label for="staticEmail" class="col-lg-2 col-form-label">Email</label>
              <div class="col-lg-10">
                <input type="text" readonly class="form-control-plaintext" value="<?= $editor->email ?> ">
              </div>
            </div>
          </div>
        </div> <!-- Fin media -->

        <h4 class="my-3">Noticias publicadas</h4>
        <table class="table table-sm table-striped">
          <thead>
            <tr>
              <th scope="col">Titulo</th>
              <th scope="col">Fecha</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($noticias as $value) : ?>
            <tr>
              <td><a href="<?= base_url() ?>noticias/leer/<?= $value->id ?>"><?= $value->titulo ?></a></td>
              <td><?= date('d-m-Y', strtotime($value->fecha)) ?></td>
            </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>

  </div>
  <?php 
    // Carga el menu aside
  $this->load->view('noticias/complementos/aside.php');
  ?>