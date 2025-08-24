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
$routes->get('usuario', 'Usuario::index'); // Lista de usuarios
$routes->get('usuario/crear', 'Usuario::crear'); // Formulario para crear usuario
$routes->post('usuario/guardar', 'Usuario::guardar'); // Guardar nuevo usuario
$routes->get('usuario/editar/(:num)', 'Usuario::editar/$1'); // Formulario para editar (el :num captura el ID)
$routes->post('usuario/actualizar/(:num)', 'Usuario::actualizar/$1'); // Actualizar usuario
$routes->get('usuario/eliminar/(:num)', 'Usuario::eliminar/$1'); // Eliminar usuario

// Rutas para Libro (CRUD completo)
$routes->get('libro', 'Libro::index'); // Lista de libros
$routes->get('libro/crear', 'Libro::crear'); // Formulario para crear libro
$routes->post('libro/guardar', 'Libro::guardar'); // Guardar nuevo libro
$routes->get('libro/editar/(:num)', 'Libro::editar/$1'); // Formulario para editar
$routes->post('libro/actualizar/(:num)', 'Libro::actualizar/$1'); // Actualizar libro
$routes->get('libro/eliminar/(:num)', 'Libro::eliminar/$1'); // Eliminar libro

// Rutas para Prestamo (Crear y eliminar)
$routes->get('prestamo', 'Prestamo::index'); // Lista de préstamos
$routes->get('prestamo/crear', 'Prestamo::crear'); // Formulario para registrar préstamo
$routes->post('prestamo/guardar', 'Prestamo::guardar'); // Guardar préstamo
$routes->get('prestamo/eliminar/(:num)', 'Prestamo::eliminar/$1'); // Cancelar préstamo

// Rutas para Devolucion (Crear)
$routes->get('devolucion', 'Devolucion::index'); // Lista de devoluciones
$routes->get('devolucion/crear', 'Devolucion::crear'); // Formulario para registrar devolución
$routes->post('devolucion/guardar/(:num)', 'Devolucion::guardar/$1'); // Guardar devolución
