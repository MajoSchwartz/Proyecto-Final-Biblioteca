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

    //Muesre L vista principal del módulo de devoluciones
    public function index()
    {
        $libro = new LibroModel();

        //Obtiene todos los libros con estado prestado
        $datos['libros'] = $libro->where('estado',2)->orderBy('titulo','asc')->findAll(); #Obtiene todos los libros de la base de datos
        
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        
        return view('devoluciones/devolucion', $datos); // Muestra la lista de préstamos
    }

    // Muestra el formulario para registrar una devolución
    public function crear($libro_id)
    {
        $libro = new LibroModel();
        $lib = $libro->find($libro_id);
        $prestamo = new PrestamoModel();
        $presta = $prestamo->where('id', $lib['prestamo_id'])->first();
        $usuarios = new UsuarioModel();
        $usu = $usuarios->where('id',$presta['usuario_id'])->first();
        $datos['libro'] = $lib;
        $datos['usuario'] = $usu;
        $datos['prestamo'] = $presta;
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('devoluciones/crear',$datos);
    }

    // Guarda la devolución en la base de datos
     public function guardar(){
        $libro_id =  $this->request->getVar('libro_id');
        $libro = new libromodel();
        $lib = $libro->where('id',$libro_id)->first();
        $data=[
            "libro_id" => intval($lib['id']), //Asegurar que el valor sea INT
            "usuario_id" => intval($this->request->getVar('usuario_id')),
            "prestamo_id" => intval($lib['prestamo_id']),
            "fecha_devolucion" => $this->request->getVar('fecha_devolucion'),
            "dias_atraso" => 0
        ];
        $devo = new DevolucionModel();   
        $devo->insert($data); //Inserta la devolución


        // Actualiza el estado del libro a "disponible"
        $datalib = [
            'titulo' => $lib['titulo'], 
            'autor' => $lib['autor'], 
            'género' => $lib['género'], 
            'páginas' => intval($lib['páginas']),
            'Ejemplar' => intval($lib['Ejemplar']),
            'cantidad' => intval($lib['cantidad']),
            'nivel' => $lib['nivel'],
            'estado' => 'disponible',
            'prestamo' => 0
        ];
        $libro->update(intval($lib['id']),$datalib);
        return $this->response->redirect(site_url('/devolucion'));
    }

    // Muestra el historial de devoluciones registradas
    public function registro() {
        $db = db_connect();
        $builder = $db->table('devoluciones');

        // Consulta con fechas necesarias
        $datos['registros_devoluciones'] = $builder->select('devoluciones.id, devoluciones.libro_id, prestamos.ejemplar, libros.titulo, usuarios.carnet, usuarios.nombre, prestamos.fecha_devolucion AS fecha_limite, devoluciones.fecha_devolucion AS fecha_real, prestamos.fecha_prestamo')
            ->join('usuarios', 'usuarios.id = devoluciones.usuario_id')
            ->join('libros','libros.id = devoluciones.libro_id')
            ->join('prestamos','prestamos.id = devoluciones.prestamo_id')
            ->orderBy('prestamos.id','ASC')
            ->get()
            ->getResultArray();

        // Cálculo de días de atraso - por trabajar
        foreach ($datos['registros_devoluciones'] as &$devolucion) {
            $fecha_limite = new \DateTime($devolucion['fecha_limite']);
            $fecha_real = new \DateTime($devolucion['fecha_real']);

            if ($fecha_real > $fecha_limite) {
                $devolucion['dias_atraso'] = $fecha_real->diff($fecha_limite)->days;
            } else {
                $devolucion['dias_atraso'] = 0;
            }
        }

        // Vistas
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');

        return view('devoluciones/listado', $datos);
    }

}