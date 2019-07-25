<?php
//файл вхождения
//namespace app;
session_start();
require "formController.php";
//require "Router.php";

//use app;

$app = new formController();
$app->actionReport();
