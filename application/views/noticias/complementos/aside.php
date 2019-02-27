<!-- Sidebar Widget -->
<div class="col-md-4 mt-5 mt-md-0">

  <!-- Widget de búsqueda -->
  <div class="card rounded-0 shadow-sm">
    <h5 class="card-header">Búsqueda</h5>
    <div class="card-body">
      <form action="<?= base_url('noticias/buscar') ?>" method="get">
        <div class="input-group">
          <input required type="search" name="busqueda" class="form-control" placeholder="PHP ..."
            value="<?= (isset($busqueda)) ? $busqueda : ''; ?>">
          <span class="input-group-btn">
            <button class="btn btn-secondary">Buscar</button>
          </span>
        </div>
      </form>
    </div>
  </div>

  <!-- Widget de tags -->
  <div class="card rounded-0 shadow-sm my-4">
    <h5 class="card-header">Tags</h5>
    <div class="card-body">
      <div id="tags">
      </div>
    </div>
  </div>

  <!-- Plantilla side widget-->
  <!-- <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
          You can put anything you want inside of these side widgets. They are easy to use, and feature the new
          Bootstrap 4 card containers!
        </div>
      </div> -->

</div>
<!-- Fin col-md-4 -->

</div>
<!-- Fin row -->