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
//Migration Route

//Vendas route
$routes->get('/api/(:any)/vendas', 'Request::getRequestPageable/$1');
$routes->get('/api/(:any)/vendas/(:any)', 'Request::getRequestById/$1/$2');
$routes->post('/api/(:any)/admin/vendas', 'Admin\Request::registerRequest/$1');
$routes->put('/api/(:any)/admin/vendas/(:any)', 'Admin\Request::updateRequest/$1/$2');

//Adicionar produto em uma venda
$routes->get('/api/(:any)/vendaProduto', 'Request::getAllProductsRequest/$1');
$routes->get('/api/(:any)/vendaProduto/(:any)', 'Request::getProductsRequestById/$1/$2');
$routes->post('/api/(:any)/admin/vendaProduto', 'Admin\Request::registerProductsRequest/$1');

// Product route
$routes->get('/api/(:any)/produtos', 'Product::getProductsFiltered/$1');
$routes->get('/api/(:any)/produtos/(:num)', 'Product::getProductById/$1/$2');
$routes->post('/api/(:any)/admin/produtos', 'Admin\Product::registerProduct/$1');
$routes->delete('/api/(:any)/admin/produtos/(:any)', 'Admin\Product::deleteProduct/$1/$2');
$routes->put('/api/(:any)/admin/produtos/(:any)', 'Admin\Product::updateProduct/$1/$2');

// User route
// retorna dados basicos do usuario logado
$routes->get('/api/(:any)/usuario', 'Employee::index/$1');
// retorna detalhes do usuario logado
$routes->get('/api/(:any)/usuario/profile', 'Employee::profile/$1');
// inserir usuario
$routes->post('/api/(:any)/usuario', 'Employee::insert/$1');
// deletar usuario
$routes->delete('/api/(:any)/usuario/(:any)', 'Employee::delete/$1/$2');
// atualizar usuario
$routes->put('/api/(:any)/usuario', 'Employee::update/$1');

// Sign route
$routes->post('/sign/register', 'Sign::register');
$routes->post('/sign/login', 'Sign::authenticate');

//Auth route
$routes->get('/auth/expire', 'Sign::expireAllToken');
$routes->get('/auth/token/(:any)', 'Sign::valideToken/$1');

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
