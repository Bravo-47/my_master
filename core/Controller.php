<?php

namespace controllers;

/**
 * Controller for Sender model
 */
class Controller
{
  public $title = 'My web site';
  public $layout = 'main';
  public $model = null;

  function __construct()
  {
    // code...
  }

  protected function getContent(string $partView = '')
  {
    $tpl = $partView.'View.php';
    $content = (!empty($partView) && file_exists($tpl)) ? file_get_contents($tpl) : 'Пустой контент';
    if(!empty($this->model->fields))
      foreach ($this->model->fields as $key => $value) {
        $content =  str_replace('{'.$key.'}', $value, $content);
      }
    return $content;
  }

  protected function getLayout(string $partView = '')
  {
    $tpl = 'layout_'.$this->layout.'.php';
    $file = (file_exists($tpl))?file_get_contents($tpl):'Пустой шаблон';
    $file = str_replace('{title}', $this->title, $file);
    $file = str_replace('{content}', $this->getContent($partView), $file);
    return $file;
  }

  protected function redirect(string $action = '', object $model = null)
  {
    if($this->model === null)
      $this->model = $model;
    $className = str_replace('Controller', '', get_class($this));
    $protocol = (!empty($_SERVER['HTTPS']))?'https':'http';
    $server = $_SERVER['SERVER_NAME'];
    header("Location:$protocol://$server/$className/$action");
  }

  protected function render(string $view = '', object $model = null)
  {
    if($this->model === null)
      $this->model = $model;
    if(!empty($view))
     print $this->getLayout($view);
  }

}