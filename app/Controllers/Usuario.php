<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel; //Para poder acceder y hacer uso de la base de datos

class Usuario extends Controller{
    public function index ()
    {
        $usuario = new UsuarioModel(); //Variable del modelo

        $datos['usuarios']= $usuario->orderBy('id', 'ASC') -> findAll();

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view('usuarios/usuario', $datos); //Al llamar esta función, va a la vista "usuarios"
    }

    public function crear(){

        helper('form'); //para poder usar la lista de opciones
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view ('usuarios/crear', $datos);
    }

    public function guardar(){

        $usuario = new UsuarioModel(); //crear una instancia al modelo para capturar la información y  meterla a la BD
        //para obtener todos los valores de los campos

        $datos=[
            'usuario' => $this->request->getVar('usuario'),
            'nombre' => $this->request->getVar('nombre'),
            'carnet' => $this->request->getVar('carnet'), 
            'correo' => $this->request->getVar('correo'), 
            'rol' => $this->request->getVar('rol'),
            'password' => SHA1($this->request->getVar('PASSWORD'))
        ];

        $usuario->insert($datos);
        return $this->response->redirect(site_url('/usuario'));
    }

    public function borrar($id=null){ //En caso de no recepcionar nada
        echo "Borrar registro".$id;
    }
}