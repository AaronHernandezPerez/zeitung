var toolbarOptions = [
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  ['bold', 'italic', 'underline', 'strike'],
  [{ 'align': [] }],
  [{ 'color': [] },
  { 'background': [] }],
  [{ 'list': 'ordered' }, { 'list': 'bullet' }],
  ['blockquote', 'code-block'],
  [{ 'indent': '-1' }, { 'indent': '+1' }],
  [{ 'script': 'sub' }, { 'script': 'super' }],
  ['link', 'image', 'video', 'formula'],
  ['clean']
];

const cuerpo = new Quill('#cuerpo', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow',
  placeholder: 'Escribe tu noticia'
});

$('form:eq(0)').on('submit', function () {
  event.preventDefault();
  // Pasa el HTML interno codificado
  $('#cuerpoInput').val(JSON.stringify(cuerpo.root.innerHTML));
  this.submit();
});

// manejador de eventos para mostrar la longitud de la cabecera
$('#cabecera').on('input', function () {
  const maxlength = this.getAttribute('maxlength');
  const diferencia = maxlength - this.value.length;
  $('#maxCabecera').text(diferencia);
});