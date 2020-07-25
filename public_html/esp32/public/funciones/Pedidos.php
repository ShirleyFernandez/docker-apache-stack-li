<?
require __DIR__ . '/../../src/models/Crepas.php';
function funcioninsertarPedido($request){
    $objCrepas= new Pedidos();
    return $objCrepas->insertarPedido($request);
}
function funciongetPedidosData($request){
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
