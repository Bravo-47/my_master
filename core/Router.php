<?php

namespace app;
/*
считываем строку браузера
вызываем контроллер и его экшн
*/

/**
 * Router
 */
class Router
{
  public $app;
  protected $url;
  protected $protocol;
  protected $domain;
  protected $controller;
  protected $action;
  protected $params;

  function __construct()
  {
    // code...
    //$this->app
  }

  function run(){
    if($_SERVER['REQUEST_URI'] !== '/'){
      $uri = explode('/',$_SERVER['REQUEST_URI']);
      $controllerName = '\\app\\' . ucfirst($uri[1]) . 'Controller';
      if(!empty($uri[2])){
        $actionPicies = explode('?',$uri[2]);
        $actionName = (!empty($actionPicies[0])) ? 'action' . ucfirst($actionPicies[0]) : 'actionIndex';
        $params = (!empty($actionPicies[1])) ? $actionPicies[1] : '';
        var_dump($actionName);
        $app = new $controllerName();
        $app->$actionName();
      } else {
        echo 'Не вызван экшн';
      }
    } else {
      echo 'Пустая строка';
    }
  }

  public function getRoute($value='')
  {
    // code...

  }

  public function setRoute($value='')
  {
    // code...
  }

  protected function parse($value='')
  {
    // code...
  }
}

$app = new Router();
