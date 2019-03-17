/**
 * Funcion para introducir el comentario en la BBDD y añadir el comentario en la página
 */
$(function () {
  // Formulario para añadir un comentario
  const $fComentario = $('#fComentario');
  // División con los formularios
  const $comentarios = $('#comentarios');

  $fComentario.on('submit', function () {
    // Cancelamos el envio  
    event.preventDefault();
    $datos = {
      noticia: $fComentario.find('#idNoticia').val(),
      nombre: $fComentario.find('#nombre').val(),
      comentario: $fComentario.find('#comentario').val(),
    };

    // Reiniciamos el formulario
    $fComentario.trigger('reset');

    // Enviamos los datos por post
    $.post(`${BASE_URL}noticias/addComentario`,
      $datos,
      (data) => {
        // console.log(data);
        // Añadimos el comentario
        $comentarios.append(templateComentario($datos.nombre, $datos.comentario));
      }
    );

  });
});

function templateComentario(nombre, comentario) {
  return `<div class="media mb-4"><div class="media-body"><h5 class="mt-0"><strong>${nombre}</strong></h5>${comentario}</div></div><hr></hr>`;
}