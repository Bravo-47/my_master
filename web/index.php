<?php
//файл вхождения
//header("Location: http://tz.test/form");
use app\FormController;
use app\Router;
use app\Report;
use app\Controller;
//require __DIR__ . "/../Controller/formController.php";

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../core/Controller.php";
require __DIR__ . "/../Controller/FormController.php";
require __DIR__ . "/../Model/Report.php";
require __DIR__ . "/../core/Router.php";
session_start();
/*class formController{

  function actionReport()
  {
    // code...
    echo 'WORK';
  }
}*/


$app->run();
