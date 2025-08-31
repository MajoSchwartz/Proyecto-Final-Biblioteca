<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DevolucionModel;
use App\Models\LibroModel;
use App\Models\UsuarioModel;
use App\Models\PrestamoModel;

class Devolucion extends Controller{
    protected $devolucionModel; // Variable para el modelo de devoluciones
    protected $prestamoModel; // Variable para el modelo de préstamos
    protected $libroModel; // Variable para el modelo de libros

    public function __construct()
    {
        $this->devolucionModel = new DevolucionModel(); // Inicializa el modelo de devoluciones
        $this->prestamoModel = new PrestamoModel(); // Inicializa el modelo de préstamos
        $this->libroModel = new LibroModel(); // Inicializa el modelo de libros
        if (!session()->get('logged_in')) { // Verifica si el usuario está logueado
            return redirect()->to('login'); // Redirige al login si no está logueado
        }
    }

 public function index()
    {
        $libro = new libromodel();
        $datos['libros'] = $libro->where('estado',2)->orderBy('titulo','asc')->findAll(); #Obtiene todos los libros de la base de datos
        //$datos['libros']= $query->getResultArray();
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('devoluciones/devolucion', $datos); // Muestra la lista de préstamos
    }

    public function crear($libro_id)
    {
        $libro = new libromodel();
        $datos['libro'] = $libro->find($libro_id); // Busca el préstamo por ID
        $usuarios = new UsuarioModel();
        $datos['usuarios'] = $usuarios->orderBy('carnet','asc')->findAll();
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('devoluciones/crear',$datos);
    }

     public function guardar(){
        $libro_id =  $this->request->getVar('libro_id');
        $libro = new libromodel();
        $lib = $libro->where('id',$libro_id)->first();
        $data=[
            "libro_id" => $lib['id'],
            "usuario_id" => $this->request->getVar('usuario_id'),
            "fecha_devolucion" => $this->request->getVar('fecha_devolucion'),
            "dias_atraso" => 0
        ];
        $devo = new devolucionModel();        
        $devo->insert($data);
        //actualizar libro
        $datalib = [
            'titulo' => $lib['titulo'], 
            'autor' => $lib['autor'], 
            'género' => $lib['género'], 
            'páginas' => $lib['páginas'],
            'Ejemplar' => $lib['Ejemplar'],
            'cantidad' => $lib['cantidad'],
            'nivel' => $lib['nivel'],
            'estado' => 'disponible'
        ];
        $libro->update($lib['id'],$datalib);
        return $this->response->redirect(site_url('/devolucion'));
    }
}