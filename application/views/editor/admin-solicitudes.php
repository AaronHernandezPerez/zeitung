<div class="card shadow">
  <div class="card-body">
    <h3 class="card-title text-center">Acepta o rechaza las solicitudes</h3>
    <?php if (count($solicitudes) > 0) : ?>
    <?php foreach ($solicitudes as $key => $value) : ?>
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title"><?= $value->nombre ?></h5>
        <p class="card-text"><?= $value->texto ?></p>
        <?php if ($value->token) : ?>
        <h5 class="text-success text-center">Solicitud aceptada, pendiente de registro</h5>
        <?php else : ?>
        <div class="row">
          <div class="col-md-6 d-flex justify-content-center align-items-center">
            <button class="btn btn-dark btn-block mx-5 aceptar" data-id="<?= $value->id ?>"
              data-email="<?= $value->email ?>" type="button">Aceptar</button>
          </div>
          <div class="col-md-6 d-flex justify-content-center align-items-center">
            <button class="btn btn-secondary btn-block mx-5 rechazar" data-id="<?= $value->id ?>"
              data-email="<?= $value->email ?>" type="button">Rechazar</button>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php endforeach; ?>
    <?php else : ?>
    <h5>No hay ninguna solicitud</h5>
    <?php endif; ?>

  </div>
</div>

<div id="alertas">
</div>