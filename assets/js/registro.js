$(function () {
  // Activa/desactiva el type password al hacer click al ojo
  $('.input-group-text:has(.fa-eye)').on('click', function () {
    $('input.passwd').each(function () {
      const $passwd = $(this);
      if ($passwd.attr('type') === 'password') {
        $passwd.attr('type', 'text');
      } else {
        $passwd.attr('type', 'password');
      }
    });

    const $icono = $(this).find('i');
    $icono.toggleClass('fa-eye-slash');
    $icono.toggleClass('fa-eye');
  });


  // Comprobar via ajax que el usuario o el email no esten ya registrados
  $('#username,#email').on('blur', function () {
    if (this.value != '') {
      validarRegistro(this.getAttribute("name"), this.value);
    }
  });


  // Comprobación de las contraseñas al hacer blur
  const $pass1 = $('#pass1');
  const $pass2 = $('#pass2');

  // 
  $('.passwd').on('input', function () {
    // Primero comprobamos que tengan almenos 6 carácteres
    $this = $(this);
    if (this.value.length < 6) {
      $this.addClass('is-invalid')
      $this.next('.invalid-feedback').text('La contraseña debe tener al menos 6 caracteres.')
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

  // Comprueba que no haya valores incorrectos
  // Boton de enviar
  const $boton = $('#enviar');

  // Al cambiar algun valor le quitamos el disabled
  $('input').on('input', function () {
    $boton.removeClass('disabled');
  });

  const captchaMsh = document.getElementById('captchaMsg');

  $('form:eq(0)').on('submit', function () {
    event.preventDefault();
    if ($('input.is-invalid').length > 0 || grecaptcha.getResponse() == '') {
      // alert('Hay datos incorrectos!');
      $boton.addClass('disabled').addClass('shake');
      // Timeout para eliminar la clase 'Shake'
      setTimeout(() => {
        $boton.removeClass('shake');
      }, 500);
      if (grecaptcha.getResponse() == '') {
        captchaMsh.innerHTML = 'Debes completar el Captcha';
      }
    } else {
      this.submit();
    }
  });

});

// Funcion llamda al completar el captcha satisfactoriamente
function captchaValido() {
  document.getElementById('captchaMsg').innerHTML = '';
  document.getElementById("enviar").classList.remove("disabled");
}

// Funcion para validar los campos, utilizada en el username y el email
function validarRegistro(campo, valor) {
  $.post(`${BASE_URL}login/validacionesR`,
    {
      campo: campo,
      valor: valor,
    },
    function (respuesta) {
      if (respuesta == 1) {
        $(`#${campo}`).addClass('is-valid');
        $(`#${campo}`).removeClass('is-invalid');
      } else {
        $(`#${campo}`).addClass('is-invalid');
        $(`#${campo}`).removeClass('is-valid');
      }
    }
  );
}