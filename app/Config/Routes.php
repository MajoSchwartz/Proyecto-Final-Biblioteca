<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//Rutas para Login
$routes->get('/', 'Login::index');
$routes->post('login/autenticar', 'Login::autenticar');
$routes->get('panel', 'Login::panel');
$routes->get('login/salir', 'Login::salir');

// Rutas para Usuario (CRUD completo)
$routes->get('usuario', 'Usuario::index'); // El usuario accede a la ruta, que accede el controlador y su función
$routes->get('usuarios/crear', 'Usuario::crear'); // Formulario para crear usuario
$routes->post('usuarios/guardar', 'Usuario::guardar'); // Guardar nuevo usuario con el método utilizado
$routes->get('usuario/editar/(:num)', 'Usuario::editar/$1'); // Formulario para editar (el :num captura el ID)
$routes->post('usuario/actualizar/(:num)', 'Usuario::actualizar/$1'); // Actualizar usuario
$routes->get('usuarios/borrar/(:num)', 'Usuario::borrar$1'); //Se agrega num por el numero que se quiere capturar

// Rutas para Libro (CRUD completo)
$routes->get('libro', 'Libro::index'); // Lista de libros
$routes->get('crearl', 'Libro::crear'); // Crear un nuevo libro
$routes->post('guardarl', 'Libro::guardar');
$routes->get('editarl/(:num)', 'Libro::editar/$1');
$routes->post('actualizarl', 'Libro::actualizar');
$routes->get('borrarl/(:num)', 'Libro::borrar/$1');


// Rutas para Prestamo (Crear y eliminar)
$routes->get('prestamos', 'Prestamo::index'); // Lista de préstamos
$routes->get('crearp/(:num)', 'Prestamo::crear/$1'); // Formulario para registrar préstamo
$routes->post('guardarp', 'Prestamo::guardar'); // Guardar préstamo

// Rutas para Devolucion (Crear)
$routes->get('devolucion', 'Devolucion::index'); // Lista de devoluciones
$routes->get('devolucion/crear', 'Devolucion::crear'); // Formulario para registrar devolución
$routes->post('devolucion/guardar/(:num)', 'Devolucion::guardar/$1'); // Guardar devolución
