<?php 
class Controller extends User{
  private $userAPI = "123", $passwordAPI = "1";//encriptografar
  public function run(){
    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
      if($_SERVER['PHP_AUTH_USER'] == $this->userAPI && $_SERVER['PHP_AUTH_PW'] == $this->passwordAPI){
        Controller::verifyRequest();
      }else{
        echo json_encode(["Status"=>"Warning", "Message"=>"Incorrect credentials."]);
      }
    }else{
      echo json_encode(["Status"=>"Warning", "Message"=>"Check the auth fields."]);
    }
  }

  public function verifyRequest(){
    switch ($_SERVER['REQUEST_METHOD']) {
      case 'GET':
        Controller::getUsers();
        break;
      case 'POST':
        Controller::postUser();
        break;
      default:
        echo json_encode(["Status"=>"Warning","Message"=>"This request method doesn't exist in ny API!"]);
        break;
    }
  }
}
?>