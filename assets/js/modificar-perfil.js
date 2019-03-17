const $file = $('#imagen_p');

/**
 * Función para mostrar el nombre de los archivos subidos en el input[file]
 */
$file.on('input', function () {
  const archivos = [...this.files];
  let archivosNombre = archivos.map(a => a.name);
  $(this).next().text(archivosNombre.join(', '));
});


// Comprobación de las contraseñas al hacer blur
const $pass1 = $('#password');
const $pass2 = $('#password2');

// Función para validar las contaseñas, esto es que sean mas de 5 caracteres y sean iguales
$('input[type="password"]').on('input', function () {
  // Primero comprobamos que tengan almenos 6 carácteres
  $this = $(this);
  if (this.value.length < 5) {
    $this.addClass('is-invalid')
    $this.next('.invalid-feedback').text('La contraseña debe tener al menos 5 caracteres.')
  } else {
    $this.removeClass('is-invalid');
    // Si las 2 tienen valor y no son iguales
    if (($pass1.val() != '' && $pass2.val() != '') && ($pass1.val() != $pass2.val())) {
      // Mostramos el mensaje de error
      $pass1.addClass('is-invalid')
      $pass1.next('.invalid-feedback').text('Las contraseñas no coinciden.')

      $pass2.addClass('is-invalid')
      $pass2.next('.invalid-feedback').text('Las contraseñas no coinciden.')
    } else {
      $pass1.removeClass('is-invalid');
      $pass2.removeClass('is-invalid');
    }
  }
});

// Comprobación de errores en la contraseña

// Constantes del DOM
const $btnPass = $('#btnPass');
const $formPass = $('#formPass');
const $currentpass = $('#currentpass');
const $passAlerta = $('#passAlerta');

$formPass.on('submit', function () {
  event.preventDefault();
  // Comprobamos que no haya valores inválidos
  let errores = $formPass.find('input.is-invalid')
  if (errores.length > 0) {
    $btnPass.addClass('disabled').addClass('shake');

    // Timeout para eliminar la clase 'Shake'
    setTimeout(() => {
      $btnPass.removeClass('shake');
    }, 500);

    // Seleccionamos el primer error
    errores.eq(0).select();
  } else {
    // si todo está correcto enviamos la petición por AJAX
    $.post(`${BASE_URL}editor/cambiarPassword`,
      {
        currentpass: $currentpass.val(),
        password: $pass1.val()
      },
      function (response) {
        response = JSON.parse(response);
        console.log(response);

        $passAlerta.html(response[1]);
        if (response[0] == 1) {
          console.log('reset');

          $formPass.trigger("reset");
        } else {
          $currentpass.select();
        }
      }
    );

  }
});

// Evento para eliminar el disabled del botón al escribir
$formPass.find('input').on('input', function () {
  $btnPass.removeClass('disabled');
});
