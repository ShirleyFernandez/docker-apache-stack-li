<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
///
/// http://localhost/apirest/public/api/v1/employee
///

// API group
$app->group('/api', function () use ($app) {
   
    //REGISTROUSUARIOS
    $app->post('/rutacalculadora','funcionCalculadora');

    //Pedidos
    $app->post('/Pedidos','funcioninsertarPedido');
    $app->get('/Pedidos','funciongetPedidos');
    $app->delete('/Pedidos','funcionEliminarPedido');
    $app->patch('/Pedidos','funcionActualizarPedido');

    //Clientes
    $app->post('/Clientes','funcioninsertarCliente');
    $app->get('/Clientes','funciongetClientes');
    $app->delete('/Clientes','funcionEliminarCliente');

    //Ventas
    $app->post('/Ventas','funcioninsertarVenta');
    $app->get('/Ventas','funciongetVentas');
    $app->delete('/Ventas','funcionEliminarVenta');

    //Productos
    $app->post('/Productos','funcioninsertarProducto');
    $app->get('/Productos','funciongetProductos');
    $app->delete('/Productos','funcionEliminarProducto');
});
