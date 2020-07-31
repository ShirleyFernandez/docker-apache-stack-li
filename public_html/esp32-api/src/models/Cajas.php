<?php
class Caja{
  public $id_Ventas;

  public $Nombre;

  public $FK_idPedidos;

  public $Precio;

  public $Cantidad;

  public function __construct(){
    $this->id_Ventas = intval($this->id_Ventas);
    
    $this->FK_idPedidos = intval($this->FK_idPedidos);

    $this->Precio = intval($this->Precio);

    $this->Cantidad = intval($this->Cantidad);
  }
}
class Cajas
{
  private $con;

  function __construct()
  {
    $db = new DbConnect;
    $this->con = $db->connect();
  }

  function __destruct()
  {
    $this->con = null;
  }
  
  public function getCajas($request)
  {
    $req = json_decode($request->getbody());
    
    $sql = "SELECT VENTAS.id_Ventas, VENTAS.FK_idPedidos ,CATALOGO_PRODUCTOS.Nombre, CATALOGO_PRODUCTOS.Precio, PEDIDOS.Cantidad 
    FROM VENTAS, CATALOGO_PRODUCTOS, PEDIDOS WHERE FechaV=:FechaV
    AND VENTAS.FK_idProd = CATALOGO_PRODUCTOS.idProductos
    AND VENTAS.FK_idPedidos = PEDIDOS.idPedidos";
    $response=array();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql); 
        $statement->bindparam("FechaV", $req->FechaV);    
        $statement->execute();   
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Caja');     
        $response=$statement->fetchall();
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }
    return json_encode($response);
  }
}
