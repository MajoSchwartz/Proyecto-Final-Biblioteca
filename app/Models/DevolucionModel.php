<?php 
namespace App\Models;

use CodeIgniter\Model;

class DevolucionModel extends Model{
    protected $table = 'devoluciones';
    protected $primaryKey = 'id';
    protected $allowedFields = ['prestamo_id', 'fecha_devolucion', 'dias_atraso', 'libro_id', 'usuario_id'];
    protected $returnType = 'array';

    public function create()
    {
        return [
            'prestamo_id' => '', // Valor inicial para el ID del préstamo
            'fecha_devolucion' => date('Y-m-d H:i:s'), // Fecha actual como inicial
            'dias_atraso' => 0, // Valor inicial para los días de atraso
        ];
    }

    protected $validationRules = [
        'libro_id' => 'required|integer',
        'usuario_id' => 'required|integer',
        'fecha_devolucion' => 'required|valid_date',
        'dias_atraso' => 'permit_empty|integer'
    ];

    protected $validationMessages = [
        'fecha_devolucion' => ['required' => 'La fecha de devolución es obligatoria.']
    ];
}