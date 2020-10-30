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

$router->group(['prefix' => 'item'], function () use ($router) {

    $router->group(['middleware' => ['itemIdValidation', 'itemBinder']], function () use ($router) {

        $router->get('{itemId}', 'ItemController@get');

        $router->put('{itemId}', 'ItemController@put');

        $router->delete('{itemId}', 'ItemController@delete');

        $router->post('{itemId}/size', 'ItemSizeController@create');

        $router->get('{itemId}/size[/{order}]', 'ItemSizeController@get');
    });

    $router->post('/', 'ItemController@create');
});
