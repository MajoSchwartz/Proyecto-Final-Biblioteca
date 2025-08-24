<?php
namespace App\Models;

use CodeIgniter\Model;

class LibroModel extends Model
{
    protected $table = 'libros';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'autor', 'género', 'páginas', 'Ejemplar', 'cantidad', 'nivel', 'estado']; #campos de la tabla
    protected $returnType = 'array';
    protected $useTimestamps = false; // Desactiva timestamps si no los usas

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
        // Agrega mensajes para otros campos si lo deseas
    ];

    // Método para preparar datos iniciales
    public function create()
    {
        return [
            'titulo' => '', // Cadena vacía, validada como requerida
            'autor' => '',  // Cadena vacía, validada como requerida
            'género' => '', // Cadena vacía, validada como requerida
            'páginas' => NULL, // NULL para páginas, permitido como vacío
            'Ejemplar' => 1,   // Valor predeterminado
            'cantidad' => 1,   // Valor predeterminado
            'nivel' => 'Primaria Baja', // Valor predeterminado
            'estado' => 'disponible',   // Valor predeterminado
        ];
    }

    public function saveWithDuplicateCheck(array $data)
    {
        $existingBook = $this->where('titulo', $data['titulo'])->first();

        if ($existingBook) {
            $existingBook['cantidad'] = (int)$existingBook['cantidad'] + 1;
            return $this->update($existingBook['id'], $existingBook);
        } else {
            $data['cantidad'] = 1;
            return $this->save($data);
        }
    }
}