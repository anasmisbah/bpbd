<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/', 'Home::index');


// Admin Route
$routes->group('admin', function($routes)
{
	// Auth Route
	$routes->get('login', 'Admin\AuthController::loginPage',['as' => 'login.page']);
	$routes->post('login', 'Admin\AuthController::login',['as' => 'login.process']);
	// temporary logout before
	$routes->get('logout', 'Admin\AuthController::logout',['as' => 'logout.process']);
	$routes->group( '',['filter' => 'auth'], function($routes)
	{		
		$routes->get('dashboard', 'Admin\DashboardController::dashboard',['as' => 'admin.dashboard']);
		// Kategori Route
		$routes->get('kategori', 'Admin\KategoriController::index', ['as' => 'kategori.index']);
		$routes->post('kategori', 'Admin\KategoriController::store', ['as' => 'kategori.store']);
		$routes->delete('kategori', 'Admin\KategoriController::delete', ['as' => 'kategori.delete']);
		$routes->put('kategori', 'Admin\KategoriController::update', ['as' => 'kategori.update']);
		$routes->get('kategori/create', 'Admin\KategoriController::create', ['as' => 'kategori.create']);
		$routes->get('kategori/(:segment)', 'Admin\KategoriController::detail/$1', ['as' => 'kategori.detail']);
		$routes->get('kategori/edit/(:segment)', 'Admin\KategoriController::edit/$1', ['as' => 'kategori.edit']);
		// Berita Route
		$routes->get('berita', 'Admin\BeritaController::index', ['as' => 'berita.index']);
		$routes->post('berita', 'Admin\BeritaController::store', ['as' => 'berita.store']);
		$routes->delete('berita', 'Admin\BeritaController::delete', ['as' => 'berita.delete']);
		$routes->post('berita/update', 'Admin\BeritaController::update', ['as' => 'berita.update']);
		$routes->get('berita/create', 'Admin\BeritaController::create', ['as' => 'berita.create']);
		$routes->get('berita/(:segment)', 'Admin\BeritaController::detail/$1', ['as' => 'berita.detail']);
		$routes->get('berita/edit/(:segment)', 'Admin\BeritaController::edit/$1', ['as' => 'berita.edit']);
	});
});



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
