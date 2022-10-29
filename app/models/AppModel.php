<?php

namespace app\models;

use core\base\Model;
use core\ErrorHandler;

class AppModel extends Model
{
    public function logError($string) {
      ErrorHandler::logError('from AppModel - ' . $string, '', '');
    }

    public function logErrors() {
      $this->logError("START -------------------");
      foreach ($this->errors as $item) {
        foreach ($item as $errorStr) {
          $this->logError($errorStr);
        }
      }
      $this->logError("END -------------------");
    }
}