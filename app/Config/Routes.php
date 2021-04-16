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
$routes->get('/', 'HomeController::index', ['as' => 'pages.beranda']);
// route berita
$routes->get('/berita','BeritaController::index', ['as' => 'pages.list.berita']);
$routes->get('/berita/(:segment)','BeritaController::detail/$1', ['as' => 'pages.detail.berita']);
// route video
$routes->get('/video/(:segment)','VideoController::detail/$1', ['as' => 'pages.detail.video']);
// route profile
$routes->get('/profil/(:segment)','ProfilController::detail/$1', ['as' => 'pages.detail.profil']);
// route pengetahuan bencana
$routes->get('/pengetahuan-bencana/(:segment)','BencanaController::detail/$1', ['as' => 'pages.detail.bencana']);
// route kontak
$routes->get('/kontak','KontakController::detail', ['as' => 'pages.detail.kontak']);
// route buku
$routes->get('/buku','BukuController::index', ['as' => 'pages.list.buku']);
$routes->get('/buku/(:segment)','BukuController::detail/$1', ['as' => 'pages.detail.buku']);
$routes->get('/buku/download/(:segment)','BukuController::download/$1', ['as' => 'pages.download.buku']);
// route buku
$routes->get('/galeri','GalleryController::index', ['as' => 'pages.list.gallery']);
$routes->get('/galeri/(:segment)','GalleryController::detail/$1', ['as' => 'pages.detail.gallery']);

