<?
require __DIR__ . '/../../src/models/Crepas.php';
function funcioninsertarVenta($request){
    $objCrepas= new Pedidos();
    return $objCrepas->insertarVenta($request);
}
function funciongetVentas($request){
    $objCrepas= new Pedidos();
    return $objCrepas->getVentas($request);
}
function funcionEliminarVenta($request){
    $objCrepas= new Pedidos();
    return $objCrepas->eliminarVenta($request);
}

