<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controlador encargado del back-end del periodico, permitiendo
 * a los periodistas añadir noticias, modificarlas, borrarlas o moderar sus comentarios,
 * y a los administradores crear nuevas categorias, moderar las noticias de todos los editores
 * así como eliminar editores
 */
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
    $_POST['fecha'] = date('Y-m-d H:i:s');

    // Introducimos la noticia
    $this->load->model('noticias_m');
    $idNoticia = $this->noticias_m->registrarNoticia($_POST);

    // Limpiamos los tags y eliminamos los no válidos
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
      // Si no se ha añadido ya una tag igual la añadimos
      if (!$this->tags_m->comprobarTags_noticia($idNoticia, $value)) {
        $this->tags_m->registrarTag_noticia(['noticia' => $idNoticia, 'tag' => $value]);
      }
    }

    // Volvemos con un mensaje de informacion
    $this->alertas->add("La noticia <b>{$_POST['titulo']}</b> ha sido publicada con éxito", 'success');
    redirect('editor/publicarNoticia');
  }

  /**
   * Muestra las noticias para el usuario logeado
   * @param string $id
   * @return void
   */
  public function moderarNoticias()
  {
    $datos['titulo'] = "Editor {$_SESSION['username']}";
    $datos['contenido'] = 'editor/noticias-seleccionar.php';
    $this->load->model('noticias_m');
    // Valores para la query 'obtenerListaNoticiasEditor'
    $limite = 5;
    $offset = abs($this->uri->segment(3, 0));
    $datos['noticias'] = $this->noticias_m->obtenerListaNoticiasEditor($_SESSION['id'], $limite, $offset);

    $datos['miJS'] = ['js/noticias-seleccionar.js'];
    $datos['miCSS'] = 'noticias-seleccionar.css';
    
    // Cargamos la paginación
    $this->load->library('pagination');
    $totalNoticias = $this->noticias_m->obtenerNumeroNoticiasEditor($_SESSION['id']);
    // Comprobamos que no se haya introducido nn numero superior al total
    if ($offset >= $totalNoticias) {
      redirect('editor/moderarNoticias');
      die;
    }
    $cfgPaginacion = $this->funciones->cfgPaginacion('editor/moderarNoticias/', $totalNoticias, $limite); // Cargamos la configuracion de la paginacion
    $this->pagination->initialize($cfgPaginacion);

    // Cargamos la vista
    $this->load->view('template_editor', $datos);
  }

  /**
   * Eliminará los comentarios pasados por POST y redireccionara a $_session['vovler']
   *
   * @return void
   */
  public function eliminarComentarios()
  {
    $this->load->model('comentarios_m');
    // Recorremos el array eliminando cada uno de los comentarios marcados
    foreach ($_POST['id'] as $value) {
      $this->comentarios_m->eliminarComentario(['id' => $value]);
    }
    
    // Redireccionamos con un mensaje de información
    $this->alertas->add("Los <b>comentarios</b> han sido eliminados con éxito", 'success');
    redirect('editor/' . $_SESSION['volver']);
    unset($_SESSION['volver']);
  }

  /**
   * Devuelve html con la lista de las noticias para el autor
   *
   * @param string $id id del autor
   * @param string $titulo titulo de la tabla
   * @return html 
   */
  public function obtenerListaNoticias()
  {
    $datos['titulo'] = $_POST['titulo'];
    $this->load->model('noticias_m');
    $datos['noticias'] = $this->noticias_m->obtenerListaNoticiasEditor($_POST['id']);
    $this->load->view('editor/complementos/tablas-seleccionar.php', $datos);
  }


  /**
   * Vista para modificar los datos, los cuales se rellenarán los campos y tendrá la opción de guardar o cancelar los cambios
   * se comprobará que esa noticia pertenece a ese editor antes de dejarle editarla
   *
   * @param [type] $id
   * @return void
   */
  public function modificarNoticia($id)
  {
    $_SESSION['volver'] = $this->anteriorPagina();
    $datos['volver'] = $_SESSION['volver'];
    // Si se ha introducido una id en la url
    $this->load->model('noticias_m');
    // Comprobamos que sea su noticia si no es admin
    $autorNoticia = $this->noticias_m->getAutor($id);
    if (!$_SESSION['admin'] && ($autorNoticia != $_SESSION['id'])) {
      $this->alertas->add("No tienes <b>acceso</b> a esta noticia");
      redirect('editor/' . $_SESSION['volver']);
      unset($_SESSION['volver']);
      die;
    }

    // Mensaje de la tarjeta para diferenciar tus noticias de las que editas siendo admin
    if ($autorNoticia == $_SESSION['id']) {
      // Si eres el autor
      $datos['cardTitle'] = 'Edita tu noticia';
    } else {
      // Si eres un admin editando
      $datos['cardTitle'] = 'Editando la noticia de <b>' . $this->noticias_m->obtenerNombreAutor($id) . '</b>';
    }

    // Cargamos los datos de la noticia
    $datos['noticia'] = $this->noticias_m->obtenerNoticia($id);
    // Comprobamos que exista la noticia
    if ($datos['noticia']) {
      $datos['contenido'] = 'editor/noticias-editar.php';
      $datos['miJS'] = ['js/publicar-noticias.js'];
      
      // Categorias
      $this->load->model('categorias_m');
      $datos['categorias'] = $this->categorias_m->obtenerCategorias();
      // Tags
      $this->load->model('tags_m');
      $datos['tags'] = $this->funciones->soloValores($this->tags_m->obtenerTags_noticia($id)); // Cargamos las tag
      $datos['titulo'] = "Editor {$_SESSION['username']}";
      $this->load->view('template_editor', $datos);
    } else {
      $this->alertas->add("La noticia <b>{$id}</b> no existe");
      redirect('editor/' . $_SESSION['volver']);
      unset($_SESSION['volver']);
    }
  }

  /**
   * Hace casi lo mismo que "addNoticia", excepto que lo modifica por los nuevos valores introducidosy elimina,
   * las filas de tags_noticias correspondientes antes de volverlas a introducir
   *
   * @return void
   */
  public function actualizarNoticia()
  {
    // Sacamos las tags del array
    $tags = explode(',', $_POST['tags']);
    unset($_POST['tags']);

    // Descodificamos el cuerpo 
    $_POST['cuerpo'] = json_decode($_POST['cuerpo']);

    // Actualizamos la noticia con los nuevos datos
    $this->load->model('noticias_m');
    $this->noticias_m->actualizarNoticia($_POST);

    // Limpiamos los tags y eliminamos los no válidos
    foreach ($tags as $key => $value) {
      // Comprobamos si esta vacio
      if (!preg_match('/[A-z0-9]/', $value)) {
        unset($tags[$key]);
        continue;
      }
      // Se limpia y ponemos la primera letra a mayuscula
      $tags[$key] = $this->funciones->trimPrimLetrMayus($value);
    }

    // Eliminamos todas las filas correspondientes de "tags_noticias"
    $this->load->model('tags_m');
    $this->tags_m->eliminarTags_noticia($_POST['id']);

    // Introducimos sus tags
    foreach ($tags as $value) {
      if (!$this->tags_m->comprobarTag($value)) {
        # Si no existe la registramos en la tabla tags
        $this->tags_m->registrarTag(['nombre' => $value]);
      }
      // Si no se ha añadido ya una tag igual la añadimos
      if (!$this->tags_m->comprobarTags_noticia($_POST['id'], $value)) {
        $this->tags_m->registrarTag_noticia(['noticia' => $_POST['id'], 'tag' => $value]);
      }
    }

    // Volvemos con un mensaje de informacion
    $this->alertas->add("La noticia <b>{$_POST['titulo']}</b> ha sido modificada con éxito", 'success');

    // Redireccionamos a volver y la borramos, esta var ha sido declarada en modificarNoticia
    redirect('editor/' . $_SESSION['volver']);
    unset($_SESSION['volver']);
  }

  /**
   * Página para poder borrar los comentarios de una noticia
   *
   * @param  $idNoticia
   * @return html
   */
  public function moderarComentarios($idNoticia)
  {
    // Guardamos desde donde se ha entrado
    $_SESSION['volver'] = $this->anteriorPagina();
    $datos['volver'] = $_SESSION['volver'];

    // Comprobamos que sea su noticia si no es admin
    $this->load->model('noticias_m');
    $autorNoticia = $this->noticias_m->getAutor($idNoticia);
    if (!$_SESSION['admin'] && ($autorNoticia != $_SESSION['id'])) {
      $this->alertas->add("No tienes <b>acceso</b> los comentarios de esta noticia");
      redirect('editor/' . $_SESSION['volver']);
      unset($_SESSION['volver']);
      die;
    }

    // Obtenemos el titulo de la noticia
    $datos['noticia'] = $this->noticias_m->obtenerNoticia($idNoticia)->titulo;
    if (!$datos['noticia']) {
      // Si no existe redireccionamos con un mensaje de error
      $this->alertas->add("La <b>noticia</b> seleccionada no existe");
      redirect('editor/' . $_SESSION['volver']);
      unset($_SESSION['volver']);
      die;
    }


    // Comentarios
    $this->load->model('comentarios_m');
    $datos['comentarios'] = $this->comentarios_m->obtenerComentariosNoticia($idNoticia);
    $datos['miJS'] = ['js/comentarios-filtrar.js'];

    $datos['titulo'] = "Editor {$_SESSION['username']}";
    $datos['contenido'] = 'editor/comentarios-moderar.php';
    $this->load->view('template_editor', $datos);
  }

  /**
   * Devolverá el html de un modal con un mensaje de confirmación para borrar la noticia
   * recibe por post el id y el titulo de la noticia
   *
   * @return html un modal de bootstrap
   */
  public function modalBorrar()
  {
    // Primero seleccionamos los datos para rellenar el modal
    $this->load->model('noticias_m');
    $_POST['autor'] = $this->noticias_m->obtenerNombreAutor($_POST['id']);
    $this->load->view('editor/complementos/modal-borrar.php', $_POST);
  }

  /**
   * Funcion llamada desde el modal de borrar, simplemente eliminará la noticia
   * y devolverá una alerta de bootstrap formateada
   *
   * @return html alerta de bootstrap
   */
  public function eliminarNoticia()
  {
    $this->load->model('noticias_m');
    $this->noticias_m->eliminarNoticia($_POST['id']);
    $this->load->view('editor/complementos/alerta-borrar.php', $_POST);
  }

  public function cerrarSesion()
  {
    $this->session->sess_destroy();
    redirect('login');
  }


  ### Metodos solo para el admin

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
    // Categorias
    $this->load->model('categorias_m');
    $datos['categorias'] = $this->categorias_m->obtenerCategorias();
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
    $this->comprobarAdmin();
    // Formateamos el nombre
    $_POST['nombre'] = $this->funciones->trimPrimLetrMayus($_POST['nombre']);
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

  /**
   * Cambia el nombre de la categoria al nuevo valor introducido y redirecciona a /editor/categorias,
   *  con un mensaje de informacion
   *
   * @return void
   */
  public function actualizarCategoria()
  {
    $this->comprobarAdmin();
    // Realizamos un update de categorias
    $this->load->model('categorias_m');
    // Formateamos el nuevo nombre de la categoria y lo actualizamos
    $_POST['nombre'] = $this->funciones->trimPrimLetrMayus($_POST['nombre']);
    $this->categorias_m->actualizarCategoria($_POST);

    // Redireccionamos con un mensaje de información
    $this->alertas->add("La categoria <b>{$_POST['nombre']}</b> ha sido modificada con éxito", 'success');
    redirect('editor/categoria');
  }

  /**
   * Muestra todas las noticias de todos los usuarios, incluidos los admin
   *
   * @return void
   */
  public function adminNoticias()
  {
    $this->comprobarAdmin();
    $datos['titulo'] = "Editor {$_SESSION['username']}";
    $datos['contenido'] = 'editor/admin-noticias-seleccionar.php';

    // Cargaremos los autores con noticias escritas
    $this->load->model('noticias_m');
    $datos['autores'] = $this->noticias_m->obtenerIdNombreAutores();

    $datos['miCSS'] = 'noticias-seleccionar.css';
    $datos['miJS'] = ['js/noticias-seleccionar.js', 'js/admin-noticias-seleccionar.js'];


    $this->load->view('template_editor', $datos);
  }

  public function adminEditores()
  {
    $this->comprobarAdmin();
  # code...
  }

  /**
   * Comprueba si eres un administrador, si no redirecciona con un mensaje de error
   *
   * @return void
   */
  private function comprobarAdmin()
  {
    if (!$_SESSION['admin']) {
      $this->alertas->add("No tienes <b>acceso</b> a estas opciones");
      redirect('editor');
      die;
    }
  }


  /**
   * Obtiene en enlace anterior si existe
   *
   * @return string
   */
  private function anteriorPagina()
  {
    if (isset($_SERVER['HTTP_REFERER'])) {
      $referer = explode('/', $_SERVER['HTTP_REFERER']);
      $ultimoEnlace = array_pop($referer);
      if ((string)(int)$ultimoEnlace) {
        return array_pop($referer) . '/' . $ultimoEnlace;
      } else {
        return $ultimoEnlace;
      }
    } else {
      return '';
    }
  }
}