<!-- Librerias Quill -->
<script src="<?php echo base_url() ?>assets/libraries/quill/quill.js"></script>
<!-- Temas de quill -->
<link href="<?php echo base_url() ?>assets/libraries/quill/quill.snow.css" rel="stylesheet">

<div class="card">
  <div class="card-body">
    <h3 class="card-title">Publicar Noticia</h3>
    <form method="post" action="<?php echo base_url() ?>editor/addNoticia">
      <div class="form-group">
        <label for="titulo">Titulo</label>
        <input autofocus type="text" class="form-control" id="titulo" name="titulo" placeholder="ej Algo" maxlength="100"
          required>
      </div>

      <div class="form-group">
        <label for="categoria">Selecciona la categoria</label>
        <select id="categoria" name="categoria" class="form-control">
          <!-- Rellenado dinamicamente con php -->
          <?php foreach ($categorias as $value) : ?>
          <option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="form-group">
        <label for="cabecera">Cabecera</label>
        <textarea id="cabecera" name="cabecera" class="form-control" maxlength="500" rows="8" required></textarea>
        <small>Te quedan <span id="maxCabecera">500</span> caracteres</small>
      </div>

      <div class="form-group">
        <label for="cuerpo">Cuerpo</label>
        <input id="cuerpoInput" type="hidden" name="cuerpo">
        <div id="cuerpo"></div>
      </div>

      <div class="form-group">
        <!-- mal, tiene que ser datalist y añadir a un arrayt hidden de tags, o no tan hidden mostrar algo y la posibilidad de quitarlo, si no existe se añade al enviar -->
        <label for="tags">Tags</label>
        <input id="tags" name="tags" class="form-control" type="text" required>
        <small>Introduce las tags separadas por comas.</small>
      </div>

      <div class="d-flex justify-content-center">
        <button class="btn btn-lg btn-dark">Publicar noticia</button>
      </div>
    </form>
  </div>
</div>