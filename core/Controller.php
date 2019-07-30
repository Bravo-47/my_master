<?php

namespace app\controllers;

use app\models\Messages;

/**
 * Controller for Sender model
 */
class Controller
{
  public $title = 'My web site';
  public $layout = 'main';
  public $model = null;

  public function __construct()
  {
    // code...
    Messages::log("Controller");
  }

  public function actionIndex()
  {
    global $app;
    $app->messages->addLog("Hello index");
  }

  protected function getContent(string $partView = null)
  {
    $tpl = __DIR__ . '/../View/' . ucfirst($partView) . '.php';
    $content = (!empty($partView) && file_exists($tpl)) ? file_get_contents($tpl) : 'Пустой контент';
    if(!empty($this->model->fields))
      foreach ($this->model->fields as $key => $value) {
        $content =  str_replace('{'.$key.'}', $value, $content);
      }
    $content = preg_replace("'\{.*?\}'", '', $content);
    return $content;
  }

  protected function getLayout(string $partView = null)
  {
    $tpl = __DIR__ . '/../View/' . 'layout_'.$this->layout.'.php';
    $file = (file_exists($tpl))?file_get_contents($tpl):'Пустой шаблон';
    $file = str_replace('{title}', $this->title, $file);
    $file = str_replace('{content}', $this->getContent($partView), $file);
    return $file;
  }

  protected function redirect(string $url = null, object $model = null)
  {
    if($this->model === null)
      $this->model = $model;
    //$className = str_replace('Controller', '', get_class($this));
    $protocol = (!empty($_SERVER['HTTPS']))?'https':'http';
    $server = $_SERVER['SERVER_NAME'];
    header("Location:$protocol://$server/$url");
  }

  protected function render(string $view = null, object $model = null)
  {
    if($model !== null)
      $_SESSION[$view] = $model;
    if($this->model === null)
      $this->model = $model;
    if(!empty($view))
     print $this->getLayout($view);
  }

}
