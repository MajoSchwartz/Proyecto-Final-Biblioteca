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
$routes->get('crear', 'Libro::crear'); // Crear un nuevo libro
$routes->post('libro/guardar', 'Libro::guardar');
$routes->get('editar/(:num)', 'Libro::editar/$1');
$routes->post('actualizar', 'Libro::actualizar');
$routes->get('borrar/(:num)', 'Libro::borrar/$1');


// Rutas para Prestamo (Crear y eliminar)
$routes->get('prestamo', 'Prestamo::index'); // Lista de préstamos
$routes->get('prestamo/crear', 'Prestamo::crear'); // Formulario para registrar préstamo
$routes->post('prestamo/guardar', 'Prestamo::guardar'); // Guardar préstamo
$routes->get('prestamo/eliminar/(:num)', 'Prestamo::eliminar/$1'); // Cancelar préstamo

// Rutas para Devolucion (Crear)
$routes->get('devolucion', 'Devolucion::index'); // Lista de devoluciones
$routes->get('devolucion/crear', 'Devolucion::crear'); // Formulario para registrar devolución
$routes->post('devolucion/guardar/(:num)', 'Devolucion::guardar/$1'); // Guardar devolución
