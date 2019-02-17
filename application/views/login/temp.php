<div class="container">
  <?php echo $alertas ?>
  <div class="row justify-content-center">
    <div class="card col-sm-8">
      <div class="card-body">
        <h3 class="card-title text-center">Inicia sesión</h3>
        <form action="<?php echo base_url() ?>login/comprobarCredenciales" method="post" autocomplete="off">
          <div class="form-group">
            <label for="username">Nombre de usuario</label>
            <input autofocus type="text" class="form-control" id="username" name="username" placeholder="Username">
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

<div class="form-row">
  <div class="form-group col-md-4">
    <label for="username">Usuario</label>
    <input autofocus maxlength="50" type="text" class="form-control" id="username" name="username"
      placeholder="Usuario">
  </div>

  <div class="form-group col-md-4">
    <label for="password">Contraseña</label>
    <input maxlength="20" type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
  </div>

  <div class="form-group col-md-4">
    <label for="email">Email</label>
    <input max="80" type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-4">
    <label for="nombre">Nombre</label>
    <input maxlength="30" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
  </div>

  <div class="form-group col-md-4">
    <label for="apellidos">Apellidos</label>
    <input maxlength="50" type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
  </div>

  <div class="form-group col-md-4 d-flex align-items-end">
    <div class="custom-control custom-checkbox pb-2">
      <input type="checkbox" class="custom-control-input" id="administrador" name="administrador" value="1">
      <label class="custom-control-label" for="administrador">Administrador</label>
    </div>
  </div>
</div>

<div class="row">
  <div class="col d-flex justify-content-center">
    <button class="btn btn-success btn-block">Registrarse</button>
  </div>
  <div class="col d-flex justify-content-center">
    <a href="<?php echo base_url() ?>login" class="btn btn-primary btn-block">Ir a login</a>
  </div>
</div>