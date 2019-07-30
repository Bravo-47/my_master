<?php
namespace models;


use app\models\Form;
use app\models\Messages;

/**
 *
 */
class Note extends Form
{

  function __construct()
  {
    // code...
    global $app;
    Messages::log("Note");
  }

  /**
  * Описываем поля формы, с правилами валидации
  */
    public function rules()
    {
      return [
        ['date', 'date', 'd.m.Y'],
        ['date', 'require'],
        ['description', 'text'],
        ['description', 'require'],
        ['category', 'integer'],
        ['category', 'require'],
      ];
    }


      public function save($value='')
      {
        // code...
        $_SESSION['Note'][] = $this;
      }

}
