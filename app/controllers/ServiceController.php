<?php

namespace app\controllers;

use core\Tone;

class ServiceController extends AppController {
    
    public function offertAction() {
    
       $this->setMeta(
           Tone::$app->getProperty('site_name') . ' - Договір публічної оферти',
           'hi-eddy | Договір публічної оферти',
           'hi-eddy, освітня платформа, публічна оферта'
       );
    }

    public function privacyPolicyAction() {
    
        $this->setMeta(
            Tone::$app->getProperty('site_name') . ' - Політика конфіденційності HI-EDDY',
            'hi-eddy | Політика конфіденційності HI-EDDY',
            'hi-eddy, освітня платформа, політика конфіденційності'
        );
     }

     public function aboutAction() {
    
        $this->setMeta(
            Tone::$app->getProperty('site_name') . ' - Про нас',
            'hi-eddy | Про нас',
            'hi-eddy, освітня платформа, про нас'
        );
     }
}