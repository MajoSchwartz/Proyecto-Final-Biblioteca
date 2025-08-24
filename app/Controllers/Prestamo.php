<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PrestamoModel;
class Prestamo extends Controller{
    protected $table = 'prestamos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'libro_id', 'ejemplar', 'fecha_prestamo', 'fecha_devolucion', 'estado'];
    protected $returnType = 'array';
}
}