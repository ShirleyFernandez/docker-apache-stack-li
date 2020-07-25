<?
require __DIR__ . '/../../src/models/Pedidos.php';
function funcioninsertarPedido($request){
    $objCrepas= new Pedidos();
    return $objCrepas->insertarPedido($request);
}
function funciongetPedidos($request){
    $objCrepas= new Pedidos();
    return $objCrepas->getPedidos($request);
}
function funcionEliminarPedido($request){
    $objCrepas= new Pedidos();
    return $objCrepas->eliminarPedido($request);
}
function funcionActualizarPedido($request){
    $objCrepas= new Pedidos();
    return $objCrepas->actualizarPedido($request);
}
