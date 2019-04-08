<?php

use Illuminate\Routing\Router;

/** @var $router Router */

$router->group(array('namespace' => 'App\Controller'), function (Router $router) {
    $router->get('/', 'Home@index');

    $router->get('/register', 'Home@register');
    $router->get('/login', 'Home@login');
    $router->get('/logout', 'Home@logout');
    $router->get('/home/addrole', 'Home@addRole');

    $router->post('/privileges', 'Privileges@create');
    $router->put('/privileges/{id}', 'Privileges@update');
    $router->put('/privileges', 'Admin@index');
    $router->delete('/privileges/{id}', 'Privileges@destroy');
    $router->get('/privileges/{id}/edit', 'Privileges@edit');
    $router->get('/privileges/{id}/activaterole', 'Privileges@activateRole');

    $router->get('/songs', 'Songs@index');
    $router->post('/songs', 'Songs@create');
    $router->get('/songs/result', 'Songs@result');
    $router->delete('/songs/{id}', 'Songs@destroy');
    $router->get('/songs/{id}/edit', 'Songs@edit');
    $router->put('/songs/{id}', 'Songs@update');

    $router->get('/users', 'Users@index');
    $router->post('/users/login', 'Users@login');
    $router->post('/users/register', 'Users@register');

    $router->get('/admin', 'Admin@index');
    $router->get('/admin/{id}/edit', 'Admin@edit');
    $router->put('/admin/{id}', 'Admin@update');

    $router->get('/playlist', 'Playlist@index');
    $router->post('/playlist', 'Playlist@create');

    $router->any('{any}', 'Problem@index')->where('any', '.*');
});
