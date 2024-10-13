<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->match(['GET','POST'],'register', 'Users::register');

$routes->get('/dashboard', 'Dashboard::index');


$routes->get('/index', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/services', 'Home::services');
$routes->get('/blog', 'Home::blog');
$routes->get('/booking', 'Home::booking');
$routes->get('/contact', 'Home::contact');
$routes->get('/destination', 'Home::destination');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/guides', 'Home::guides');
$routes->get('/packages', 'Home::packages');
$routes->get('/testimonial', 'Home::testimonial');
$routes->get('/tour', 'Home::tour');



$routes->get('/add-trip', 'Trip::tripManagementView');
$routes->post('trip/add-trip', 'Trip::addTrip');
$routes->get('trip/fetch-trip', 'Trip::fetchTrips');
$routes->post('trip/delete-trip', 'Trip::deleteTrip');
$routes->get('trip/get-trip/(:num)', 'Trip::getTrip/$1');
$routes->post('trip/update-trip/(:num)', 'Trip::updateTrip/$1');

$routes->get('trip/fetch-places-by-continent/(:num)', 'Trip::fetchPlacesByContinent/$1');

$routes->get('/get-trips', 'Trip::getTrips');

$routes->post('trip/confirmBooking', 'Trip::confirmBooking');



$routes->get('/add-booking', 'Trip::bookManagementView');
$routes->get('book/fetch-book', 'Trip::fetchBooking');

$routes->post('trip/updateBookingStatus', 'Trip::updateBookingStatus');

$routes->post('trip/deleteBooking', 'Trip::deleteBooking');
$routes->post('trip/updatePaymentStatus', 'Trip::updatePaymentStatus');
$routes->get('trip/fetch-trip-count', 'Trip::fetchTripCount');
$routes->get('trip/fetch-booking-count', 'Trip::fetchBookingCount');
$routes->get('trip/fetch-total-passengers', 'Trip::fetchTotalPassengers');
$routes->get('trip/fetch-total-price', 'Trip::fetchTotalPrice');


// $routes->post('reviews/add', 'Review::add');
$routes->post('submitComment', 'Review::submitComment');
$routes->get('getReviews', 'Review::getReviews');