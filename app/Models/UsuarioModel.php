<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'usuarios'; //tabla de la base de datos
    protected $primaryKey = 'id'; //Indica la clave primaria
    protected $allowedFields = ['usuario', 'PASSWORD', 'nombre', 'carnet', 'correro', 'rol']; //Activa el acceso a las columnas
    public function verificarUsuario($usuario, $password)
    {
        return $this->where('usuario', $usuario)
                    ->where('PASSWORD', SHA1($password)) #Cifrado de contraseña con SHA1
                    ->first();
    }

    public function create()
    {
        return [
            'usuario' => '',
            'PASSWORD' => '',
            'nombre' => '',
            'carne' => '',
            'correo' => '',
            'rol' => 'alumno',
        ];
    }

    protected $validationRules = [
        'usuario' => 'required|max_length[100]',
        'nombre' => 'required|max_length[255]',
        'carnet' => 'required|max_length[20]',
        'correo' => 'required|valid_email',
        'rol' => 'required|in_list[alumno,bibliotecario,admin]',
        'PASSWORD' => 'required|min_length[6]'
    ];

    protected $validationMessages = [
        'usuario' => ['required' => 'El nombre de usuario es obligatorio.'],
        'correo' => ['valid_email' => 'Debes ingresar un correo válido.'],
        'PASSWORD' => ['min_length' => 'La contraseña debe tener al menos 6 caracteres.']
    ];

    public function saveWithDuplicateCheck(array $data)
{
    $existingUser = $this->where('carnet', $data['carnet'])->first();

    if ($existingUser) {
        return false; // O actualizar si lo prefieres
    } else {
        return $this->save($data);
    }
}
}