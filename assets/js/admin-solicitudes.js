const $btnAceptar = $('.aceptar');
const $btnRechazar = $('.rechazar');
const $alertas = $('#alertas');
let contAlertas = 0;

// Manejador de eventos al aceptar una solicitud
$btnAceptar.on('click', function () {
  $.post(`${BASE_URL}editor/aceptarSolicitud`, { id: this.dataset.id, email: this.dataset.email },
    data => {
      console.log(data);

      const text = 'Solicitud aceptada con éxito.';
      // creamos la alerta
      alerta(contAlertas++, 'success', text);
      // Borramos la tarjeta
      location.reload();
    }
  );
});

// Manejador de eventos al aceptar una solicitud
$btnRechazar.on('click', function () {
  $.post(`${BASE_URL}editor/rechazarSolicitud`, { id: this.dataset.id, email: this.dataset.email },
    data => {
      console.log(data);

      const text = 'Solicitud rechazada con éxito.';
      // creamos la alerta
      alerta(contAlertas++, 'danger', text);
      // Borramos la tarjeta
      location.reload();
    }
  );
});


/**
 * Funcion para generar la alerta
 *
 * @param string id id de la alerta, utilizada para borrarla posteriormente
 * @param string clase Clase de la alerta
 * @param string texto Contenido de la alerta
 */
function alerta(id, clase, texto) {
  const alerta = `<div id="${id}" class="alert alert-${clase} alert-dismissible fade show w-50 ml-auto " role="alert">
  ${texto}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>`;

  $alertas.append(alerta);
  setTimeout(() => {
    $(`#${id}`).alert('close');
  }, 2500);
}