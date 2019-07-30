<?php

namespace app\models;


/**
 * model Form
 */
class Form
{
  public $fields = array();
  public $errors = array();


  function __construct()
  {

    global $app;
    Messages::log("Form");
  }

//Правила валидации полей формы
  public function rules()
  {
    return [];
  }

//Загружаем данные в локальную переменную класса
  public function load()
  {
    global $app;
    Messages::log("Load");
    if (!empty($_POST)){
      foreach ($_POST as $key => $value) {
        if(!is_array($value)){
          $this->fields[$key] = $value;
        } else {
          foreach ($value as $sub_key => $sub_value) {
            $this->fields[$sub_key[] = $sub_value];
          }
        }
      }
      return (!empty($this->fields));
    } /*elseif(!empty($_SESSION['report']))
      $this->fields = $_SESSION['report'];*/

      return false;
  }


//Создаем временное хранилище данных объекта
  public function saveToSession(string $class)
  {
    $_SESSION[$class] = $this;
  }

//Очищаем временное хранилище
  public function trashSession(string $class)
  {
    unset($_SESSION[$class]);
  }

//Проверяем поля соответствию правилам
  public function validate()
  {
    global $app;
    Messages::log('Validate');
    // $app->messages->addLog("Validate");
    $validate = true;
    $resultValidate = false;
    if(!empty($this->rules()))
      foreach ($this->rules() as $rule) {
        $name_func = 'validate_'.$rule[1];
        $name_field = $rule[0];
        $resultValidate = (!empty($rule[2]))?$this->$name_func($name_field, $rule[2]):$this->$name_func($name_field);
        if($validate && $resultValidate === false)
          $validate = false;
      }
    return $validate;
  }

//Правила проверки данных
  protected function secureData(string $value = null)
  {
    return htmlspecialchars($value);
  }

//Провека строковых данных, и защита от инъекций
  protected function validate_string(string $key, int $len = 255)
  {
    global $app;
    if(!empty($this->fields[$key])){
      $this->fields[$key] = $this->secureData($this->fields[$key]);
    }
    if (!empty($len) && iconv_strlen($this->fields[$key]) > $len){
      $app->messages->addError("Количество символов превышает максимальное значение $len у поля $key");
      return false;
    }
    return true;
  }

//Поверка объемных текстовых данных
  protected function validate_text(string $key, int $len = 1000)
  {
    global $app;
    if(!empty($this->fields[$key])){
      $this->fields[$key] = $this->secureData($this->fields[$key]);
    }
    if (!empty($len) && iconv_strlen($this->fields[$key]) > $len){
      $app->messages->addError("Количество символов превышает максимальное значение $len у поля $key");
      return false;
    }
    return true;
  }

//Проверка даты соответствию формату данных
  protected function validate_date(string $key, string $format = 'DD/MM/YYYY')
  {
    global $app;
    switch ($format) {
      case 'DD/MM/YYYY':
        $pattern = '(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d';
        break;

      default:
        $pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])';
        break;
    }

  if(!empty($this->fields[$key])/* && preg_match($pattern, $this->fields[$key])*/){
      return true;
    }
    else {
      $app->messages->addError('Не верный формат даты');
      return false;
    }
  }

//проверка на обязательность заполнения поля
  protected function validate_require(string $key, $val = null)
  {
    global $app;
    if(empty($this->fields[$key])){
      $app->messages->addError('Не указан обязательный параметр '.$key);
      return false;
    } else
      return true;
  }

//Проверка числовых данных
  protected function validate_integer(string $key)
  {
    global $app;
    if(!empty($this->fields[$key]) && preg_match('/[0-9]/', $this->fields[$key])){
      return true;
    }
    else {
      $app->messages->addError('Не верный формат числового значения '.$key);
      return false;
    }
  }

//Проверка на наличие ошибок в форме
  // public function checkError()
  // {
  //   return (!empty($this->errors));
  // }

//Вывод ошибок
  // public function printErrors()
  // {
  //   foreach ($this->errors as $error) {
  //     echo '<div class="alert alert-danger" >'.$error.'</div>';
  //   }
  // }

//служебный вывод данных
//TODO: перед запуском удалить
  public function printData()
  {
    echo '<pre>';
    var_dump($this);
    echo '</pre>';
  }
}
