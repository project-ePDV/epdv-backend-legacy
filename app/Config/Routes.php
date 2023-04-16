<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Home route
$routes->get('/', 'Home::index');

// Product route

// listar produtos
$routes->get('/api/(:any)/produtos', 'Product::getProductsFiltered/$1');
// retornar 1 produto pelo id
$routes->get('/api/(:any)/produtos/(:num)', 'Product::getProductById/$1/$2');
// inserir produto
$routes->post('/api/(:any)/admin/produtos', 'Admin\Product::registerProduct/$1');
// deletar produto
$routes->get('/api/(:any)/admin/produtos/deletar/(:any)', 'Admin\Product::deleteProduct/$1/$2');
// atualizar produto
$routes->put('/api/(:any)/admin/produtos', 'Admin\Product::updateProduct/$1');

// User route
// retorna dados basicos do usuario logado
$routes->get('/api/(:any)/employee', 'Employee::index/$1');
// retorna detalhes do usuario logado
$routes->get('/api/(:any)/employee/profile', 'Employee::profile/$1');
// inserir usuario
$routes->post('/api/(:any)/employee/profile', 'Employee::insert/$1');
// deletar usuario
$routes->delete('/api/(:any)/employee/profile', 'Employee::delete/$1');
// atualizar usuario
$routes->put('/api/(:any)/employee/profile', 'Employee::update/$1');

// Sign route
$routes->post('/sign/register', 'Sign::register');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
