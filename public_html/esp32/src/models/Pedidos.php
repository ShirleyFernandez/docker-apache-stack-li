<?php
class Pedidos
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

    $sql = " INSERT INTO PEDIDOS(idPedidos,Cantidad,Tipo_Pedido,Estado_Pedido,FK_idProd,FK_idCli) VALUES(:idPedidos,:Cantidad,:Tipo_Pedido,:Estado_Pedido,:FK_idProd,:FK_idCli)";
    $response=new stdClass();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idPedidos", $req->idPedidos);
        $statement->bindparam("Cantidad", $req->Cantidad);
        $statement->bindparam("Tipo_Pedido", $req->Tipo_Pedido);
        $statement->bindparam("Estado_Pedido", $req->Estado_Pedido);
        $statement->bindparam("FK_idProd", $req->FK_idProd);
        $statement->bindparam("FK_idCli", $req->FK_idCli);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  
  public function getPedidos($request)
  {
    $req = json_decode($request->getbody());
    
    $sql = "SELECT VENTAS.id_Ventas, CATALOGO_PRODUCTOS.Nombre FROM VENTAS, CATALOGO_PRODUCTOS WHERE id_Ventas=:id_Ventas AND VENTAS.FK_idProd = CATALOGO_PRODUCTOS.idProductos;";
    $response=new stdClass();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_Ventas", $req->id_Ventas);      
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
    //var_dump($req);
    //die();
    $sql = "DELETE FROM PEDIDOS WHERE idPedidos=:idPedidos";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idPedidos", $req->idPedidos);      
        $statement->execute();        
        $response->result="Se ha logradro eliminar el Producto ";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function actualizarPedido($request)
  {
    $req = json_decode($request->getbody());
    //var_dump($req);
    //die();
    $sql = "UPDATE PEDIDOS SET Estado_Pedido=:Estado_Pedido WHERE idPedidos=:idPedidos";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idPedidos", $req->idPedidos);     
        $statement->bindparam("Estado_Pedido", $req->Estado_Pedido); 
        $statement->execute();        
        $response->result="Se ha actualizado Producto ";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
