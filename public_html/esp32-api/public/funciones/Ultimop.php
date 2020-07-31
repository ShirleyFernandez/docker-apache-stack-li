<?
require __DIR__ . '/../../src/models/Ultimop.php';
function funciongetUP($request){
    $objCrepas= new UPS();
    return $objCrepas->getUP($request);
}