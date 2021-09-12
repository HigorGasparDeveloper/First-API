<?php 
class Connection{
  public $hostname = "localhost:3308", $username = "root", $password = "", $dbName = "api_users", $conn; 
  public function __construct()
  {
    try{
      $this->conn = mysqli_connect($this->hostname,$this->username,$this->password,$this->dbName);
    }catch (Exception $e){
      echo $e->getMessage();
      die();
    }
  }

  public function selectQuery($table, $columns ,$params, $where){
    // $stmt = NULL;
    if($params == NULL){
      $sql = "SELECT $columns FROM $table $where";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
    }else{
      $sql = "SELECT $columns FROM $table $where";
      $stmt = $this->conn->prepare($sql);
      $typeParams = "";
      $valueParams = [];
      $k = 0;
      foreach($params as $key=>$param){
          $valueParams[] = $param;
          $typeParams.= $key;
      }
      $stmt->bind_param("$typeParams",$valueParams[0]);
      $stmt->execute();
      return $stmt;
    }
    return $stmt;

  }
}
?>