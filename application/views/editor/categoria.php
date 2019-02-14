<div class="card">
  <div class="card-body">
    <h3 class="card-title text-center">Añade una categoría</h3>
    <form action="<?php echo base_url() ?>editor/addCategoria" method="post">
      <div class="form-group row">
        <label for="nombre" class="col-sm-3 col-form-label">Categoria</label>
        <div class="col-sm-9">
          <input maxlenght="100" type="text" class="form-control" id="nombre" name="nombre" placeholder="ej. Tecnología"
            autofocus>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <button class="btn btn-lg btn-dark">Registrar categoría</button>
      </div>
    </form>

    <h3 class="text-center mt-5">Modificar una Categoría</h3>
    <form action="<?php echo base_url() ?>editor/actualizarCategoria" method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nombreAnterior">Categoria</label>
          <select id="nombreAnterior" name="nombreAnterior" class="form-control">
            <?php foreach ($categorias as $value) : ?>
            <option value="<?php echo $value->nombre ?>"><?php echo $value->nombre ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="form-group col-md-6">
          <label for="nombre">Nuevo nombre</label>
          <input maxlenght="100" type="text" class="form-control" id="nombre" name="nombre" placeholder="ej. Tecnología"
            autofocus>
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <button class="btn btn-lg btn-dark">Cambiar categoría</button>
      </div>
    </form>

  </div>
</div>