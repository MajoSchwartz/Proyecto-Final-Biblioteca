<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PrestamoModel;
use App\Models\UsuarioModel; //Para poder acceder y hacer uso de la base de datos

class Usuario extends Controller{

    //Se muestra el listado de usuario
    public function index ()
    {
        $usuario = new UsuarioModel(); //Variable del modelo

        $datos['usuarios']= $usuario->orderBy('id', 'ASC') -> findAll();

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view('usuarios/usuario', $datos); //Al llamar esta función, va a la vista "usuarios"
    }

    //Formulario para crear un nuevo usuario
    public function crear(){

        helper('form'); //para poder usar la lista de opciones
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view ('usuarios/crear', $datos);
    }

    //Guarda el usuario en la base de datos
    public function guardar(){
        $usuario = new UsuarioModel(); //crear una instancia al modelo para capturar la información y  meterla a la BD
        
        //para obtener todos los valores de los campos
        $datos=[
            'usuario' => $this->request->getVar('usuario'),
            'nombre' => $this->request->getVar('nombre'),
            'carnet' => $this->request->getVar('carnet'), 
            'correo' => $this->request->getVar('correo'), 
            'rol' => $this->request->getVar('rol'),
            'PASSWORD' => md5($this->request->getVar('PASSWORD')) //Se cifra la contraseña con MD5
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

    //Elimina un usuario en caso de que no tenga préstamos registrados
    public function borrar($id = null) //En caso de no recepcionar nada
{
    $prestamo = new PrestamoModel();
    $tienePrestamos = $prestamo->where('usuario_id', $id)->countAllResults();

    if ($tienePrestamos > 0) {
        return redirect()->to('/usuario')->with('error', 'No se puede eliminar: el usuario tiene préstamos registrados.');
    }

    $usuario = new UsuarioModel();
    $usuario->delete($id);

    return redirect()->to('/usuario')->with('success', 'Usuario eliminado correctamente.');
}


    //Formulario para editar los datos del usuario
    public function editar($id=null){
        $usuario= new UsuarioModel();
        $datos['usuario']=$usuario->where('id',$id)->first(); //Se busca los usuarios que tengan ese id y se utiliza el primero

        helper('form'); //para poder usar la lista de opciones

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        

        return view ('usuarios/editar',$datos);

    }

    //Formulario para actualizar los datos del usuario
    public function actualizar(){
        $usuario= new UsuarioModel();
        $datos=[
            'usuario' => $this->request->getPost('usuario'),
            'nombre' => $this->request->getVar('nombre'),
            'carnet' => $this->request->getVar('carnet'), 
            'correo' => $this->request->getPost('correo'), 
            'rol' => $this->request->getVar('rol'),
            'password' => MD5($this->request->getVar('PASSWORD')) //Se vuelve a cifrar la contraseña
        ];
        $id= $this->request->getVar('id'); //Recepciona de la interfaz editar el id enviado
        $usuario->update($id,$datos); //Actualizar el usuario utilizando el id y sus datos

        return $this->response->redirect(site_url('/usuario'));
    }
}