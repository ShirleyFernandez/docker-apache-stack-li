<?php
class Sensores
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

  public function insertarPedido($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO Pedidos(idLista,fecha,TipoPedido,idProductos,Cliente,direccion) VALUES(:idLista,:fecha,:TipoPedido,:idProductos,:Cliente,:direccion)";
    $response=new stdClass();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idLista", $req->idLista);
        $statement->bindparam("fecha", $req->fecha);
        $statement->bindparam("TipoPedido", $req->TipoPedido);
        $statement->bindparam("idProductos", $req->idProductos);
        $statement->bindparam("Cliente", $req->Cliente);
        $statement->bindparam("direccion", $req->direccion);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function getLista($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT Pedidos.idLista, Productos.NombreP FROM Pedidos, Productos WHERE idLista=:idLista AND Pedidos.idProductos = Productos.idProductos;";
    $response=new stdClass();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idLista", $req->idLista);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function eliminarPedido($request)
  {
    $req = json_decode($request->getbody());

    $sql = "DELETE FROM Pedidos WHERE idProductos=:idProductos";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idProductos", $req->idProductos);      
        $statement->execute();        
        $response->result="Se ha logradro eliminar el Producto ";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

}
