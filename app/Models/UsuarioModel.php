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

    public function saveWithDuplicateCheck(array $data)
{
    // Verifica si ya existe un usuario con el mismo carnet
    $existingUser = $this->where('carnet', $data['carnet'])->first();

    if ($existingUser) {
        // Si ya existe, no lo guarda
        return false; 
    } else { // Si no existe, lo guarda normalmente
        return $this->save($data);
    }
}
}