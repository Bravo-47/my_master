<?php
//файл вхождения
//header("Location: http://tz.test/form");
use app\FormController;
use app\Router;
use app\Report;
use app\Controller;
//require __DIR__ . "/../Controller/formController.php";

require __DIR__ . "/../vendor/autoload.php";
//parent controller
require __DIR__ . "/../core/Controller.php";
//controller
require __DIR__ . "/../Controller/FormController.php";
//model
require __DIR__ . "/../Model/Report.php";
//app
require __DIR__ . "/../core/Router.php";
session_start();

$app->run();
