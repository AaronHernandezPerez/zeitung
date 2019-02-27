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

#captchaMsg,
.invalid-feedback {
  color: red;
  background-color: rgba(0, 0, 0, 0.5);
  padding: .5em;
}

.valid-feedback {
  background-color: rgba(0, 0, 0, 0.5);
  padding: .5em;
}
</style>
<div id="contenedor" class="row align-items-center justify-content-center m-0">
  <div class="card st-b text-white col-sm-10 col-lg-7 col-xl-5">
    <div class="card-body">
      <h3 class="card-title text-center">Regístrate y da a conocer tu opinión</h3>
      <form action="<?php echo base_url(); ?>login/registrarEditor" method="post" autocomplete="off">
        <input type="hidden" name="token" value="<?= $solicitud->token ?>">
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
                value="<?= $solicitud->email ?>" placeholder="Ej. periodista@zeitung.com">
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
              <input required id="pass1" maxlength="20" type="password" class="form-control passwd is-invalid"
                id="password" name="password" placeholder="********">
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
              <input required id="pass2" maxlength="20" type="password" class="form-control passwd"
                placeholder="********">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input required maxlength="30" type="text" class="form-control" id="nombre" name="nombre"
              placeholder="Ej. Pepito" value="<?= array_shift($solicitud->nombre) ?>">
          </div>

          <div class="form-group col-md-6">
            <label for="apellidos">Apellidos</label>
            <input required maxlength="50" type="text" class="form-control" id="apellidos" name="apellidos"
              placeholder="Ej. Federico García" value="<?= implode(' ', $solicitud->nombre) ?>">
          </div>
        </div>

        <!-- <div class="form-group d-flex align-items-end">
          <div class="custom-control custom-checkbox pb-2">
            <input type="checkbox" class="custom-control-input" id="administrador" name="administrador" value="1">
            <label class="custom-control-label" for="administrador">Administrador</label>
          </div>
        </div> -->

        <div class="form-group d-flex align-items-end">
          <div class="custom-control custom-checkbox pb-2">
            <input required type="checkbox" class="custom-control-input" id="terminos">
            <label class="custom-control-label" for="terminos">Acepto los <a href="#" data-toggle="modal"
                data-target="#modalTerminos">Términos y
                condiciones</a></label>
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

  <!-- Modal de los términos -->
  <div class="modal fade" id="modalTerminos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Términos y condiciones</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>
            PROTECCIÓN DE DATOS DE CARÁCTER CONFIDENCIAL
          </h5>

          <p>
            En cumplimiento de lo establecido en la Ley Orgánica actual de Protección de Datos de Carácter Personal,
            zeitung.com informa a sus clientes de que cuantos datos personales le faciliten serán
            incluidos
            en un fichero automatizado de datos de carácter personal, creado y mantenido bajo nuestra responsabilidad.
            La
            finalidad de dicho fichero es facilitar la tramitación de los pedidos y enviar ofertas comerciales en el
            futuro sobre productos y servicios que puedan resultar de interés para nuestros clientes (siempre y cuando
            sea
            aceptado por el cliente). zeitung.com garantiza la seguridad y confidencialidad de los datos
            facilitados, comprometiéndose al cumplimiento de su obligación de guardar secreto de los datos de carácter
            personal y de su deber de guardarlos y adoptar todas aquellas medidas que sean necesarias para evitar su
            alteración, pérdida, tratamiento o uso no autorizado por el cliente. Por lo tanto, toda información en
            relación sobre nuestros clientes no será utilizada con propósito comerciales ni será cedida a terceros.
            Nuestros clientes podrán, en todo momento, ejercer su derecho de acceso, rectificación, cancelación u
            oposición, enviando un correo electrónico a zeitungiesagora@gmail.com
          </p>

          <h5>
            UTILIZACIÓN CORRECTA DE LOS SERVICIOS
          </h5>

          <p>
            El Cliente se obliga a usar los servicios del Sitio Web de forma diligente, correcta y lícita y, en
            particular, a título meramente enunciativo y no limitativo, se compromete a abstenerse de: (a) Utilizar los
            Servicios de forma, con fines o efectos contrarios a la ley, a la moral y a las buenas costumbres
            generalmente
            aceptadas o al orden público. (b) Reproducir o copiar, distribuir, permitir el acceso del público a través
            de
            cualquier modalidad de comunicación pública, transformar o modificar los servicios, a menos que se cuente
            con
            la autorización del titular de los correspondientes derechos o ello resulte legalmente permitido. (c)
            Realizar
            cualquier acto que pueda ser considerado una vulneración de cualesquiera derechos de propiedad intelectual o
            industrial pertenecientes a zeitung.com o a terceros. (d) Emplear los Servicios y, en
            particular, la información de cualquier clase obtenida a través del Sitio Web para remitir publicidad,
            comunicaciones con fines de venta directa o con cualquier otra clase de finalidad comercial, mensajes no
            solicitados dirigidos a una pluralidad de personas con independencia de su finalidad, así como de
            comercializar o divulgar de cualquier modo dicha información. El Cliente responderá de los daños y
            perjuicios
            de toda naturaleza que zeitung.com pueda sufrir, con ocasión o como consecuencia del
            incumplimiento de cualquiera de las obligaciones anteriormente expuestas así como cualesquiera otras
            incluidas
            en las presentes Condiciones Generales y/o las impuestas por la Ley en relación con la utilización del Sitio
            Web zeitung.com velará en todo momento por el respeto del ordenamiento jurídico vigente, y
            estará legitimada para interrumpir, a su entera discreción, el servicio o excluir al Socio del Sitio Web en
            caso de presunta comisión, completa o incompleta, de alguno de los delitos o faltas tipificados por el
            Código
            Penal vigente, o en caso de observar cualesquiera conductas que a juicio de zeitung.com
            resulten.
          </p>

          <h5>
            DERECHOS DE PROPIEDAD
          </h5>

          <p>
            Todos los contenidos del Sitio Web, tales como textos, gráficos, fotografías, logotipos, iconos, imágenes,
            así como el diseño gráfico, código fuente y software, son de la exclusiva propiedad de
            zeitung.com o de terceros, cuyos derechos al respecto ostenta legítimamente
            zeitung.com, estando por lo tanto protegidos por la legislación nacional e internacional.
            Queda estrictamente prohibido la utilización de todos los elementos objeto de propiedad industrial e
            intelectual con fines comerciales así como su distribución, modificación, alteración o descompilación. La
            infracción de cualquiera de los citados derechos puede constituir una vulneración de las presentes
            disposiciones, así como un delito castigado de acuerdo con los artículos 270 y siguientes del Código Penal.
          </p>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script type="text/javascript">
var onloadCallback = function() {
  grecaptcha.render('captcha', {
    'sitekey': '6Ldh85EUAAAAAH7QXdu20FqWOgLwwBKabxmSMd3U'
  });
};
</script>