<?
require __DIR__ . '/../../src/models/Ventas.php';
function funcioninsertarVenta($request){
    $objCrepas= new Ventas();
    return $objCrepas->insertarVenta($request);
}
function funciongetVentas($request){
    $objCrepas= new Ventas();
    return $objCrepas->getVentas($request);
}
function funcionEliminarVenta($request){
    $objCrepas= new Ventas();
    return $objCrepas->eliminarVenta($request);
}

