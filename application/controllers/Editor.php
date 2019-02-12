<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editor extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // Comprobamos si ha iniciado sesión todos los sitios
    if (!$this->session->has_userdata('username')) {
      $this->alertas->add("No has <b>iniciado sesión</b>");
      redirect('login');
      die;
    }
  }

  /**
   * Pagina de logeo del editor/admin
   *
   * @return void
   */
  public function index()
  {
    $datos['titulo'] = "Editor {$_SESSION['username']}";
    $datos['contenido'] = 'editor/resumen.php';
    $this->load->view('template_editor', $datos);
  }

  public function publicarNoticia()
  {
    $datos['titulo'] = "Editor {$_SESSION['username']}";

    // Primero comprobamos que haya categorias
    $this->load->model('categorias_m');
    $datos['categorias'] = $this->categorias_m->obtenerCategorias();
    if (count($datos['categorias']) == 0) {
      $datos['contenido'] = 'editor/error-noticia-publicar.php';
      $this->load->view('template_editor', $datos);
    } else {
      // Libreria para el editor de texto del cuerpo de la noticia
      $datos['contenido'] = 'editor/noticia-publicar.php';
      $datos['miJS'] = ['js/publicar-noticias.js'];
      $this->load->view('template_editor', $datos);
    }
  }

  /**
   * Guarda en la BBDD la noticia pasada por formulario
   *
   * @return void
   */
  public function addNoticia()
  {
    
    // Sacamos las tags del array
    $tags = explode(',', $_POST['tags']);
    unset($_POST['tags']);

    // Descodificamos el cuerpo
    $_POST['cuerpo'] = json_decode($_POST['cuerpo']);
    // Añadimos la id y la fecha
    $_POST['autor'] = $_SESSION['id'];
    $_POST['fecha'] = date('Y-m-d');

    // Introducimos la noticia
    $this->load->model('noticias_m');
    $idNoticia = $this->noticias_m->registrarNoticia($_POST);

    // Limpiamos los tags
    foreach ($tags as $key => $value) {
      // Comprobamos si esta vacio
      if (!preg_match('/[A-z0-9]/', $value)) {
        unset($tags[$key]);
        continue;
      }
      // Se limpia y ponemos la primera letra a mayuscula
      $tags[$key] = $this->funciones->trimPrimLetrMayus($value);
    }

    // Introducimos sus tags
    $this->load->model('tags_m');
    foreach ($tags as $value) {
      if (!$this->tags_m->comprobarTag($value)) {
        # Si no existe la registramos en la tabla tags
        $this->tags_m->registrarTag(['nombre' => $value]);
      }
      // Añadimos la file tags_noticias
      $this->tags_m->registrarTag_noticia(['noticia' => $idNoticia, 'tag' => $value]);
    }

    // Volvemos con un mensaje de informacion
    $this->alertas->add("La noticia <b>{$_POST['titulo']}</b> ha sido publicada con éxito", 'success');
    redirect('editor/publicarNoticia');
  }

  /**
   * Si no se le pasa una id, mostrará toadas las noticias publicadas por el editor logeado,
   * al pasarsela se rellarán los campos y tendra la opción de guardar o cancelar los cambios
   * se comprobará que esa noticia pertenece a ese editor antes de dejarle editarla
   * 
   *
   * @param string $id
   * @return void
   */
  public function editarNoticias($id = '')
  {
    $datos['titulo'] = "Editor {$_SESSION['username']}";
    if ($id == '') {
      $datos['contenido'] = 'editor/noticias-seleccionar.php';
      $this->load->model('noticias_m');
      $datos['noticias'] = $this->noticias_m->obtenerListaNoticiasEditor($_SESSION['id']);
      $this->load->view('template_editor', $datos);
    } else {
      $this->load->model('noticias_m');
      // Comprobamos que sea su noticia si no es admin
      if (!$_SESSION['admin'] && ($this->noticias_m->getAutor($id) != $_SESSION['id'])) {
        die('Esa no es tu noticia');
      }
      // Cargamos los datos de la noticia
      $datos['noticia'] = $this->noticias_m->obtenerNoticia($id);
      // Comprobamos que exista la noticia
      if ($datos['noticia']) {
        $datos['contenido'] = 'editor/noticias-editar.php';
        $datos['miJS'] = ['js/publicar-noticias.js'];
        $this->load->model('tags_m');
        $datos['tags'] = $this->funciones->soloValores($this->tags_m->obtenerTags_noticia($id)); // Cargamos las tag
        $this->load->view('template_editor', $datos);
      } else {
        die('Esa no noticia no existe');
      }
    }
  }

  public function cerrarSesion()
  {
    $this->session->sess_destroy();
    redirect('login');
  }


  ### Metodos solo para el admin


  private function comprobarAdmin()
  {
    if (!$_SESSION['admin']) {
      $this->alertas->add("No tienes <b>acceso</b> a estas opciones");
      redirect('editor');
      die;
    }
  }

  /**
   * Carga la vista categoria
   *
   * @return void
   */
  public function categoria()
  {
    $this->comprobarAdmin();
    $datos['titulo'] = "Editor {$_SESSION['username']}";
    $datos['contenido'] = 'editor/categoria.php';
    $this->load->view('template_editor', $datos);
  }

  /**
   * Hace las operaciones necesarias para añadir la categoria
   *
   * @param String $categoria
   * @return void
   */
  public function addCategoria()
  {
    $_POST['nombre'];
    $this->load->model('categorias_m');
    // Comprobamos que la categoria existe
    if ($this->categorias_m->existeCategoria($_POST['nombre'])) {
      $this->alertas->add("La <b>categoria</b> ya existe");
    } else {
      // Funcion para pasar todo el array a minusculas menos la primera letra, aunque solo hay 1 valor :>
      $_POST = array_map(function ($value) {
        $value = $this->funciones->trimPrimLetrMayus($value);
        return $value;
      }, $_POST);
      $this->categorias_m->registrarCategoria($_POST);
      $this->alertas->add("La categoria <b>{$_POST['nombre']}</b> ha sido añadida con éxito", 'success');
    }
    redirect('editor/categoria');
  }

}