<?php
namespace models;


use app\models\Form;
use app\models\Messages;

/**
 *
 */
class Report extends Form
{

  function __construct()
  {
    // code...
    global $app;
    Messages::log("Report");
  }

  /**
  * Описываем поля формы, с правилами валидации
  */
    public function rules()
    {
      return [
        ['name', 'string',255],
        ['name', 'require'],
        ['date', 'date', 'd.m.Y'],
        ['date', 'require'],
        ['description', 'text'],
        ['status', 'integer'],
        ['status', 'require'],
      ];
    }


      public function save($value='')
      {
        // code...
      }

}
