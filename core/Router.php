<?php

namespace app;

use controllers\FormController;
use app\models\Messages;

global $app;
// require __DIR__ . "/../Controller/FormController.php";
//use controllers\FormController;
/*
считываем строку браузера
вызываем контроллер и его экшн
*/

/**
 * Router
 */
class Router
{
  public $errors = array();
  protected $url;
  protected $protocol;
  protected $domain;
  protected $controller;
  protected $action;
  protected $params;
  public $messages;

  function __construct()
  {
    //$app->messages->addLog('text');
    $this->messages = new Messages();
    Messages::log('Router');
  }

  function run(){
    if($_SERVER['REQUEST_URI'] !== '/'){
      $uri = explode('/',$_SERVER['REQUEST_URI']);
      // $controllerName = ucfirst($uri[1]) . 'Controller';
      $controllerName = '\\controllers\\' . ucfirst($uri[1]) . 'Controller';
      if(!empty($uri[2])){
        $actionPicies = explode('?',$uri[2]);
        $actionName = (!empty($actionPicies[0])) ? 'action' . ucfirst($actionPicies[0]) : 'actionIndex';
        $params = (!empty($actionPicies[1])) ? explode('&',$actionPicies[1]) : array();
        //$this->messages->addLog($actionName);
        $app = new $controllerName();
        $app->$actionName($params);
      } else {
        $this->messages->addError('Не вызван экшн');
      }
    } else {
      $this->messages->addError('Пустая строка');
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
