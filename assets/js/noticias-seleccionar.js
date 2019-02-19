const $contenedor = $('.container:eq(0)');
const $contAlertas = $('#alertas');

let contAlertas = 0; // Para poner una id a las alertas

// spaghetti a la boloñesa para manejar la creación del modal y la creación de la alerta al hacer click en borrar una noticia
// Y borrar la tabla al recibir la respuesta
$('.btnBorrar').on('click', function () {
  borrarModal(this);
});

function borrarModal(elemento) {
  $.post(`${BASE_URL}editor/modalBorrar`,
    { id: elemento.dataset.id, titulo: elemento.dataset.titulo },
    (data) => {
      // Se añade al container
      $contenedor.append(data);

      // Manejador de eventos para eliminar el modal al cerrarlo
      const modal = $('#modalBorrar');
      modal.modal('show');
      modal.on('hidden.bs.modal', () => {
        modal.remove();
      });

      // Manejador de eventos para el boton de borrar del modal
      const btnBorrar = $('#btnBorrar');
      btnBorrar.on('click', () => {
        // Primero se cierra la alerta
        modal.modal('hide')

        // Al hacer click en el boton de borrar del modal, enviamos la señal definitiva de borrar
        const idAlerta = contAlertas++;
        $.post(`${BASE_URL}editor/eliminarNoticia`,
          {
            id: btnBorrar.data('id'),
            titulo: btnBorrar.data('titulo'),
            idAlerta: idAlerta
          },
          (data) => {
            // Devuelve una alerta, la mostramos y la eliminamos pasados unos segundos
            $contAlertas.append(data);
            setTimeout(() => {
              $(`#alerta${idAlerta}`).alert('close');
            }, 2500);

            // Eliminamos la fila de la noticia
            $(elemento).parents('tr').remove();
          });
      });
    });
}
// Manejador de eventos para las noticias sin comentarios
let $btnComentarios = $('.btn-coment')

$btnComentarios.on('click', function () {
  const id = `alertaBorrar${contAlertas++}`
  $contAlertas.append(alertaBorrar(id));
  setTimeout(() => {
    $(`#${id}`).alert('close');
  }, 2500);
});


function alertaBorrar(id) {
  return `<div id="${id}" class="alert alert-danger alert-dismissible fade show w-50 ml-auto " role="alert">
  Esta noticia <strong>no tiene comentarios</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>`;
}