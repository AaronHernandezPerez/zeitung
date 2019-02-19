<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Noticias extends CI_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index($categoria = '', $offset = '')
  {
    $datos['titulo'] = "Zeitung, el peridico de cada dia.";
    $datos['contenido'] = 'noticias/index.php';
    // Cargamos las categorias
    $this->load->model('categorias_m');
    $categorias = $this->funciones->soloValores($this->categorias_m->obtenerNombreCategoriasArr());
    $datos['categorias'] = $categorias;

    // Descodificamos la categoria introducida por url
    $categoria = ($categoria == 'todas') ? '' : urldecode($categoria);


    // Cargamos los datos de las noticias dependiendo de que se haya pasado por la url
    $this->load->model('noticias_m');
    $limite = 5; // Limite de noticias por Página
    
    // Cargamos la paginación
    $this->load->library('pagination');
    // Cargamos las noticias 

    $totalNoticias = $this->noticias_m->obtenerNumeroNoticiasCategoria($categoria);
    $datos['noticias'] = $this->noticias_m->obtenerNoticiasPorNombreCat($categoria, $limite, $offset);

    if ($categoria == '' || $categoria == 'todos') {
      // Si no pasamos categoria, la categoria será "todos",
    } else if (in_array(ucfirst($categoria), $datos['categorias'])) {
      // echo ('<h1>se ha introducido la categoria ' . $categoria . '</h1>');
    } else {
      // Si la direccion es incorrecta redireccionamos a noticias
      redirect('noticias');
    }
    $cfgPaginacion = $this->funciones->cfgPaginacionAntSig('noticias/index/' . $this->uri->segment(3, 'todas') . '/', $totalNoticias, $limite); // Cargamos la configuracion de la paginacion
    $this->pagination->initialize($cfgPaginacion);

    $this->load->view('template_noticias', $datos);
  }

  /**
   * Muestra la noticia pasada por post con sus comentarios
   *
   * @param string $idNoticia
   * @return html
   */
  public function leer($idNoticia)
  {
    setlocale(LC_ALL, 'es_ES');
    $datos['titulo'] = "Zeitung, el peridico de cada dia.";
    $datos['contenido'] = 'noticias/leer.php';
    $datos['miJS'] = ['js/alto-videos-quill.js', 'js/add-comentarios.js'];
    $this->load->model('categorias_m');
    $categorias = $this->funciones->soloValores($this->categorias_m->obtenerNombreCategoriasArr());
    $datos['categorias'] = $categorias;

    // Cargamos los datos de la noticia
    $this->load->model('noticias_m');
    $datos['noticia'] = $this->noticias_m->obtenerNoticiaNombre($idNoticia);

    // Cargamos los comentarios para esa noticia
    $this->load->model('comentarios_m');
    $datos['comentarios'] = $this->comentarios_m->obtenerComentariosNoticia($idNoticia);

    $this->load->view('template_noticias', $datos);
  }


  /**
   * Funcion llamda por formulario, en la que se pasara por POST
   * la noticia y todos los datos del comentario
   *
   * @return void
   */
  public function addComentario()
  {
    $this->load->model('comentarios_m');
    $_POST['nombre'] = $this->funciones->trimPrimPalbMayus($_POST['nombre']);
    $this->comentarios_m->registrarComentario($_POST);
    echo ('Comentario añadido');
  }

  /**
   * Muestra un resumen del editor con sus datos y las noticias publicadas por él,
   *
   * @param string $idEditor
   * @return html
   */
  public function perfil($idEditor)
  {
    setlocale(LC_ALL, 'es_ES');
    // Cargamos los datos del editor
    $this->load->model('editores_m');
    $datos['editor'] = $this->editores_m->obtenerTodoEditor($idEditor);

    // Comprobamos que exista, sino redireccionamos
    if (!$datos['editor']) {
      redirect();
      die;
    }

    $datos['titulo'] = 'Perfil de ' . $datos['editor']->nombre . '.';
    $datos['contenido'] = 'noticias/perfil.php';
    
    // Cargamos las categorias
    $this->load->model('categorias_m');
    $categorias = $this->funciones->soloValores($this->categorias_m->obtenerNombreCategoriasArr());
    $datos['categorias'] = $categorias;

    // Cargamos los datos de sus noticias
    $this->load->model('noticias_m');
    $datos['noticias'] = $this->noticias_m->obtenerListaNoticiasEditor($idEditor);

    $this->load->view('template_noticias', $datos);
  }
}