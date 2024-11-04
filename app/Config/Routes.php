<?php

use App\Controllers\WebhookListener;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('webhook', [WebhookListener::class, 'index']);