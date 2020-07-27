<?
require __DIR__ . '/../../src/models/Productos.php';
function funcioninsertarProductos($request){
    $objCrepas= new Productos();
    return $objCrepas->insertarProducto($request);
}
function funciongetProductos($request){
    $objCrepas= new Productos();
    return $objCrepas->getProductos($request);
}
function funcionEliminarProducto($request){
    $objCrepas= new Productos();
    return $objCrepas->eliminarProducto($request);
}

