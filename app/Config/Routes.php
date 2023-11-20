<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');
$routes->get('/sitemap.xml', 'Sitemap::index');
$routes->get('/blogs/create', 'Blogs::create');
$routes->post('/blogs/save', 'Blogs::save');
$routes->get('/blogs/(:any)', 'Blogs::detail/$1');
$routes->get('/login/', 'Admin\Admin::login');
$routes->get('/register/', 'Admin\Admin::registration');


// admin
$routes->get('/admin', 'Admin\Admin::login', ['filter' => 'AuthGuardLogin']);
$routes->get('/admin/login', 'Admin\Admin::login', ['filter' => 'AuthGuardLogin']);
$routes->post('/admin/signin', 'Admin\Admin::signin', ['filter' => 'AuthGuardLogin']);
$routes->post('/admin/register', 'Admin\Admin::register', ['filter' => 'AuthGuardLogin']);
$routes->get('/admin/registration', 'Admin\Admin::registration', ['filter' => 'AuthGuardLogin']);
$routes->get('/admin/logout', 'Admin\Admin::logout');

// $routes->get('/dashboard/(:any)', 'Admin\Dashboard::/$1', ['filter' => 'AuthGuard']);
$routes->get('/dashboard', 'Admin\Dashboard::index', ['filter' => 'AuthGuard']);
$routes->post('/dashboard/profile/save', 'Admin\Users::save', ['filter' => 'AuthGuard']);
$routes->get('/dashboard/blogs', 'Admin\Dashboard::blogs', ['filter' => 'AuthGuardAdmin']);
$routes->post('/dashboard/blogs/save', 'Admin\Blogs::save', ['filter' => 'AuthGuardAdmin']);
$routes->get('/dashboard/blogs/edit/(:segment)', 'Admin\Blogs::edit/$1', ['filter' => 'AuthGuardAdmin']);
$routes->post('/dashboard/blogs/update/(:segment)', 'Admin\Blogs::update/$1', ['filter' => 'AuthGuardAdmin']);
$routes->get('/dashboard/blogs/create', 'Admin\Blogs::create', ['filter' => 'AuthGuardAdmin']);
$routes->delete('/dashboard/blogs/delete/(:num)', 'Admin\Blogs::delete/$1', ['filter' => 'AuthGuardAdmin']);

// $routes->get('/admin/(:any)', 'Admin\Admin::$1');
