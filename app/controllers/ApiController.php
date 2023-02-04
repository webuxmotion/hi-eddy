<?php

namespace app\controllers;

use app\services\Mailer;

class ApiController extends AppController {
    
    public function sendEmailAction() {

      $mailer = new Mailer();
      $mailer->loadView('pages/Main/mail/send-email');
      $mailer->send('Зкидання паролю', 'HI-EDDY', 'pereverziev.andrii@gmail.com');

      header('Content-type: application/json');
      echo json_encode([
        'test' => 'value'
      ]);
      die;
    }
}  