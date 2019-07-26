<?php
namespace controllers;

use app\controllers\Controller;
use models\Report;
/**
 *
 */
class formController extends Controller
{

  function __construct()
  {
    // code...
  }


    public function actionReport()
    {
      $this->title = 'Отчет о проекте';
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
