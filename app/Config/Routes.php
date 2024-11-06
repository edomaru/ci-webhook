<?php

use App\Controllers\SendMessage;
use App\Controllers\WebhookListener;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('webhook', [WebhookListener::class, 'index']);
$routes->post('send-template', [SendMessage::class, 'sendTemplate']);
$routes->post('send-text', [SendMessage::class, 'sendText']);
$routes->post('send-media', [SendMessage::class, 'sendMedia']);