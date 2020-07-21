<?
require __DIR__ . '/../../src/models/sensores.php';
function funcioninsertarPedido($request){
    $objCrepas= new Sensores();
    return $objCrepas->insertarPedido($request);
}
function funciongetListaData($request){
    $objCrepas= new Sensores();
    return $objCrepas->getLista($request);
}
function funcionEliminarPedido($request){
    $objCrepas= new Sensores();
    return $objCrepas->eliminarPedido($request);
}

