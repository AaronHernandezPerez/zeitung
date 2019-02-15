let camino = window.location.pathname.split('/');
// Elimina los elementos vacios
camino = camino.filter(v => v != '');
let url = decodeURIComponent(camino.pop());
// Si es un numero retornamos el anterior
if (Number.isInteger(parseInt(url))) {
  url = camino.pop();
}
const activo = $(`.navbar a[href$='${url}']`);
const padre = $(activo).parents('.dropdown');
if (padre.length > 0) {
  padre.addClass('active');
} else {
  activo.addClass('active')
}
