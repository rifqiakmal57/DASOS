<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index'); // Tampilkan halaman login
$routes->get('/login', 'Login::index'); // Halaman login
$routes->post('/login/authenticate', 'Login::authenticate'); // Proses login
$routes->get('/dashboard', 'Dashboard::index'); // Halaman dashboard setelah login
$routes->get('login/logout', 'Login::logout'); // Logout
