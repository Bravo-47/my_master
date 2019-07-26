<?php
//файл вхождения

use controllers\formController;
require __DIR__ . "/../vendor/autoload.php";
//require __DIR__ . "/../Controller/formController.php";
session_start();

$app = new formController();
$app->actionReport();
