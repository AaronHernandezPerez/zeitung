<style>
  .custom-control-label::before,
  .custom-control-label::after {
    top: -1rem;
    width: 2rem;
    height: 2rem;
  }

  table,
  tr {
    overflow: auto;
  }
</style>

<div class="card shadow">
  <div class="card-body">
    <h3 class="card-title">Comentarios de: <small><?= $noticia ?></small></h3>
    <div>
      <h4 class="text-center mb-3">Filtrar por </h4>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="fPalabra">Palabra</label>
            <input id="fPalabra" class="form-control" type="text">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="fEstado">Estado</label>
            <select id="fEstado" class="form-control">
              <option selected value="0">Todos</option>
              <option value="1">Marcados</option>
              <option value="2">No marcados</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <form method="POST" action="<?= base_url() ?>editor/eliminarComentarios">
      <p class="mb-4"></p>
      <caption align="top">Selecciona los comentarios que deseas eliminar</caption>
      <table class="table table-dark table-hover ">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Comentario</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($comentarios as $value) : ?>
          <tr class="comentario">
            <td><?= $value->nombre ?></td>
            <td><?= $value->comentario ?></td>
            <td>
              <div class="custom-control custom-checkbox d-flex justify-content-center align-items-center">
                <input type="checkbox" class="custom-control-input" id="marcar<?= $value->id ?>" name="id[]"
                  value="<?= $value->id ?>">
                <label class="custom-control-label" for="marcar<?= $value->id ?>"></label>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="row justify-content-around">

        <div class="col-sm-4">
          <button class="btn btn-block btn-lg btn-dark" type="submit">Eliminar</button>
        </div>
        <div class="col-sm-4">
          <a href="<?= base_url() . 'editor/' . $volver ?>" class="btn btn-lg btn-secondary">Cancelar</a>
        </div>
      </div>
    </form>
  </div>
</div>