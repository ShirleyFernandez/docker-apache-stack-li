<?
require __DIR__ . '/../../src/models/Crepas.php';
function funcioninsertarCliente($request){
    $objCrepas= new Clientes();
    return $objCrepas->insertarCliente($request);
}
function funciongetClientes($request){
    $objCrepas= new Clientes();
    return $objCrepas->getClientes($request);
}
function funcionEliminarCliente($request){
    $objCrepas= new Clientes();
    return $objCrepas->eliminarClientes($request);
}

