var path = window.location.pathname.split('/');
// Elimina los elementos vacios
path = path.filter(v => v != '');
let url = path.pop();
// Si es un numero retornamos el anterior
if (Number.isInteger(parseInt(url))) {
  url = path.pop();
}
const activo = $(`#navbar a[href$='${url}']`);
const padre = $(activo).parents('.dropdown');
if (padre.length > 0) {
  padre.addClass('active');
} else {
  activo.addClass('active')
}
