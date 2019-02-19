<div class="card shadow">
  <div class="card-body">

    <div class="row">
      <div class="form-group col-md-5">
        <label for="autor">Selecciona un autor</label>
        <select id="autor" class="form-control">
          <?php foreach ($autores as $value) : ?>
          <option value="<?= $value->id ?>"><?= $value->nombre ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md d-flex justify-content-center align-items-end">
        <button id="mostrar" class="btn btn-dark my-3" type="button">Mostrar noticias</button>
      </div>
    </div>

    <div id="noticias">

    </div>
  </div>
</div>

<div id="alertas">
</div>