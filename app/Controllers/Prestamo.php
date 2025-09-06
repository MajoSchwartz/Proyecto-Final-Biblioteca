<?php 
namespace App\Controllers;

//Modelos a utilizar
use CodeIgniter\Controller;
use App\Models\PrestamoModel;
use App\Models\UsuarioModel;
use App\Models\LibroModel;

class Prestamo extends Controller{
    protected $PrestamoModel; // Variable para el modelo de préstamos
    protected $LibroModel; // Variable para el modelo de libros
   

    public function index()
    {

        $libro = new LibroModel();
        $datos['libros'] = $libro->where('estado',1)->orderBy('titulo','asc')->findAll(); #Obtiene todos los libros de la base de datos
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('prestamos/prestamo', $datos); // Muestra la lista de préstamos
    }

    public function crear($libro_id)
    {
        $libro = new LibroModel();
        $usuarios = new UsuarioModel();
        $datos['usuarios'] = $usuarios->orderBy('carnet','asc')->findAll();
        $datos['libro'] = $libro->find($libro_id); // Busca el préstamo por ID
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('prestamos/crear',$datos);
    }

     public function guardar(){
        $libro_id =  $this->request->getVar('libro_id');
        $libro = new LibroModel();
        $lib = $libro->where('id',$libro_id)->first();
        $data=[
            //"usuario_id" => $usu['id'],
            "libro_id" => $lib['id'],
            "usuario_id" => $this->request->getVar('usuario_id'),
            "ejemplar" => $lib['Ejemplar'],
            "fecha_prestamo" => $this->request->getVar('fecha_prestamo'),
            "fecha_devolucion" => $this->request->getVar('fecha_devolucion')
        ];
        //print_r($data);
        $pres = new PrestamoModel();        
        $pres->insert($data);
        //actualizar libro
        $datalib = [
            'titulo' => $lib['titulo'], 
            'autor' => $lib['autor'], 
            'género' => $lib['género'], 
            'páginas' => $lib['páginas'],
            'Ejemplar' => $lib['Ejemplar'],
            'cantidad' => $lib['cantidad'],
            'nivel' => $lib['nivel'],
            'estado' => 'prestado',
            'prestamo_id' => $pres->getInsertID()
        ];
        $libro->update($lib['id'],$datalib);
        return $this->response->redirect(site_url('/prestamo'));
    }

    public function registro() {
    $db = db_connect();
    $builder = $db->table('prestamos');

    // Captura el rol y el usuario desde la sesión
    $rol = session()->get('rol');
    $usuario_id = session()->get('id'); // ID en la sesión al iniciar

    // Construye la consulta base
    $builder->select('prestamos.id, prestamos.libro_id, prestamos.ejemplar, libros.titulo, usuarios.carnet, usuarios.nombre, prestamos.fecha_prestamo, prestamos.fecha_devolucion')
            ->join('usuarios', 'usuarios.id = prestamos.usuario_id')
            ->join('libros','libros.id = prestamos.libro_id')
            ->orderBy('prestamos.id','ASC');

    // Aplica el filtro solo si el usuario es alumno
    if ($rol === 'alumno') {
        $builder->where('prestamos.usuario_id', $usuario_id);
    }

    // Ejecuta la consulta después de aplicar el filtro
    $datos['registros_prestamos'] = $builder->get()->getResultArray();

    // Carga las vistas
    $datos['cabecera'] = view('template/cabecera');
    $datos['pie'] = view('template/piepagina');

    return view('prestamos/listado', $datos);
}



}