<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DevolucionModel;
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
            return redirect()->to('/'); // Redirige al login si no está logueado
        }
    }

    public function index()
    {
        $data = ['devoluciones' => $this->devolucionModel->findAll()]; // Obtiene todas las devoluciones
        return view('devolucion/index', $data); // Muestra la lista de devoluciones
    }

    public function crear()
    {
        $data = ['devolucion' => $this->devolucionModel->create()]; // Prepara datos iniciales para una devolución
        return view('devolucion/crear', $data); // Muestra el formulario para registrar una devolución
    }

    public function guardar($prestamo_id)
    {
        $prestamo = $this->prestamoModel->find($prestamo_id); // Busca el préstamo por ID
        $fecha_devolucion = date('Y-m-d H:i:s'); // Establece la fecha actual como fecha de devolución
        $dias_atraso = (strtotime($fecha_devolucion) - strtotime($prestamo['fecha_prestamo'])) / (60 * 60 * 24); // Calcula los días de atraso

        $this->devolucionModel->save([ // Guarda la devolución
            'prestamo_id' => $prestamo_id, // Asocia con el préstamo
            'fecha_devolucion' => $fecha_devolucion, // Registra la fecha
            'dias_atraso' => $dias_atraso > 0 ? (int)$dias_atraso : 0, // Registra los días de atraso (opcional)
        ]);

        $this->prestamoModel->update($prestamo_id, ['estado' => 'devuelto', 'fecha_devolucion' => $fecha_devolucion]); // Actualiza el estado del préstamo
        $libro = $this->libroModel->find($prestamo['libro_id']); // Busca el libro asociado
        $this->libroModel->update($prestamo['libro_id'], ['cantidad' => $libro['cantidad'] + 1, 'estado' => 'disponible']); // Restaura la disponibilidad
        return redirect()->to('/prestamo'); // Redirige a la lista de préstamos
    }
}