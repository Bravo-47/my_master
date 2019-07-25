<?php
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

 ?>
