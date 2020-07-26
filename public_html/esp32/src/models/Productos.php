<?php
class Productos
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

  public function insertarProducto($request)
  {
    $req = json_decode($request->getbody());

    $sql = " INSERT INTO CATALOGO_PRODUCTOS(idProductos, Nombre, Precio, categoria) VALUES(:idProductos,:Nombre,:Precio,:categoria);";
    $response=new stdClass();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idProductos", $req->idProductos);
        $statement->bindparam("Nombre", $req->Nombre);
        $statement->bindparam("Precio", $req->Precio);
        $statement->bindparam("categoria", $req->categoria);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  
  public function getProductos($request)
  {
    $req = json_decode($request->getbody());
    
    $sql = "SELECT idProductos, Nombre, Precio, categoria FROM CATALOGO_PRODUCTOS ";
    $response=new stdClass();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }
    return json_encode($response);
  }

  public function eliminarProducto($request)
  {
    $req = json_decode($request->getbody());
    //var_dump($req);
    //die();
    $sql = "DELETE FROM CATALOGO_PRODUCTOS WHERE idProductos=:idProductos";
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
