<?
require __DIR__ . '/../../src/models/Fechas.php';
function funciongetFechas($request){
    $objCrepas= new Fechas();
    return $objCrepas->getFechas($request);
}