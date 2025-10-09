<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
class Login extends Controller{

    //Se muest5ra la vista de inicio de sesión
    public function index()
    {
        return view('login');
    }

    //Verificación de que el usuario exista y se crea la sesión
    public function autenticar()
    {
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $usuarioModel = new UsuarioModel();
        $datosUsuario = $usuarioModel->verificarUsuario($usuario, $password);

        if ($datosUsuario) { //Se guarda la sesión si las credenciales son correctas
            session()->set([
                'id' => $datosUsuario['id'],
                'usuario' => $datosUsuario['usuario'],
                'rol' => $datosUsuario['rol'],
                'logged_in' => true
            ]);
            return redirect()->to('/panel'); #Para el mensaje de bienvenida
        } else { //Se muestra un mensaje de error si las credenciales no coinciden
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos'); #Se muestra mensaje en el inicio de sesión
        }
    }

    //Se muestra el panel que corresponda según en rol del usuario
    public function panel()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        //Se determina según el rol que vista se mostrará
        $rol = session()->get('rol');

        if ($rol === 'admin') {
            return view('panel/admin');
        } elseif ($rol === 'bibliotecario') {
            return view('panel/bibliotecario');
        } elseif ($rol === 'docente') {
            return view('panel/docente');
        } else {
            return view('panel/alumno');
        }
    }

    //Cerrar sesión
    public function salir()
    {
        session()->destroy();
        return redirect()->to('/');
    }

}