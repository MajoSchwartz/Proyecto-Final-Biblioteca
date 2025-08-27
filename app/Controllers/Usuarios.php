<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GUsuarioModel;
class Usuarios extends Controller{

    public function __construct()
    {
        $this->gusuariomodel = new GUsuarioModel(); #Inicializa el modelo al crear el controlador
        if (!session()->get('logged_in')) { #Verifica si el usuario está logueado
            return redirect()->to('/'); #Redirige al login si no está logeado
        }

        helper('form');
    }

    public function index(){
        $usuario = new GUsuarioModel;
        $datos['usuarios']= $usuario->orderBy('id','asc')->findAll();
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('usuarios/usuario',$datos);
    }

    public function CREAR(){
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('usuarios/crear',$datos);
    }

    public function guardar(){
        //$usuario = new usuario();
        $usuario = new usuario();        
        $data=[
            'usuario' => $this->request->getPost('usuario'),
            'password' => SHA1($this->request->getPost('password')),
            'nombre' => $this->request->getVar('nombre'),
            'carnet' => $this->request->getVar('carnet'),
            'correo' => $this->request->getPost('correo'),
            'rol' => $this->request->getVar('rol')
        ];
        $usuario->insert($data);
        return $this->response->redirect(site_url('/crear'));
    }

    public function eliminar($id=null) {
        $usuario = new usuario;
        $usuario->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/usuario'));
    }

     public function modificar($id=null) {
        $usuario = new usuario;
        $datos['usuario']=$usuario->where('id',$id)->first();
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('usuarios/editar',$datos);
        //return $this->response->redirect(site_url('/usuarios'));
    }

     public function actualizar(){
        $usuario = new usuario(); 
        $data=[
            'usuario' => $this->request->getPost('usuario'),
            'password' => SHA1($this->request->getPost('password')),
            'nombre' => $this->request->getVar('nombre'),
            'carnet' => $this->request->getVar('carnet'),
            'correo' => $this->request->getPost('correo'),
            'rol' => $this->request->getVar('rol')
        ];
        $id = $this->request->getVar('id');
        $usuario->update($id,$data);
        return $this->response->redirect(site_url('/usuario'));
    }

}