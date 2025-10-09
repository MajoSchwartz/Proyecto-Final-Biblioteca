<?php
namespace App\Models;

use CodeIgniter\Model;

class LibroModel extends Model
{
    protected $table = 'libros';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'autor', 'género', 'páginas', 'Ejemplar', 'cantidad', 'nivel', 'estado', 'prestamo_id']; #campos de la tabla
    protected $returnType = 'array';

    // Reglas de validación
    protected $validationRules = [
        'titulo' => 'required|max_length[255]',
        'autor' => 'required|max_length[255]',
        'género' => 'required|max_length[100]',
        'páginas' => 'permit_empty|integer',
        'Ejemplar' => 'required|integer',
        'cantidad' => 'required|integer',
        'nivel' => 'required|in_list[Primaria Baja,Primaria Alta]',
        'estado' => 'required|in_list[disponible,prestado,dañado]',
    ];

    protected $validationMessages = [
        'titulo' => [
            'required' => 'El título es obligatorio.',
            'max_length' => 'El título no puede exceder 255 caracteres.',
        ],
    ];

    public function saveWithDuplicateCheck(array $data) 
    {
        //Verifica si ya existe un libro con el mismo título
        $existingBook = $this->where('titulo', $data['titulo'])->first();

        //Si ya existe, se suma 1 a la cantidad
        if ($existingBook) {
            $existingBook['cantidad'] = (int)$existingBook['cantidad'] + 1;
            return $this->update($existingBook['id'], $existingBook);
        } else { //Si no existe, se guarda como nuevo con cantidad 1
            $data['cantidad'] = 1;
            return $this->save($data);
        }
    }
}