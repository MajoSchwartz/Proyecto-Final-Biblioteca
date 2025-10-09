<?php 
namespace App\Models;

use CodeIgniter\Model;

class PrestamoModel extends Model{
    protected $table = 'prestamos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'libro_id', 'ejemplar', 'fecha_prestamo', 'fecha_devolucion', 'estado'];
    protected $returnType = 'array';
}