// Admin Route
$routes->group('admin', function($routes)
{
	// Auth Route
	$routes->get('login', 'Admin\AuthController::loginPage',['as' => 'login.page']);
	$routes->post('login', 'Admin\AuthController::login',['as' => 'login.process']);
	// temporary logout before
	$routes->post('logout', 'Admin\AuthController::logout',['as' => 'logout.process']);
	$routes->get('', 'HomeController::admin');
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
		$routes->get('berita/publish/(:segment)', 'Admin\BeritaController::publish/$1', ['as' => 'berita.publish']);
		$routes->get('berita/draft/(:segment)', 'Admin\BeritaController::draft/$1', ['as' => 'berita.draft']);
		$routes->get('berita/(:segment)', 'Admin\BeritaController::detail/$1', ['as' => 'berita.detail']);
		$routes->get('berita/edit/(:segment)', 'Admin\BeritaController::edit/$1', ['as' => 'berita.edit']);
		// Video Route
		$routes->get('video', 'Admin\VideoController::index', ['as' => 'video.index']);
		$routes->post('video', 'Admin\VideoController::store', ['as' => 'video.store']);
		$routes->delete('video', 'Admin\VideoController::delete', ['as' => 'video.delete']);
		$routes->post('video/update', 'Admin\VideoController::update', ['as' => 'video.update']);
		$routes->get('video/create', 'Admin\VideoController::create', ['as' => 'video.create']);
		$routes->get('video/publish/(:segment)', 'Admin\VideoController::publish/$1', ['as' => 'video.publish']);
		$routes->get('video/draft/(:segment)', 'Admin\VideoController::draft/$1', ['as' => 'video.draft']);
		$routes->get('video/(:segment)', 'Admin\VideoController::detail/$1', ['as' => 'video.detail']);
		$routes->get('video/edit/(:segment)', 'Admin\VideoController::edit/$1', ['as' => 'video.edit']);
		// Profil Route
		$routes->post('profil', 'Admin\ProfilController::store', ['as' => 'profil.store']);
		$routes->post('profil/update', 'Admin\ProfilController::update', ['as' => 'profil.update']);
		$routes->get('profil/(:segment)', 'Admin\ProfilController::detail/$1', ['as' => 'profil.detail']);
		$routes->get('profil/edit/(:segment)', 'Admin\ProfilController::edit/$1', ['as' => 'profil.edit']);
		// bencana Route
		$routes->post('bencana', 'Admin\BencanaController::store', ['as' => 'bencana.store']);
		$routes->post('bencana/update', 'Admin\BencanaController::update', ['as' => 'bencana.update']);
		$routes->get('bencana/(:segment)', 'Admin\BencanaController::detail/$1', ['as' => 'bencana.detail']);
		$routes->get('bencana/edit/(:segment)', 'Admin\BencanaController::edit/$1', ['as' => 'bencana.edit']);
		// Banner Route
		$routes->get('banner', 'Admin\BannerController::index', ['as' => 'banner.index']);
		$routes->post('banner', 'Admin\BannerController::store', ['as' => 'banner.store']);
		$routes->delete('banner', 'Admin\BannerController::delete', ['as' => 'banner.delete']);
		$routes->post('banner/update', 'Admin\BannerController::update', ['as' => 'banner.update']);
		$routes->get('banner/create', 'Admin\BannerController::create', ['as' => 'banner.create']);
		$routes->get('banner/(:segment)', 'Admin\BannerController::detail/$1', ['as' => 'banner.detail']);
		$routes->get('banner/edit/(:segment)', 'Admin\BannerController::edit/$1', ['as' => 'banner.edit']);
		// Gallery Route
		$routes->get('gallery', 'Admin\GalleryController::index', ['as' => 'gallery.index']);
		$routes->post('gallery', 'Admin\GalleryController::store', ['as' => 'gallery.store']);
		$routes->delete('gallery', 'Admin\GalleryController::delete', ['as' => 'gallery.post.delete']);
		$routes->post('gallery/update', 'Admin\GalleryController::update', ['as' => 'gallery.update']);
		$routes->get('gallery/create', 'Admin\GalleryController::create', ['as' => 'gallery.create']);
		$routes->get('gallery/publish/(:segment)', 'Admin\GalleryController::publish/$1', ['as' => 'gallery.publish']);
		$routes->get('gallery/draft/(:segment)', 'Admin\GalleryController::draft/$1', ['as' => 'gallery.draft']);
		$routes->get('gallery/(:segment)', 'Admin\GalleryController::detail/$1', ['as' => 'gallery.detail']);
		$routes->get('gallery/edit/(:segment)', 'Admin\GalleryController::edit/$1', ['as' => 'gallery.edit']);
		$routes->delete('gallery/photo/delete', 'Admin\GalleryController::deletePhotoGallery', ['as' => 'gallery.photo.delete']);
		// Buku Route
		$routes->get('buku', 'Admin\BukuController::index', ['as' => 'buku.index']);
		$routes->post('buku', 'Admin\BukuController::store', ['as' => 'buku.store']);
		$routes->delete('buku', 'Admin\BukuController::delete', ['as' => 'buku.delete']);
		$routes->post('buku/update', 'Admin\BukuController::update', ['as' => 'buku.update']);
		$routes->get('buku/create', 'Admin\BukuController::create', ['as' => 'buku.create']);
		$routes->get('buku/publish/(:segment)', 'Admin\BukuController::publish/$1', ['as' => 'buku.publish']);
		$routes->get('buku/draft/(:segment)', 'Admin\BukuController::draft/$1', ['as' => 'buku.draft']);
		$routes->get('buku/(:segment)', 'Admin\BukuController::detail/$1', ['as' => 'buku.detail']);
		$routes->get('buku/edit/(:segment)', 'Admin\BukuController::edit/$1', ['as' => 'buku.edit']);
		$routes->get('buku/download/(:segment)', 'Admin\BukuController::download/$1', ['as' => 'buku.download']);
		// kontak Route
		$routes->post('kontak', 'Admin\KontakController::store', ['as' => 'kontak.store']);
		$routes->post('kontak/update', 'Admin\KontakController::update', ['as' => 'kontak.update']);
		$routes->get('kontak', 'Admin\KontakController::detail', ['as' => 'kontak.detail']);
		$routes->get('kontak/edit', 'Admin\KontakController::edit', ['as' => 'kontak.edit']);
	});
});

// uploads image
$routes->post('image/upload', 'Admin\UploadController::uploadImage', ['as' => 'image.upload']);
$routes->post('image/delete', 'Admin\UploadController::deleteImage', ['as' => 'image.delete']);
$routes->post('gallery/image/upload', 'Admin\UploadController::uploadImageDZ', ['as' => 'gallery.upload']);
$routes->post('gallery/image/delete', 'Admin\UploadController::deleteImageDZ', ['as' => 'gallery.delete']);



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
