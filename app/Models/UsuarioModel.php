<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'usuarios'; //tabla de la base de datos
    protected $primaryKey = 'id'; //Indica la clave primaria
    protected $allowedFields = ['usuario', 'PASSWORD', 'nombre', 'carnet', 'correo', 'rol']; //Activa el acceso a las columnas
    public function verificarUsuario($usuario, $password)
    {
        return $this->where('usuario', $usuario)
                    ->where('PASSWORD', md5($password)) #Cifrado de contraseña con SHA1
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