<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//Rutas para Login
$routes->get('/', 'Login::index');
$routes->post('login/autenticar', 'Login::autenticar');
$routes->get('panel', 'Login::panel');
$routes->get('panel/admin', 'Login::panel');
$routes->get('panel/bibliotecario', 'Login::panel');
$routes->get('panel/alumno', 'Login::panel');
$routes->get('login/salir', 'Login::salir');

// Rutas para Usuario (CRUD completo)
$routes->get('usuario', 'Usuario::index'); // El usuario accede a la ruta, que accede el controlador y su función
$routes->get('usuarios/crear', 'Usuario::crear'); // Formulario para crear usuario
$routes->post('usuarios/guardar', 'Usuario::guardar'); // Guardar nuevo usuario con el método utilizado
$routes->get('usuarios/borrar/(:num)', 'Usuario::borrar/$1'); //Se agrega num por el numero que se quiere capturar
$routes->get('usuarios/editar/(:num)', 'Usuario::editar/$1');
$routes->post('usuarios/actualizar', 'Usuario::actualizar');

// Rutas para Libro (CRUD completo)
$routes->get('libro', 'Libro::index'); // Lista de libros
$routes->get('crearl', 'Libro::crear'); // Crear un nuevo libro
$routes->post('guardarl', 'Libro::guardar');
$routes->get('editarl/(:num)', 'Libro::editar/$1');
$routes->post('actualizarl', 'Libro::actualizar');
$routes->get('borrarl/(:num)', 'Libro::borrar/$1');
$routes->get('libros/buscar', 'Libro::buscar');
$routes->get('libros/todos', 'Libro::todos');
$routes->get('libros/disponible', 'Libro::disponibles');
$routes->get('libros/prestado', 'Libro::prestados');
$routes->get('libros/danado', 'Libro::danados');



// Rutas para Prestamo (Crear y eliminar)
$routes->get('prestamo', 'Prestamo::index'); // Lista de préstamos
$routes->get('prestamos/crear/(:num)', 'Prestamo::crear/$1'); // Formulario para registrar préstamo
$routes->post('prestamos/guardar', 'Prestamo::guardar'); // Guardar préstamo
$routes->get('prestamos/registro', 'Prestamo::registro'); // Registro de préstamo
$routes->get('prestamos/listado', 'Prestamo::listado'); // Registro de préstamo


// Rutas para Devolucion (Crear)
$routes->get('devolucion', 'Devolucion::index'); // Lista de devoluciones
$routes->get('devoluciones/crear/(:num)', 'Devolucion::crear/$1'); // Formulario para registrar devolución
$routes->post('devoluciones/guardar', 'Devolucion::guardar'); // Guardar devolución
$routes->get('devoluciones/listado', 'Devolucion::listado');
$routes->get('devoluciones/registro', 'Devolucion::registro');


//Ruta para generar reportes
$routes->get('reporte/libros', 'Reporte::libros'); //reporte de libros
$routes->get('reporte/usuarios', 'Reporte::usuarios'); //reporte de usuarios
$routes->get('reportes/prestamos-pdf', 'Reporte::prestamosPDF');
$routes->get('reportes/libros-todos-pdf', 'Reporte::librosTodosPDF');
$routes->get('reportes/libros/estado/(:segment)', 'Reporte::librosPorEstadoPDF/$1');