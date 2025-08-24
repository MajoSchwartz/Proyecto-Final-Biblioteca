<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario', 'password', 'nombre', 'carne', 'correro', 'rol   '];
    public function verificarUsuario($usuario, $password)
    {
        return $this->where('usuario', $usuario)
                    ->where('password', SHA1($password)) #Cifrado de contraseña con SHA1
                    ->first();
    }

    public function create()
    {
        return [
            'usuario' => '',
            'password' => '',
            'nombre' => '',
            'carne' => '',
            'correo' => '',
            'rol' => 'alumno',
        ];
    }
}