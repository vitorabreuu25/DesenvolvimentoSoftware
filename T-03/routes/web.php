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

$router->get('/', 'PageController@index');
$router->get('/home', 'PageController@index');
$router->get('/ajuda', 'PageController@ajuda');
$router->get('/login', 'PageController@login');
$router->get('/registro', 'PageController@registro');
$router->post('/usuario/login', 'UsuariosController@login');
$router->get('/usuario/logout', 'UsuariosController@logout');
$router->post('/usuario/registro', 'UsuariosController@store');
$router->get('/usuario/registro', 'UsuariosController@index');
$router->get('/evento/cadastro', 'PageController@eventoCadastro');
$router->get('/evento/detalhes/{id}', 'PageController@eventoDetalhes');
$router->get('/compra/carrinho/{id}', 'PageController@compraCarrinho');
$router->get('/compra/minhas', 'ComprasController@index');
$router->post('/compra', 'ComprasController@store');
$router->get('/auditoria/historico/', 'HistoricosController@index');

$router->get('/compra/presente/{id}', 'ComprasController@presente');
$router->get('/compra/estornar/{id}', 'ComprasController@estornar');
$router->post('/compra/presente', 'ComprasController@realizarPresente');