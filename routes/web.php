<?php

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

$router->group(['prefix' => 'api/', 'middleware' => 'auth'], function () use ($router) {
    $router->group(['prefix' => 'products/'], function () use ($router) {
        $router->get('/', 'ProductController@index');
        $router->post('/', 'ProductController@create');
        $router->get('/{productId}', 'ProductController@show');
        $router->patch('/{productId}', 'ProductController@update');
        $router->delete('/{productId}', 'ProductController@destroy');
    });
});
