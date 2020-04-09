<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//generate key for env
$router->get('/key', function ($length = 32){
    $char = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLen = strlen($char);

    $getToken = '';
    for ($i = 0; $i < $length; $i++) {
        $getToken .= $char[rand(0, $charLen - 1)];
    }

    return $getToken;
});

//login user
$router->put('/login', 'LoginController@login');

$router->group(['middleware' => 'login'], function() use ($router) {
    // get all items
    $router->get('/cds', 'OwnerController@index');

    // create new items
    $router->post('/cd/create', 'OwnerController@store');

    // update items
    $router->put('/cd/{id}', 'OwnerController@update');

    // rent a cd
    $router->put('/rent/{id}', 'TransactionController@rentCd');

    // logout user
    $router->put('/logout', 'LoginController@logout');
});
