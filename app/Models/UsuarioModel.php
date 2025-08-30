<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'usuarios'; //tabla de la base de datos
    protected $primaryKey = 'id'; //Indica la clave primaria
    protected $allowedFields = ['usuario', 'password', 'nombre', 'carnet', 'correro', 'rol']; //Activa el acceso a las columnas
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