<?php

//namespace models;

//use models;
require 'Form.php';
/**
 * Controller for Sender model
 */
class formController
{
  public $layout = 'main';
  public $model = null;

  function __construct()
  {
    // code...
  }

  /*protected function replaceData($value='')
  {
    // code...
    return str_replace('{'..'}', $this->getContent($partView, $model), $file);
  }*/

//////////////////////////////////////////////////////////////////////////
//TODO: Вынести данную часть в родительский класс


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
  //////////////////////////////////////////////////////////////////////

  public function actionReport()
  {
    if(!empty($_POST)){
      $model = new Form();
      if ($model->load() && $model->checkError()){
        return $this->render('form2', $model);
      } else {
        $model->printErrors();
      }
    }
    return $this->render('form1');
  }

  public function actionNote()
  {
    $model = new Form();
    if ($model->checkError()){
      $model->printData();
      return $this->render('form3', $model);
    }
    return $this->render('form2');
  }

  public function actionConfirm()
  {
    $model = new Form();
    if ($model->checkError()){
      $model->printData();
      return $this->render('finish');
    }
    return $this->render('form2');
  }

}
 ?>
