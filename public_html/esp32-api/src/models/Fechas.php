<?php
class Fecha{
  public $FechaV;
}
class Fechas
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
  
  public function getFechas($request)
  {
    $req = json_decode($request->getbody());
    
    $sql = "SELECT DISTINCT FechaV FROM VENTAS";
    $response=array();
    //var_dump($req);
    //die();
      try {
        $statement = $this->con->prepare($sql);    
        $statement->execute();   
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Fecha');     
        $response=$statement->fetchall();
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }
    return json_encode($response);
  }
}
