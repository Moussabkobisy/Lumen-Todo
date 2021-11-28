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




$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->post('/logout', 'AuthController@logout');

        // get tasks by year - day - month
        $router->get('/todo[/date/{year}[/{month}[/{day}]]]', 'TodoController@GetAllOrByDate');
        // get tasks by category id
        $router->get('/todo/category/{category_id}', 'TodoController@GetByCategory');
        // get tasks by status
        $router->get('/todo/status/{status}', 'TodoController@GetByStatus');
        // get tasks by category and status
        $router->get('/todo/category/{category_id}/status/{status}', 'TodoController@GetByCategoryStatus');

      /*
       * todo :Categories CRUD
       * todo :Tasks CRUD
       * */
    });
});
