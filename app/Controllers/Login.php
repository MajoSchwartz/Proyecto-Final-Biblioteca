<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
class Login extends Controller{
    public function index()
    {
        return view('login');
    }

    public function autenticar()
    {
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $usuarioModel = new UsuarioModel();
        $datosUsuario = $usuarioModel->verificarUsuario($usuario, $password);

        if ($datosUsuario) {
            session()->set([
                'usuario' => $datosUsuario['usuario'],
                'rol' => $datosUsuario['rol'],
                'logged_in' => true
            ]);
            return redirect()->to('/panel'); #Para el mensaje de bienvenida
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos'); #Se muestra mensaje en el inicio de sesión
        }
    }

    public function panel()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }
        return view('panel');
    }
    public function salir()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}