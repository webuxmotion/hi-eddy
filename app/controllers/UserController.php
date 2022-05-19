<?php

namespace app\controllers;

use core\Tone;

class UserController extends AppController {
    
    public function loginAction() {
       $this->setMeta(
           'Login page'
       );
    }
}