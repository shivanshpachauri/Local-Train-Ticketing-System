<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('dashboard','Home::dashboard');
$routes->post('dashboard','Home::dashboard');
$routes->get('login','Home::login');
$routes->post('login','Home::login');
$routes->get('registration','Home::registration');
$routes->post('registration','Home::registration');
$routes->get('availabletrain','Home::availabletrain');
$routes->get('ticket','Home::ticket');
$routes->post('ticket','Home::ticket');
$routes->get('profile','Home::profile');
$routes->get('adminlogin','Home::adminlogin');
$routes->post('adminlogin','Home::adminlogin');
$routes->get('ticketfare','Home::ticketfare');

$routes->get('booktrain','Home::booktrain');
$routes->post('booktrain','Home::booktrain');

$routes->get('admindashboard','Home::admindashboard');
$routes->post('admindashboard','Home::admindashboard');


$routes->get('modifyseat','Home::modifyseat');
$routes->post('modifyseat','Home::modifyseat');

$routes->get('modifyfare','Home::modifyfare');
$routes->post('modifyfare','Home::modifyfare');

