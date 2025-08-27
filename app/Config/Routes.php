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
$routes->get('usuario', 'Usuarios::index');
$routes->get('crear', 'Usuarios::crear');
$routes->post('guardar', 'Usuarios::guardar');
$routes->get('eliminar/(:num)', 'Usuarios::eliminar/$1');
$routes->get('modificar/(:num)', 'Usuarios::modificar/$1');
$routes->post('actualizar', 'Usuarios::actualizar');
$routes->get('editar', 'Usuarios::editar');

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
$routes->get('devoluciones', 'Devolucion::index'); // Lista de devoluciones
$routes->get('creard/(:num)', 'Devolucion::crear/$1'); // Formulario para registrar devolución
$routes->post('guardard', 'Devolucion::guardar'); // Guardar devolución$routes->get('prestar', 'Prestamo::prestar');