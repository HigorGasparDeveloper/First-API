<?php 
spl_autoload_register(function($class){
  $GLOBALS['path'] = "";
   $Test = "";
  $paths = [
    "Controller" => function(){
      $GLOBALS['path']= "Controller/";
    },
    "Connection" => function(){
      $GLOBALS['path'] = "db/";
    },
    "User" => function(){
      $GLOBALS['path'] = "Model/";
    }
  ];
  $paths[$class]();
  require $GLOBALS['path']."$class.php";
});
?>