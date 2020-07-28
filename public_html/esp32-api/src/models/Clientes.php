<?php
class Cliente{
  public $idClientes;

  public $Nombre;

  public $Direccion;

  public function __construct(){
    $this->idClientes = intval($this->idClientes);
  }
}
class Clientes
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

  public function insertarCliente($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO CLIENTES (Nombre,Direccion)VALUES(:Nombre,:Direccion)";
    
    $response=new stdClass();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("Nombre", $req->Nombre);
        $statement->bindparam("Direccion", $req->Direccion);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  
  public function getClientes($request)
  {
    $req = json_decode($request->getbody());
    
    $sql = "SELECT idClientes, Nombre, Direccion FROM CLIENTES ";
    $response= array();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);    
        $statement->execute();   
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Cliente');     
        $response=$statement->fetchall();
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }
    return json_encode($response);
  }

  public function eliminarClientes($request)
  {
    $req = json_decode($request->getbody());
    //var_dump($req);
    //die();
    $sql = "DELETE FROM CLIENTES WHERE idClientes=:idClientes";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idClientes", $req->idClientes);      
        $statement->execute();        
        $response->result="Se ha logradro eliminar Cliente ";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

}
