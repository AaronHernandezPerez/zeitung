// Constantes
const $autor = $('#autor');
const $mostrar = $('#mostrar');
const $noticias = $('#noticias');

$mostrar.on('click', function () {
  $.post(`${BASE_URL}editor/obtenerListaNoticias`,
    {
      id: $autor.val(),
      titulo: `Noticias publicadas por: ${$("option:selected", $autor).text()}`
    },
    function (data) {
      // Añadimos los eventos a los botones añadidos

      $noticias.html(data);
      $('.btnBorrar').on('click', function () {
        borrarModal(this);
      });

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