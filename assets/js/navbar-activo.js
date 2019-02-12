const enlaces = $('#navbar a');

//busca el enlace activo y le pone la clase 'active', a el o a su padre si es dropdown
enlaces.each(function () {
  const enlace = this.href.substr(this.href.lastIndexOf('/') + 1);
  const url = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
  if (url != '' && url == enlace) {
    const padre = $(this).parents('.dropdown');

    enlaces.removeClass('active')
    if (padre.length > 0) {
      padre.addClass('active');
    } else {
      $(this).addClass('active')
    }
  }
});