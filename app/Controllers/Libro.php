<?php 
namespace App\Controllers; #Espacio del nombre para este controlador

use CodeIgniter\Controller;
use App\Models\LibroModel; #Importa el modelo LibroModel para interacutar con la tabla de libros. 
class Libro extends Controller{
    protected $libroModel; #Variable que almacena la instancia del modelo

    public function __construct()
    {
        $this->libroModel = new LibroModel(); #Inicializa el modelo al crear el controlador
        if (!session()->get('logged_in')) { #Verifica si el usuario está logueado
            return redirect()->to('/'); #Redirige al login si no está logeado
        }
    }

    public function index()
    {
        $datos['libros'] = $this->libroModel->orderBy('id', 'ASC')->findAll(); #Obtiene todos los libros de la base de datos

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view('libros/libro', $datos); #Muestra la vista con la lista de libros
    }

    public function crear()
    {
        $data = ['libro' => $this->libroModel->create()]; #Prepara datos iniciales para un nuevo libro
        return view('libros/crear', $data); #Muestra el formulario para crear un nuevo libro
    }

    public function guardar()
    {
        $data = [ //Obtiene la información del formulario
            'titulo' => $this->request->getPost('titulo'), 
            'autor' => $this->request->getPost('autor'), 
            'género' => $this->request->getPost('género'), 
            'páginas' => $this->request->getPost('páginas'),
            'Ejemplar' => $this->request->getPost('Ejemplar'),
            'cantidad' => $this ->request->getPost('cantidad'),
            'nivel' => $this->request->getPost('nivel'),
            'estado' => $this->request->getPost('estado'),
        ];
        $this->libroModel->save($data); #Guarda el nuevo libro en la base de datos
        return redirect()->to('libros/libro'); #Redirige a la lista de libros
    }

    public function editar($id)
    {
        $data = ['libro' => $this->libroModel->find($id)]; #Buscar el libro por ID
        return view('libros/editar', $data); #Muestra el formulario para editar el libro
    }

    public function actualizar($id)
    {
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
        $this->libroModel->update($id, $data); #Actualiza el libro en la base de datos
        return redirect()->to('/libro'); #Redirige a la lista de libros
    }

    public function eliminar($id)
    {
        $this->libroModel->delete($id); #Elimina el libro de la base de datos
        return redirect()->to('/libro'); #Redirige a la lista de libros
    }
}