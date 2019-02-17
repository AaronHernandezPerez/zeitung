<style>
#contenedor {
  height: 100%;
  overflow: auto;
  background-image: url('<?= base_url() ?>assets/img/login/registro.jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.pointer {
  cursor: pointer;
}


@keyframes shake {

  10%,
  90% {
    transform: translate3d(-1px, 0, 0);
  }

  20%,
  80% {
    transform: translate3d(2px, 0, 0);
  }

  30%,
  50%,
  70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%,
  60% {
    transform: translate3d(4px, 0, 0);
  }
}

.shake {
  animation: shake 0.5s;
}

#captchaMsg {
  color: red;
  background-color: rgba(0, 0, 0, 0.3);
  padding: .5em;
}
</style>
<div id="contenedor" class="row align-items-center justify-content-center m-0">
  <div class="card st-b text-white col-sm-10 col-lg-7 col-xl-5">
    <div class="card-body">
      <h3 class="card-title text-center">Regístrate y da a conocer tu opinión</h3>
      <form action="<?php echo base_url(); ?>login/registrarEditor" method="post" autocomplete="off">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="username">Usuario</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
              </div>
              <input required autofocus maxlength="50" type="text" class="form-control" id="username" name="username"
                placeholder="Tu nombre de usuario">
              <div class="valid-feedback">
                El usuario esta disponible
              </div>
              <div class="invalid-feedback">
                El usuario no esta disponible
              </div>
            </div>
          </div>

          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
              </div>
              <input required max="80" type="text" class="form-control" id="email" name="email"
                placeholder="Ej. periodista@zeitung.com">
              <div class="invalid-feedback">
                El email ya está registrado
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="password">Contraseña</label>
            <div class="input-group">
              <div class="input-group-prepend pointer">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-eye"></i></span>
              </div>
              <input required id="pass1" maxlength="20" type="password" class="form-control passwd is-invalid" id="password"
                name="password" placeholder="********">
              <div class="invalid-feedback">
                La contraseña debe tener al menos 6 caracteres.
              </div>
            </div>
          </div>

          <div class="form-group col-md-6">
            <label for="password">Confirmar Contraseña</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
              </div>
              <input required id="pass2" maxlength="20" type="password" class="form-control passwd" placeholder="********">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input required maxlength="30" type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Pepito">
          </div>

          <div class="form-group col-md-6">
            <label for="apellidos">Apellidos</label>
            <input required maxlength="50" type="text" class="form-control" id="apellidos" name="apellidos"
              placeholder="Ej. Federico García">
          </div>
        </div>

        <div class="form-group d-flex align-items-end">
          <div class="custom-control custom-checkbox pb-2">
            <input required type="checkbox" class="custom-control-input" id="administrador" name="administrador" value="1">
            <label class="custom-control-label" for="administrador">Administrador</label>
          </div>
        </div>
        <div class="d-flex align-items-center flex-column mb-3">
          <div id="captcha" data-callback="captchaValido">
          </div>
          <div id="captchaMsg"></div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <button id="enviar" class="btn btn-success btn-block">Registrarse</button>
          </div>
          <div class="col d-flex justify-content-center">
            <a href="<?php echo base_url() ?>login" class="btn btn-primary btn-block">Ir a login</a>
          </div>
        </div>
      </form>
    </div>
  </div> <!-- Fin de la tarjeta -->
</div>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script type="text/javascript">
var onloadCallback = function() {
  grecaptcha.render('captcha', {
    'sitekey': '6Ldh85EUAAAAAH7QXdu20FqWOgLwwBKabxmSMd3U'
  });
};
</script>