<?php
namespace App\Controllers;

use App\Models\LibroModel;
use App\Models\UsuarioModel; 
use App\Models\PrestamoModel; 
use App\Models\DevolucionModel; 
// Importa la librería Dompdf para generar archivos PDF
use Dompdf\Dompdf;

class Reporte extends BaseController
    {
        // Genera el reporte PDF de todos los préstamos registrados
        public function prestamosPDF()
        {
            //Establece conexión directa a la base de datos
            $db = db_connect();
            //Realiza la consulta sobre la tabla préstamos
            $builder = $db->table('prestamos');
            //Selecciona los campos
            $datos['registros_prestamos'] = $builder
                ->select('prestamos.id, prestamos.libro_id, prestamos.ejemplar, libros.titulo, usuarios.nombre, usuarios.carnet, prestamos.fecha_prestamo, prestamos.fecha_devolucion')
                ->join('usuarios', 'usuarios.id = prestamos.usuario_id')
                ->join('libros', 'libros.id = prestamos.libro_id')
                ->orderBy('prestamos.id', 'ASC')
                ->get()
                ->getResultArray();

            //Carga la vista html
            $html = view('reportes/prestamos_pdf', $datos);

            //Inicializa DOMPDF y genera el PDF
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $dompdf->stream('reporte_prestamos.pdf', ['Attachment' => false]);
    }

    //Genera el reporte PDF de todos los libros registrados
    public function librosTodosPDF()
    {
        $libroModel = new LibroModel();
        $datos['libros'] = $libroModel->orderBy('titulo', 'asc')->findAll();

        // Carga la vista HTML que será convertida en PDF
        $html = view('reportes/libros_todos_pdf', $datos);

        // Inicializa Dompdf y genera el PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('reporte_libros_todos.pdf', ['Attachment' => false]);
    }

    //Genera el reporte PDF de los libros filtrados por estado
    public function librosPorEstadoPDF($estado)
    {
        $libroModel = new LibroModel();
        $datos['libros'] = $libroModel->where('estado', $estado)->orderBy('titulo', 'asc')->findAll();
        $datos['estado'] = $estado;

        //Vista html para PDF
        $html = view('reportes/libros_por_estado_pdf', $datos);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("reporte_libros_{$estado}.pdf", ['Attachment' => false]);
    }
    

    // Muestra la lista de usuarios en formato HTML (no PDF)
    public function usuarios()
    {
        //Obtiene datos de la base de datos
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->findAll();
        $data['cabecera']= view('template/cabecera');
        $data['pie']= view('template/piepagina');
        
        //Retorna la vista HTML con los datos de usuarios
        return view('reportes/usuarios_html', $data);  
    }
        
}