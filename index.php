<?php
//файл вхождения
namespace app;

use controllers\formController;

session_start();

$app = new formController();
$app->actionReport();
