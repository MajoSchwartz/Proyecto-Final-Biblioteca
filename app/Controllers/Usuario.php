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
        
        //Validación que los campos estén completos
        $validacion = $this->validate([
            'usuario' => 'required|max_length[100]',
            'nombre' => 'required|max_length[100]',
            'carnet' => 'required|max_length[100]',
            'correo' => 'required|valid_email',
            'rol' => 'required|in_list[alumno,bibliotecario,admin]',
            'PASSWORD' => 'required|min_length[6]',

        ]);
        
        //para obtener todos los valores de los campos
        $datos=[
            'usuario' => $this->request->getVar('usuario'),
            'nombre' => $this->request->getVar('nombre'),
            'carnet' => $this->request->getVar('carnet'), 
            'correo' => $this->request->getVar('correo'), 
            'rol' => $this->request->getVar('rol'),
            'password' => md5($this->request->getVar('PASSWORD'))
        ];

        log_message('debug', 'Datos recibidos en guardar: ' . print_r($datos, true));

        if ($usuario->saveWithDuplicateCheck($datos)) {
            return redirect()->to('/usuario')->with('success', 'Libro guardado exitosamente');
        } else {
            $errors = $usuario->errors();
            log_message('error', 'Errores al guardar: ' . print_r($errors, true));
            return redirect()->to('/usuarios/crear')->with('errors', $errors)->withInput();
        }
    }

    public function borrar($id=null){ //En caso de no recepcionar nada
        echo "Borrar registro".$id;
        $usuario= new UsuarioModel();
        $usuario->where('id',$id)->delete($id); //Borrar el id que coinicda con el que se solicita

        return $this->response->redirect(site_url('/usuario')); //Se regresa a la vista usuarios
        
    }

    public function editar($id=null){
        $usuario= new UsuarioModel();
        $datos['usuario']=$usuario->where('id',$id)->first(); //Se busca los usuarios que tengan ese id y se utiliza el primero

        helper('form'); //para poder usar la lista de opciones

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        

        return view ('usuarios/editar',$datos);

    }

    public function actualizar(){
        $usuario= new UsuarioModel();
        $datos=[
            'usuario' => $this->request->getPost('usuario'),
            'nombre' => $this->request->getVar('nombre'),
            'carnet' => $this->request->getVar('carnet'), 
            'correo' => $this->request->getPost('correo'), 
            'rol' => $this->request->getVar('rol'),
            'password' => MD5($this->request->getVar('PASSWORD'))
        ];
        $id= $this->request->getVar('id'); //Recepciona de la interfaz editar el id enviado
        $usuario->update($id,$datos); //Actualizar el usuario utilizando el id y sus datos

        return $this->response->redirect(site_url('/usuario'));
    }
}