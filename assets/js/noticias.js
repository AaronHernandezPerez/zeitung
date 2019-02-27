$(function () {
  // Al cargar, hacemos una llamada allax para obtener las tags, se obtendran las 6 mas comunes de este mes
  $.post(`${BASE_URL}noticias/tagsCloud`,
    function (data) {
      data = JSON.parse(data);
      // Le añadimos un enlace a las tags
      data.forEach(element => {
        element.link = `${BASE_URL}noticias/buscar?busqueda=${element.text}`;
        // Cambiamos el peso
      });
      console.log(data);
      $('#tags').jQCloud(data, {
        autoResize: true,
        height: 100
      });
    }
  );
});