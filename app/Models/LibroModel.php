<?php 
namespace App\Models;

use CodeIgniter\Model;

class LibroModel extends Model{
    protected $table      = 'libros';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'autor', 'género', 'páginas', 'Ejemplar', 'cantidad', 'nivel', 'estado']; #campos de la tabla
    protected $returnType = 'array';

    public function create()
    {
        return [
            'titulo' => '', // Valor inicial para el título
            'autor' => '', // Valor inicial para el autor
            'género' => '',
            'páginas' => '',
            'Ejemplar' => 1,
            'cantidad' => 1, // Valor inicial para la cantidad
            'nivel' => 'Primaria Baja',
            'estado' => 'disponible', // Valor inicial para el estado
        ];
    }
}