<?php 
class User extends Connection{
  public $nome, $telefone, $data_nascimento;

  public function setNome($nome){
    $this->nome = $nome;
  }

  public function setTelefone($telefone){
    $this->telefone = $telefone;
  }

  public function setDataNascimento($data_nascimento){
    $this->data_nascimento = $data_nascimento;
  }

  public function updateUser(){

  }
  
  public function deleteUser(){
    $url = explode("/", $_SERVER["REQUEST_URI"])[count(explode("/", $_SERVER["REQUEST_URI"]))-1];
    
  }

  public function postUser(){
    User::setNome((isset($_POST['nome'])) ? $_POST['nome'] : "");
    User::setTelefone((isset($_POST['telefone'])) ? $_POST['telefone'] : "");
    User::setDataNascimento((isset($_POST['data_nascimento'])) ? $_POST['data_nascimento'] : "");
    User::insertUser();
  }

  public function insertUser(){
    $sql = "INSERT INTO usuarios (nome, telefone, data_nascimento) VALUES ( ?, ?, ?)";
    $stmt =$this->conn->prepare($sql);
    $stmt->bind_param("sss", $this->nome, $this->telefone, $this->data_nascimento);
    $stmt->execute(); 
    if($stmt){
      echo json_encode(["Status"=>"Sucess", "Message"=>"Sucess adding user."]);
      die();
    }else{
      echo json_encode(["Status"=>"Error", "Message"=>"Error adding user."]);
      die();      
    }
  }

  public function getUsers(){
    $url = explode("/", $_SERVER["REQUEST_URI"])[count(explode("/", $_SERVER["REQUEST_URI"]))-1];
    if(empty($url))
      User::getAllUsers();
    else{
      $id = @explode("=", $url)[1];
      if(!is_numeric($id)){
        echo json_encode(["Status"=>"Warning", "Message"=>"id type is not numeric."]);
        die();
      }else{
        User::getUser($id);
      }
    } 
  }

  public function getUser($id){
    if(User::verifyIfExist($id)){
      $stmt = User::selectQuery("usuarios","*",["i"=>$id], "WHERE id = ?");
      $user = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      echo json_encode(["Status"=>"Success", "Message"=>"Success when querying the user.", "Data"=>$user]);
    }else{
      echo json_encode(["Status"=>"Warning", "Message"=>"User doesn't exist in my database."]);
    }
  }

  public function getAllUsers(){
    $stmt = User::selectQuery("usuarios","*",NULL,"");
    $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    echo json_encode(["Status"=>"Success", "Message"=>"Get all users.", "Data"=> $users]);
  }

  public function verifyIfExist($id){
    $stmt = User::selectQuery("usuarios", "*", ["i"=>$id], "WHERE id = ?");
    $user = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return (count($user) > 0) ? true : false;
  }
}
?>