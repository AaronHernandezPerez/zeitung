<div class="container">
  <?php echo $alertas ?>
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Inicia sesión</h3>
          <form action="<?php echo base_url() ?>login/comprobarCredenciales" method="post" autocomplete="off">
            <div class="form-group">
              <label for="username">Nombre de usuario</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>

            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="*******">
            </div>

            <div class="row">
              <div class="col">
                <button class="btn btn-success btn-block">Iniciar Sesión</button>
              </div>
              <div class="col">
                <a href="<?php echo base_url() ?>login/registro" class="btn btn-primary btn-block">Registrarse</a>
              </div>
            </div>
          </form>
        </div>
      </div> <!-- Fin de la tarjeta -->
    </div>

  </div>

</div>