<?php 
namespace App\Models;

use CodeIgniter\Model;

class LibroModel extends Model{
    protected $table      = 'libros';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'autor', 'genero', 'paginas', 'Ejemplar', 'cantidad', 'nivel', 'estado']; #campos de la tabla
    protected $returnType = 'array';
}