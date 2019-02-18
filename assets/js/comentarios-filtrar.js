$(function () {
  const $comentarios = $('.comentario');

  const $fPalabra = $('#fPalabra');
  // Manejador de eventos del filtro palabra
  $fPalabra.on('input', function () {
    if (this.value == '') {
      $comentarios.css('display', 'table-row');
    } else {
      // Si se ha introducido algun valor
      $comentarios.css('display', 'none');
      $comentarios.each(function () {
        if (this.textContent.toLowerCase().includes($fPalabra.val().toLowerCase())) {
          console.log($(this).css('display', 'table-row'));
        }
      });
    }
  });

  // Select para filtrar por estado 
  const $fEstado = $('#fEstado');

  const $checkbox = $('input.custom-control-input');

  $checkbox.on('input', function () {
    filtrarCheckbox($fEstado.val());
  });

  // Evento del select
  $fEstado.on('input', function () {
    filtrarCheckbox(this.value)
  });

  function filtrarCheckbox(value) {
    switch (value) {
      case '1':
        // Mostramos solo los marcados
        $checkbox.parents('tr').css('display', 'none');
        $checkbox.filter(':checked').parents('tr').css('display', 'table-row');
        break;
      case '2':
        // Mostramos solo los no marcados
        $checkbox.parents('tr').css('display', 'none');
        $checkbox.filter(':not(:checked)').parents('tr').css('display', 'table-row');
        break;

      default:
        // Mostramos todos
        $checkbox.parents('tr').css('display', 'table-row');
        break;
    }
  }
});