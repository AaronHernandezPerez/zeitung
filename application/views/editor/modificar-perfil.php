<style>
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
</style>

<div class="card">
  <div class="card-body">
    <h3 class="card-title">Datos de <?= $_SESSION['username'] ?></h3>

    <!-- Imagen -->
    <div class="row border p-2 mb-3">
      <div class="col-md-6">
        <h5 class="text-center">Imagen de perfil</h5>
        <img class="img-thumbnail rounded-circle mx-auto d-block"
          src="<?= base_url('assets/img/') . $editor->imagen_p ?>" alt="" width="50%">
      </div>
      <div class="col-md-6">
        <form action="<?= base_url('editor/cambiarImagen') ?>" method="post" enctype="multipart/form-data"
          class=" d-flex flex-column justify-content-between h-100">
          <h5>Cambiar imagen</h5>
          <div class="custom-file">
            <input required id="imagen_p" name="imagen_p" class="custom-file-input" type="file">
            <label for="imagen_p" class="custom-file-label">Imagen de perfil</label>
          </div>
          <button class="btn btn-dark btn-block mt-2" type="submit">Subir Imagen</button>
        </form>
      </div>
    </div>

    <!-- Datos personales -->
    <div class=" border p-2 mb-3">
      <h4 class="text-center">Datos personales</h4>

      <form action="<?= base_url('editor/cambiarDatos') ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="nombre">Nombre</label>
            <input required type="text" class="form-control" id="nombre" name="nombre" value="<?= $editor->nombre ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="apellidos">Apellidos</label>
            <input required type="text" class="form-control" id="apellidos" name="apellidos"
              value="<?= $editor->apellidos ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Email</label>
            <input required type="email" class="form-control" id="email" name="email" value="<?= $editor->email ?>">
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button class="btn btn-dark" type="submit">Actualizar Datos</button>
        </div>
      </form>
    </div>

    <!-- Contraseña -->
    <div class=" border p-2 mb-3">
      <h4 class="text-center">Contraseña</h4>
      <div id="passAlerta"></div>
      <form id="formPass">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="currentpass">Contraseña actual</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input required type="password" class="form-control" id="currentpass" name="currentpass"
                placeholder="******">
              <div class="invalid-feedback"></div>
            </div>
          </div>

          <div class="form-group col-md-4">
            <label for="password">Nueva contraseña</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
              </div>
              <input required type="password" class="form-control is-invalid" id="password" name="password"
                placeholder="******">
              <div class="invalid-feedback">
                La contraseña debe tener al menos 6 caracteres.
              </div>
            </div>
          </div>

          <div class="form-group col-md-4">
            <label for="password">Repetir nueva contraseña</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
              </div>
              <input required type="password" class="form-control" id="password2" placeholder="******">
              <div class="invalid-feedback"></div>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-center">
          <button id="btnPass" class="btn btn-dark" type="submit">Actualizar Datos</button>
        </div>
      </form>

    </div>

  </div> <!-- Fin de card -->
</div>