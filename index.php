<?php

require 'app/core/Autoload.php';
$router=new \core\Router;
  session_start();


  $router->get('/',function(){
    $home=new \module\Home;
    $home->setMysql(new \core\Mysql);
    $home->app($home->index()); 
  });

$router->get('/(\w+)',function($action){
   
    $mod=new \module\Home;
  if(method_exists($mod,$action)):
    $link=(new \core\Mysql)->getLink();
    $mod->app($mod->{$action}($link));
  else:
    $mod->not_found();
  endif;
});
$router->set404(function(){
 (new \module\Home)->not_found();
});
$router->run();
 ?>
