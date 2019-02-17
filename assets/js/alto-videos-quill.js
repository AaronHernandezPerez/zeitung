$(function () {
  $('.ql-video').each(function () {
    $(this).attr('height', altoVideo(this));
  });
  $(window).on('resize', function () {
    $('.ql-video').each(function () {
      $(this).attr('height', altoVideo(this));
    });
    console.log('jaja');
  });
});

function altoVideo(elemento) {
  return elemento.clientWidth * 0.5625;
}