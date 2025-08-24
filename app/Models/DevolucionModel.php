<?php 
namespace App\Models;

use CodeIgniter\Model;

class DevolucionModel extends Model{
    protected $table = 'devoluciones';
    protected $primaryKey = 'id';
    protected $allowedFields = ['prestamo_id', 'fecha_devolucion', 'dias_atraso'];
    protected $returnType = 'array';

    public function create()
    {
        return [
            'prestamo_id' => '', // Valor inicial para el ID del préstamo
            'fecha_devolucion' => date('Y-m-d H:i:s'), // Fecha actual como inicial
            'dias_atraso' => 0, // Valor inicial para los días de atraso
        ];
    }
}