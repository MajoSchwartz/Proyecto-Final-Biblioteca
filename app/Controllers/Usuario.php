<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LibroModel;

class Usuario extends Controller{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
        // Verificación de sesión para proteger el acceso
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }
    }

    public function index()
    {
        $data = ['usuarios' => $this->usuarioModel->findAll()];
        return view('usuario/index', $data);
    }

    public function crear()
    {
        $data = ['usuario' => $this->usuarioModel->create()];
        return view('usuario/crear', $data);
    }

    public function guardar()
    {
        $data = [
            'usuario' => $this->request->getPost('usuario'),
            'password' => SHA1($this->request->getPost('password')),
            'nombre' => $this->request->getPost('nombre'),
            'carne' => $this->request->getPost('carne'),
            'correo' => $this->request->getPost('correo'),
            'rol' => $this->request->getPost('rol'),
        ];
        $this->usuarioModel->save($data);
        return redirect()->to('/usuario');
    }

    public function editar($id)
    {
        $data = ['usuario' => $this->usuarioModel->find($id)];
        return view('usuario/editar', $data);
    }

    public function actualizar($id)
    {
        $data = [
            'usuario' => $this->request->getPost('usuario'),
            'nombre' => $this->request->getPost('nombre'),
            'carne' => $this->request->getPost('carne'),
            'correo' => $this->request->getPost('correo'),
            'rol' => $this->request->getPost('rol'),
        ];
        if ($this->request->getPost('password')) {
            $data['password'] = SHA1($this->request->getPost('password'));
        }
        $this->usuarioModel->update($id, $data);
        return redirect()->to('/usuario');
    }

    public function eliminar($id)
    {
        $this->usuarioModel->delete($id);
        return redirect()->to('/usuario');
    }
}