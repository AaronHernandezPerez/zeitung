<div class="container">
  <h1>Registro de Periodista</h1>
  <form action="<?php echo base_url(); ?>editor/registrarEditor" method="post" autocomplete="off">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="username">Usuario</label>
        <input maxlength="50" type="text" class="form-control" id="username" name="username" placeholder="Usuario">
      </div>

      <div class="form-group col-md-4">
        <label for="password">Contraseña</label>
        <input maxlength="20" type="password" class="form-control" id="password" name="password"
          placeholder="Contraseña">
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
          <input type="hidden" name="administrador" value="0">
          <input type="checkbox" class="custom-control-input" id="administrador" name="administrador" value="1">
          <label class="custom-control-label" for="administrador">Administrador</label>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center mt-2">
      <button class="btn btn-lg btn-success">Registrarse</button>
    </div>
  </form>
</div>