<?php

namespace app;


//use app\controllers\Controller;
//use models\Report;

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
      $model = new \models\Report();
      if ($model->checkError()){
        $model->printData();
        return $this->render('form3', $model);
      }
      return $this->render('form2');
    }

    public function actionConfirm()
    {
      $model = new \models\Report();
      if ($model->checkError()){
        $model->printData();
        return $this->render('finish');
      }
      return $this->render('form2');
    }

    public function actionFinish()
    {
      // code...
      return $this->render('finish');
    }

}
