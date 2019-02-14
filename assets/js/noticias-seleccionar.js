const $contenedor = $('.container:eq(0)');
const $contAlertas = $('#alertas');

let contAlertas = 0;

// spaghetti a la boloñesa para manejar la creación del modal y la creación de la alerta al hacer click en borrar una noticia
// Y borrar la tabla al recibir la respuesta
$('.btnBorrar').on('click', function () {
  $.post(`${BASE_URL}editor/modalBorrar`,
    { id: this.dataset.id, titulo: this.dataset.titulo },
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
            $(this).parents('.filaNoticias').remove();
          });
      });
    });
});