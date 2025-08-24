<?php 
namespace App\Models;

use CodeIgniter\Model;

class PrestamoModel extends Model{
    protected $table = 'prestamos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'libro_id', 'ejemplar', 'fecha_prestamo', 'fecha_devolucion', 'estado'];
    protected $returnType = 'array';

    public function create()
    {
        return [
            'usuario_id' => '', // Valor inicial para el ID del usuario
            'libro_id' => '', // Valor inicial para el ID del libro
            'ejemplar' => 1, // Valor inicial para el número de ejemplar
            'fecha_prestamo' => date('Y-m-d H:i:s'), // Fecha actual como inicial
            'fecha_devolucion' => date('Y-m-d H:i:s'),
            'estado' => 'activo', // Estado inicial
        ];
    }
}