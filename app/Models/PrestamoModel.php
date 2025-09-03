<?php 
namespace App\Models;

use CodeIgniter\Model;

class PrestamoModel extends Model{
    protected $table = 'prestamos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'libro_id', 'Ejemplar', 'fecha_prestamo', 'fecha_devolucion', 'estado'];
    protected $returnType = 'array';

    protected $validationRules = [
        'libro_id' => 'required|integer',
        'usuario_id' => 'required|integer',
        'ejemplar' => 'required|integer',
        'fecha_prestamo' => 'required|valid_date',
        'fecha_devolucion' => 'required|valid_date'
    ];

    protected $validationMessages = [
        'fecha_prestamo' => ['valid_date' => 'La fecha de préstamo no es válida.'],
        'fecha_devolucion' => ['valid_date' => 'La fecha de devolución no es válida.']
    ];
}