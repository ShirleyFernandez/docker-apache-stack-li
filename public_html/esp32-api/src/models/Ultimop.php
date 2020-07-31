<?php
class UP{
 

  public $idPedidos;

  public $id_Ventas;

  public function __construct(){
    
    $this->idPedidos = intval($this->idPedidos);

    $this->id_Ventas = intval($this->id_Ventas);
  }
}

class UPS
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
  
  public function getUP($request)
  {
    $req = json_decode($request->getbody());
    
    $sql = "SELECT MAX(PEDIDOS.idPedidos) AS idPedidos, MAX(VENTAS.id_Ventas) as id_Ventas FROM PEDIDOS, VENTAS";
    $response=array();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);     
        $statement->execute();   
        $statement->setFetchMode(PDO::FETCH_CLASS, 'UP');     
        $response=$statement->fetchall();
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }
    return json_encode($response);
  }
}
