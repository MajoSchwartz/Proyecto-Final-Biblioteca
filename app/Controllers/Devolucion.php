<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DevolucionModel;
class Devolucion extends Controller{
    protected $table = 'devoluciones';
    protected $primaryKey = 'id';
    protected $allowedFields = ['prestamo_id', 'fecha_devolucion', 'dias_atraso'];
    protected $returnType = 'array';
}