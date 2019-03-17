// Constantes
const $autor = $('#autor');
const $mostrar = $('#mostrar');
const $noticias = $('#noticias');

/**
 * Función para obtener las noticias de cada autor
 */
$mostrar.on('click', function () {
  $.post(`${BASE_URL}editor/obtenerListaNoticias`,
    {
      id: $autor.val(),
      titulo: `Noticias publicadas por: ${$("option:selected", $autor).text()}`
    },
    function (data) {
      // Añadimos las noticias generadas desde el PHP
      $noticias.html(data);

      // Añadimos los eventos a los botones añadidos

      // Función para borrar la noticia
      $('.btnBorrar').on('click', function () {
        borrarModal(this);
      });

      // Función para el boton de moderar comentarios
      $('.btn-coment').on('click', function () {
        const id = `alertaBorrar${contAlertas++}`
        $contAlertas.append(alertaBorrar(id));
        setTimeout(() => {
          $(`#${id}`).alert('close');
        }, 2500);
      });
    }
  );
});