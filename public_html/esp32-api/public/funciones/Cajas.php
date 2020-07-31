<?
require __DIR__ . '/../../src/models/Cajas.php';
function funciongetCajas($request){
    $objCrepas= new Cajas();
    return $objCrepas->getCajas($request);
}