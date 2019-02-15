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

    // echo ('<h1>' . $categoria . '</h1>');
    // echo ('<h1>Offset :' . $offset . '</h1>');

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

  public function leer($idNoticia)
  {
    $datos['titulo'] = "Zeitung, el peridico de cada dia.";
    $datos['contenido'] = 'noticias/leer.php';
    $this->load->model('categorias_m');
    $categorias = $this->funciones->soloValores($this->categorias_m->obtenerNombreCategoriasArr());
    $datos['categorias'] = $categorias;

    // Cargamos los datos de la noticia
    $this->load->model('noticias_m');
    $datos['noticia'] = $this->noticias_m->obtenerNoticiaNombre($idNoticia);

    $this->load->view('template_noticias', $datos);
  }
}