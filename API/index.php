<?php header('Content-Type: application/json');
  require 'autoload.php';
  $controller = new Controller();
  $controller->run();
?>