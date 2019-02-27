<style>
body {
  background-image: url('<?= base_url() ?>assets/img/login/solicitar.jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.row {
  overflow: auto;
}
</style>

<div class="row h-100 justify-content-center align-items-center m-0 p-0">
  <div class="col-sm-8 col-lg-5 col-">
    <div class="card shadow st-b text-white">
      <div class="card-body">
        <h3 class="card-title text-center">¡Envíanos tu solicitud!</h3>
        <p>Si quieres formar parte de nuestro equipo ¡no lo dudes!, envianos tu solicitud, nuestro equipo la revisará y
          te contestaremos lo antes posible.</p>
        <form method="post" action="<?= base_url('login/enviarSolicitud') ?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nombre">Nombre y apellidos</label>
              <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Pedro">
            </div>

            <div class="form-group col-md-6">
              <label for="email">Correo</label>
              <input required type="email" class="form-control" id="email" name="email"
                placeholder="Ej. correo@algo.mx">
            </div>
          </div>

          <div class="form-group">
            <label for="texto">¡Cuéntanos mas sobre ti!</label>
            <textarea required id="texto" name="texto" class="form-control" rows="3"
              placeholder="Buenas, me pongo en contacto con ustedes..."></textarea>
          </div>

          <div class="row justify-content-around">
            <div class="col-4">
              <button class="btn btn-outline-success btn-lg btn-block" type="submit">Enviar</button>
            </div>
            <div class="col-4">
              <a href="<?php echo base_url() ?>login" class="btn btn-outline-primary btn-lg btn-block">Volver</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>