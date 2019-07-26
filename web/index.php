<?php
//файл вхождения

require __DIR__ . "/../vendor/autoload.php";
//use controllers\formController;
/*
public function __autoload(string $className = '')
{
  $class_picies = explode('\\', $clasName);
  switch ($class_picies[0]) {
    case 'value':
      // code...
      require __DIR__ . '/../' .  implode(DIRECTORY_SEPARATOR, $class_picies) . '.php';
      break;

    default:
      // code...
      break;
  }
}*/

session_start();

$app = new controllers\formController();
$app->actionReport();
