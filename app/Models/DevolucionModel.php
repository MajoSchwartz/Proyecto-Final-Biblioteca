<?php 
namespace App\Models;

use CodeIgniter\Model;

class DevolucionModel extends Model{
    protected $table = 'devoluciones';
    protected $primaryKey = 'id';
    protected $allowedFields = ['prestamo_id', 'fecha_devolucion', 'dias_atraso', 'libro_id', 'usuario_id'];
    protected $returnType = 'array';

    protected $validationMessages = [
        'fecha_devolucion' => ['required' => 'La fecha de devolución es obligatoria.']
    ];
}