<?php
namespace App\Controllers;

use App\Models\LibroModel;
use App\Models\UsuarioModel; 
use App\Models\PrestamoModel; 
use App\Models\DevolucionModel; 
use Dompdf\Dompdf;

class Reporte extends BaseController
    {
        public function prestamosPDF()
        {
            $db = db_connect();
            $builder = $db->table('prestamos');
            $datos['registros_prestamos'] = $builder
                ->select('prestamos.id, prestamos.libro_id, prestamos.ejemplar, libros.titulo, usuarios.nombre, usuarios.carnet, prestamos.fecha_prestamo, prestamos.fecha_devolucion')
                ->join('usuarios', 'usuarios.id = prestamos.usuario_id')
                ->join('libros', 'libros.id = prestamos.libro_id')
                ->orderBy('prestamos.id', 'ASC')
                ->get()
                ->getResultArray();

            $html = view('reportes/prestamos_pdf', $datos);

            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $dompdf->stream('reporte_prestamos.pdf', ['Attachment' => false]);
    }

    public function librosTodosPDF()
    {
        $libroModel = new LibroModel();
        $datos['libros'] = $libroModel->orderBy('titulo', 'asc')->findAll();

        $html = view('reportes/libros_todos_pdf', $datos);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('reporte_libros_todos.pdf', ['Attachment' => false]);
    }

    public function librosPorEstadoPDF($estado)
    {
        $libroModel = new LibroModel();
        $datos['libros'] = $libroModel->where('estado', $estado)->orderBy('titulo', 'asc')->findAll();
        $datos['estado'] = $estado;

        $html = view('reportes/libros_por_estado_pdf', $datos);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("reporte_libros_{$estado}.pdf", ['Attachment' => false]);
    }
    

    public function usuarios()
    {
        //Obtiene datos de la base de datos
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->findAll();
        $data['cabecera']= view('template/cabecera');
        $data['pie']= view('template/piepagina');
        
        //envía los libros a la vista
        return view('reportes/usuarios_html', $data);  
    }
        
}