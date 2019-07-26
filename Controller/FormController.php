<?php

namespace app;


//use app\controllers\Controller;
use models\Report;

//require __DIR__ . "/../core/Controller.php";
/**
 *
 */
class FormController extends \app\Controller
{

  public function __construct()
  {
    // code...
    echo "FormController";
  }


    public function actionReport()
    {
      $this->title = 'Отчет о проекте';
      if(!empty($_POST)){
        $model = new \models\Report();
        if ($model->load() && $model->validate() && $model->checkError()){
          $model->remember('report');
          return $this->render('form2', $model);
        } else {
          $model->printErrors();
        }
      }
      return $this->render('form1');
    }

    public function actionNote()
    {
      $this->title = 'Замечания к проекту';
      $model = new \models\Report();
      //
      if (!empty($_SESSION['report'])) {
        
        return $this->redirect('form3', $model);
      }
      var_dump($_SESSION);
      return $this->render('form2');
    }

    public function actionConfirm()
    {
      $this->title = 'Сохранить настройки';
      $model = new \models\Report();
      if ($model->checkError()){
        return $this->render('finish');
      }
      return $this->render('form2');
    }

    public function actionFinish()
    {
      // code...
      $model = new \models\Report();
      $model->trashSession();
      return $this->render('finish');
    }

}
