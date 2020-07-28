<?php

class Venta{
  public $id_Ventas;

  public $FechaV;

  public $FK_idPedidos;

  public $FK_idProd;

  public $FK_idCli;

  public function __construct(){
    $this->id_Ventas = intval($this->id_Ventas);
    
    $this->FK_idPedidos = intval($this->FK_idPedidos);

    $this->FK_idProd = intval($this->FK_idProd);

    $this->FK_idCli = intval($this->FK_idCli);
  }
}
class Ventas
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

  public function insertarVenta($request)
  {
    $req = json_decode($request->getbody());
    

    $sql = "INSERT INTO VENTAS(id_Ventas,FechaV,FK_idPedidos,FK_idProd,FK_idCli) VALUES(:id_Ventas,:FechaV,:FK_idPedidos,:FK_idProd,:FK_idCli)";
    $response=new stdClass();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_Ventas", $req->id_Ventas);
        $statement->bindparam("FechaV", $req->FechaV);
        $statement->bindparam("FK_idPedidos", $req->FK_idPedidos);
        $statement->bindparam("FK_idProd", $req->FK_idProd);
        $statement->bindparam("FK_idCli", $req->FK_idCli);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  
  public function getVentas($request)
  {
    $req = json_decode($request->getbody());
    
    //$sql = "SELECT VENTAS.id_Ventas, CATALOGO_PRODUCTOS.Nombre, CATALOGO_PRODUCTOS.Precio FROM VENTAS, CATALOGO_PRODUCTOS WHERE id_Ventas=:id_Ventas AND VENTAS.FK_idProd = CATALOGO_PRODUCTOS.idProductos";
    $sql = "SELECT id_Ventas, FechaV, FK_idPedidos, FK_idProd, FK_idCli FROM VENTAS ";
    $response=array();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);     
        $statement->execute();   
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Venta');     
        $response=$statement->fetchall();
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }
    return json_encode($response);
  }

  public function eliminarVenta($request)
  {
    $req = json_decode($request->getbody());
    //var_dump($req);
    //die();
    $sql = "DELETE FROM VENTAS WHERE FK_idPedidos=:FK_idPedidos";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("FK_idPedidos", $req->FK_idPedidos);      
        $statement->execute();        
        $response->result="Se ha logradro eliminar el Producto ";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
