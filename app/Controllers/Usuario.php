<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel; //Para poder acceder y hacer uso de la base de datos

class Usuario extends Controller{
    public function index ()
    {
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view('usuarios/usuario', $datos); //Al llamar esta función, va a la vista "usuarios"
    }
}