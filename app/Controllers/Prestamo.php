<?php 
namespace App\Controllers;

//Modelos a utilizar
use CodeIgniter\Controller;
use App\Models\PrestamoModel;
use App\Models\UsuarioModel;
use App\Models\LibroModel;

class Prestamo extends Controller{
    // Variables protegidas para instanciar modelos si se desea reutilizar
    protected $PrestamoModel; // Variable para el modelo de préstamos
    protected $LibroModel; // Variable para el modelo de libros
   
    //Vista principal del módulo de préstamos
    public function index()
    {

        $libro = new LibroModel();

        //Obtiene todos los libros disponibles, ordenados por título
        $datos['libros'] = $libro->where('estado',1)->orderBy('titulo','asc')->findAll(); #Obtiene todos los libros de la base de datos
       
        //Vista de cabecera y pie de pagina
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('prestamos/prestamo', $datos); // Muestra la lista de préstamos
    }

    //Formulario para crear un nuevo préstamo
    public function crear($libro_id)
    {
        $libro = new LibroModel();
        $usuarios = new UsuarioModel();

        //Todos los usuarios ordenados por carnet
        $datos['usuarios'] = $usuarios->orderBy('carnet','asc')->findAll();

        //Busca el libro por ID para mostrar sus datos en el formulario
        $datos['libro'] = $libro->find($libro_id); // Busca el préstamo por ID

        //Carga las vistas de cabecera y pie de página
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        //Retorna a la vista del formulario de préstamo
        return view('prestamos/crear',$datos);
    }

    // Guarda el préstamo en la base de datos
     public function guardar(){

        // Captura el ID del libro desde el formulario
        $libro_id =  $this->request->getVar('libro_id');

        //Byusca el libro por ID
        $libro = new LibroModel();
        $lib = $libro->where('id',$libro_id)->first();

        //Prepara los datos
        $data=[
            "libro_id" => $lib['id'],
            "usuario_id" => $this->request->getVar('usuario_id'),
            "ejemplar" => $lib['Ejemplar'],
            "fecha_prestamo" => $this->request->getVar('fecha_prestamo'),
            "fecha_devolucion" => $this->request->getVar('fecha_devolucion')
        ];

        //Inserta el préstamo en la base de datos
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

        //Actualiza el libro en la base de datos
        $libro->update($lib['id'],$datalib);

        //Regresa al módulo de préstamos
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