<?php

namespace controllers;


//use app\controllers\Controller;
use app;
use app\models\Messages;
use models\Report;
use models\Note;
use app\controllers\Controller;

//require __DIR__ . "/../core/Controller.php";
/**
 *
 */
class FormController extends Controller
{

  public function __construct()
  {
    global $app;
    Messages::log("FormController");
  }

  public function __destruct()
  {
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
  }


    public function actionReport()
    {
      global $app;
      $this->title = 'Отчет о проекте';
      // if(!empty($_POST)){
        $model = new Report();
        if($model->load())
          if ($model->validate() && $app->messages->checkError()){
            return $this->redirect('form/note', $model);
          } else {
            $app->messages->printErrors();
            return $this->render('Report', $model);
          }
      // }
      return $this->render('Report');
    }

    public function actionNote()
    {
      global $app;
      $this->title = 'Замечания к проекту';
      $model = new Note();
      if($model->load())
      if ($model->validate() && $app->messages->checkError()){
        $_SESSION['note'][] = $model->fields;
      } else {
        $app->messages->printErrors();
        return $this->render('note', $model);
      }
      return $this->render('note');
    }

    public function actionConfirm()
    {
      global $app;
      $this->title = 'Сохранить настройки';
      $report = new Report();
      $note = new Note();
      if(!empty($_SESSION['Note']))
        return $this->redirect('form/finish');

      return $this->render('confirm');
    }

    public function actionFinish()
    {
      $this->title = 'Окончание действия';
      $model = new Report();
      //$model->trashSession();
      return $this->render('finish');
    }

}
