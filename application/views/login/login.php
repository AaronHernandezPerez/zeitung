<style>
@-webkit-keyframes AnimationName {
  0% {
    background-position: 0% 50%
  }

  50% {
    background-position: 100% 50%
  }

  100% {
    background-position: 0% 50%
  }
}

@-moz-keyframes AnimationName {
  0% {
    background-position: 0% 50%
  }

  50% {
    background-position: 100% 50%
  }

  100% {
    background-position: 0% 50%
  }
}

@keyframes AnimationName {
  0% {
    background-position: 0% 50%
  }

  50% {
    background-position: 100% 50%
  }

  100% {
    background-position: 0% 50%
  }
}

#fila100 {
  height: 100%;
  background: linear-gradient(270deg, #4b7d8a, #03445b);
  background-size: 400% 400%;
  overflow: auto;

  -webkit-animation: AnimationName 30s ease infinite;
  -moz-animation: AnimationName 30s ease infinite;
  animation: AnimationName 30s ease infinite;

}

#left {
  background-image: url('<?= base_url() ?>assets/img/login/login.jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

h4 {
  background-color: rgba(0, 0, 0, 0.5)
}
</style>

<div id="fila100" class="row m-0">
  <div class="col-md-6 d-flex align-items-center justify-content-center order-md-1 row">
    <div class="card shadow st-bw my-5 my-md-0">
      <div class="card-body">
        <h3 class="card-title text-center">Inicia sesión</h3>
        <?= $this->alertas->show() ?>
        <form action="<?php echo base_url() ?>login/comprobarCredenciales" method="post" autocomplete="off">
          <div class="form-group">
            <label for="username">Nombre de usuario</label>
            <input autofocus type="text" class="form-control " id="username" name="username" placeholder="Username">
          </div>

          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="*******">
          </div>

          <div class="row px-5">
            <button class="btn btn-success btn-block">Iniciar Sesión</button>
            <a href="<?php echo base_url() ?>login/solicitar" class="btn btn-primary btn-block">Mandar solicitud</a>
            <a href="<?php echo base_url() ?>" class="btn btn-dark btn-block">Volver</a>
          </div>
        </form>
      </div>
    </div> <!-- Fin de la tarjeta -->
  </div>

  <div id="left" class="col-md-6 d-flex align-items-center">
    <h4 class="display-4 text-white shadow text-j p-4 my-1">El afortunado hallazgo de un solo libro puede cambiar el
      destino de un hombre.</h4>
  </div>
</div>