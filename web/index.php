<?php

//namespace app;

//файл вхождения
// use app\FormController;
// use app\Router;
// use app\Report;
// use app\Controller;
// use app\models\Messages;
//require __DIR__ . "/../Controller/formController.php";

require __DIR__ . "/../vendor/autoload.php";
//parent controller
require __DIR__ . "/../core/Controller.php";
//application messages
require __DIR__ . "/../core/Messages.php";
//controller
require __DIR__ . "/../Controller/FormController.php";
//parent model
require __DIR__ . "/../core/Form.php";
//model
require __DIR__ . "/../Model/Report.php";
require __DIR__ . "/../Model/Note.php";
//app
require __DIR__ . "/../core/Router.php";

session_start();

$app->run();
$app->messages->printLog();
