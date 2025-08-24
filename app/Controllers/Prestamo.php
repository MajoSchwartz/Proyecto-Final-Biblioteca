<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PrestamoModel;
class Prestamo extends Controller{
    protected $prestamoModel; // Variable para el modelo de préstamos
    protected $libroModel; // Variable para el modelo de libros

    public function __construct()
    {
        $this->prestamoModel = new PrestamoModel(); // Inicializa el modelo de préstamos
        $this->libroModel = new LibroModel(); // Inicializa el modelo de libros
        if (!session()->get('logged_in')) { // Verifica si el usuario está logueado
            return redirect()->to('/'); // Redirige al login si no está logueado
        }
    }

    public function index()
    {
        $data = ['prestamos' => $this->prestamoModel->findAll()]; // Obtiene todos los préstamos
        return view('prestamo/index', $data); // Muestra la lista de préstamos
    }

    public function crear()
    {
        $data = ['prestamo' => $this->prestamoModel->create()]; // Prepara datos iniciales para un préstamo
        return view('prestamo/crear', $data); // Muestra el formulario para registrar un préstamo
    }

    public function guardar()
    {
        $libro_id = $this->request->getPost('libro_id'); // Obtiene el ID del libro del formulario
        $ejemplar = $this->request->getPost('ejemplar'); // Obtiene el número de ejemplar
        $libro = $this->libroModel->find($libro_id); // Busca el libro en la base de datos

        if ($libro['cantidad'] < $ejemplar) { // Verifica si hay suficientes ejemplares
            return redirect()->back()->with('error', 'No hay suficientes ejemplares.'); // Muestra error si no hay suficientes
        }

        $data = [
            'usuario_id' => $this->request->getPost('usuario_id'), // Obtiene el ID del usuario
            'libro_id' => $libro_id, // Asigna el ID del libro
            'ejemplar' => $ejemplar, // Asigna el número de ejemplar
            'fecha_prestamo' => date('Y-m-d H:i:s'), // Establece la fecha actual como fecha de préstamo
            'fecha_devolucion' => date('Y-m-d H:i:s'), 
            'estado' => 'activo', // Establece el estado como activo
        ];
        $this->prestamoModel->save($data); // Guarda el préstamo
        $this->libroModel->update($libro_id, ['cantidad' => $libro['cantidad'] - 1, 'estado' => 'prestado']); // Actualiza la cantidad y estado del libro
        return redirect()->to('/prestamo'); // Redirige a la lista de préstamos
    }

    public function eliminar($id)
    {
        $prestamo = $this->prestamoModel->find($id); // Busca el préstamo por ID
        $this->prestamoModel->delete($id); // Elimina el préstamo (cancela)
        $libro = $this->libroModel->find($prestamo['libro_id']); // Busca el libro asociado
        $this->libroModel->update($prestamo['libro_id'], ['cantidad' => $libro['cantidad'] + 1, 'estado' => 'disponible']); // Restaura la disponibilidad
        return redirect()->to('/prestamo'); // Redirige a la lista de préstamos
    }
}