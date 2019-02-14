<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-hidden="true">
  <!-- Modal -->
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        Estas seguro que quieres borrar la noticia <b><?= $titulo ?></b>, del autor: <b><?= $autor ?></b>.
      </div>
      <div class="modal-footer justify-content-around">
        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Cancelar</button>
        <button data-id="<?= $id ?>" data-titulo="<?= $titulo ?>" id="btnBorrar" type="button"
          class="btn btn-lg btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>