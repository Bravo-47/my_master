<?php
namespace models;

use models\Form;
/**
 *
 */
class Report extends Form
{

  function __construct()
  {
    // code...
  }

  /**
  * Описываем поля формы, с правилами валидации
  */
    public function rules()
    {
      return [
        ['name', 'string'],
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
