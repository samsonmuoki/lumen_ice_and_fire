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


$router->group([
    'middleware' => ['cors'],
    'prefix' => 'api'
], function () use ($router) {
    // books apis
    $router->get('books', ['uses' => 'BookController@listAllBooks']);
    $router->get('books/{id}', ['uses' => 'BookController@listOneBook']);
    $router->post('books', ['uses' => 'BookController@create']);

    // comments apis
    // $router->post('books/{id}/comments', ['uses' => 'BookController@createComments']);  // TODO
    $router->get('comments', ['uses' => 'CommentController@listAllComments']);
    $router->post('comments', ['uses' => 'CommentController@create']);

    // characters apis
    $router->get('characters', ['uses' => 'CharacterController@listAllCharacters']);
    $router->get('characters/{id}', ['uses' => 'CharacterController@listOneCharacter']);
    $router->post('characters', ['uses' => 'CharacterController@create']);

    // bookcharacters apis
    $router->get('bookscharacters', ['uses' => 'BooksCharactersController@listAllBooksCharacters']);
    $router->post('bookscharacters', ['uses' => 'BooksCharactersController@create']);
});
