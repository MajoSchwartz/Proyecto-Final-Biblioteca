<?php
namespace App\Controllers;

use App\Models\LibroModel;
use App\Models\UsuarioModel; 

class Reporte extends BaseController
{
    public function libros()
    {
        //Obtiene datos de la base de datos
        $libroModel = new LibroModel();
        $data['libros'] = $libroModel->findAll();
        
        //envía los libros a la vista
        return view('reportes/libros_html', $data);
    }
    public function usuarios()
    {
        //Obtiene datos de la base de datos
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->findAll();
        
        //envía los libros a la vista
        return view('reportes/usuarios_html', $data);  
    }
        
}