<?php

namespace app\models;
/**
 *
 */
class Messages
{
  protected $logs = array();
  protected $errors = array();
  protected $confirms = array();

  function __construct()
  {
    // code...
    self::log('Messages');
  }

  // return FALSE if not checking error
  public function checkError()
  {
    // $this->addLog('CheckError');
    return (empty($this->errors));
  }

  public function addError(string $value='')
  {
    // code...
    $this->errors[] = $value;
  }
   public function addConfirm(string $value='')
   {
     // code...
     $this->confirms[] = $value;
   }

   public function addLog(string $value = '')
   {
     // code...
     $this->logs[] = $value;
     echo $value . ' -> ';
   }

   public function printLog()
   {
     if(empty($this->logs))
      return;

     echo '<div class="alert alert-warning bottom" >';
     foreach ($this->logs as $log)
       echo '<div class="" >'.$log.'</div>';
     echo '</div>';
   }

   public function printErrors()
   {
     if(empty($this->errors))
      return;

     echo '<div class="alert alert-danger bottom" >';
     foreach ($this->errors as $error)
       echo '<div class="" >'.$error.'</div>';
     echo '</div>';
   }


  public function applicationWarning(string $value = '')
  {

  }

  public function applicationError(string $value='')
  {
    // code...
  }

   public function applicationSuccess(string $value='')
   {
     // code...
   }

  public function applicationLog(string $value='')
  {
    foreach ($this->errors as $error) {
      echo '<div class="alert alert-danger" >'.$error.'</div>';
    }
  }

  public static function log(string $value='')
  {
    // code...
    //$this->addLog($value);
    //echo $value . ' -> ';
  }
}
