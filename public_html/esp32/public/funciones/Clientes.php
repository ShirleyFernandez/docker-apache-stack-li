<?
require __DIR__ . '/../../src/models/Clientes.php';
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

