<?php 
namespace App\Controllers; #Espacio del nombre para este controlador

use CodeIgniter\Controller;
use App\Models\LibroModel; #Importa el modelo LibroModel para interacutar con la tabla de libros. 
class Libro extends Controller{
    protected $libroModel; #Variable que almacena la instancia del modelo

    // Constructor del controlador
    public function __construct()
    {
        $this->libroModel = new LibroModel(); #Inicializa el modelo al crear el controlador
        if (!session()->get('logged_in')) { #Verifica si el usuario está logueado
            return redirect()->to('/'); #Redirige al login si no está logeado
        }

        helper('form'); // Carga el helper para formularios
    }

    // Muestra la vista principal con todos los libros
    public function index()
    {
        $datos['libros'] = $this->libroModel->orderBy('id', 'ASC')->findAll(); #Obtiene todos los libros de la base de datos

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view('libros/libro', $datos); #Muestra la vista con la lista de libros
    }


    // Muestra el formulario para crear un nuevo libro
    public function crear()
    {
        //Prepara datos iniciales
        $data = ['libro' => $this->libroModel->create()]; #Prepara datos iniciales para un nuevo libro
        
        $data['cabecera']= view('template/cabecera');
        $data['pie']= view('template/piepagina');

        return view('libros/crear', $data); #Muestra el formulario para crear un nuevo libro
    }

    //Guardar nuevo libro en la BD
    public function guardar()
    {
        //Caoturar los datos del formulario
        $data = [
            'titulo' => $this->request->getPost('titulo') ?? '',
            'autor' => $this->request->getPost('autor') ?? '',
            'género' => $this->request->getPost('género') ?? '',
            'páginas' => $this->request->getPost('páginas') ?? NULL,
            'Ejemplar' => $this->request->getPost('Ejemplar') ?? 1,
            'cantidad' => $this->request->getPost('cantidad') ?? 1,
            'nivel' => $this->request->getPost('nivel') ?? 'Primaria Baja',
            'estado' => $this->request->getPost('estado') ?? 'disponible',
        ];

        //Registra los datos en el log para la depuración
        log_message('debug', 'Datos recibidos en guardar: ' . print_r($data, true));

        // Guarda el libro si no hay duplicados
        if ($this->libroModel->saveWithDuplicateCheck($data)) {
            return redirect()->to('/libro')->with('success', 'Libro guardado exitosamente');
        } else {
            // Si hay errores, los registra y redirige al formulario con los datos previos
            $errors = $this->libroModel->errors();
            log_message('error', 'Errores al guardar: ' . print_r($errors, true));
            return redirect()->to('/crear')->with('errors', $errors)->withInput();
        }
    }


    // Muestra el formulario para editar un libro existente
    public function editar($id=null)
    {
        $libro= new LibroModel();

        //Buscar libro por ID
        $data['libro']=$libro->where('id',$id)->first();

        $data['cabecera']= view('template/cabecera');
        $data['pie']= view('template/piepagina');

        return view('libros/editar', $data);
    }

    // Actualiza los datos de un libro existente
    public function actualizar()
    {
        $libro= new LibroModel();
        $data = [
            'titulo' => $this->request->getPost('titulo'), 
            'autor' => $this->request->getPost('autor'), 
            'género' => $this->request->getPost('género'), 
            'páginas' => $this->request->getPost('páginas'),
            'Ejemplar' => $this->request->getPost('Ejemplar'),
            'cantidad' => $this ->request->getPost('cantidad'),
            'nivel' => $this->request->getPost('nivel'),
            'estado' => $this->request->getPost('estado'),
        ];
        $id= $this->request->getVar('id');
        $libro->update($id,$data);

        return $this->response->redirect(site_url('/libro'));
    }

    //Eliminar libro por ID
    public function borrar($id=null)
    {
        //Elimina el libro de la BD
        $libro= new LibroModel();
        $libro->where('id',$id)->delete($id);

        return $this->response->redirect(site_url('/libro'));
    }

    public function buscar()
    {
        $libro = new LibroModel();
        $query = $this->request->getGet('q'); //Se captura lo que el usuario ingresa

        //Se busca el libro por título o autor que coincida con el texto
        $datos['libros'] = $libro 
            ->groupStart()
                ->like('titulo', $query)
                ->orLike('autor', $query)
            ->groupEnd()
            ->orderBy('titulo', 'asc')
            ->findAll();

        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
        $datos['query'] = $query; //Se pasa la búsqueda a la vista

        return view('libros/buscar', $datos);
    }


}